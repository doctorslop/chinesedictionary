/**
 * Web Worker for Dictionary Search Operations
 * Performs search in background thread to keep UI responsive
 */

let dictionary = [];

// =============================================================================
// FUZZY MATCHING UTILITIES
// =============================================================================

function levenshteinDistance(a, b) {
  if (a.length === 0) return b.length;
  if (b.length === 0) return a.length;

  const matrix = [];

  for (let i = 0; i <= b.length; i++) {
    matrix[i] = [i];
  }
  for (let j = 0; j <= a.length; j++) {
    matrix[0][j] = j;
  }

  for (let i = 1; i <= b.length; i++) {
    for (let j = 1; j <= a.length; j++) {
      if (b.charAt(i - 1) === a.charAt(j - 1)) {
        matrix[i][j] = matrix[i - 1][j - 1];
      } else {
        matrix[i][j] = Math.min(
          matrix[i - 1][j - 1] + 1,
          matrix[i][j - 1] + 1,
          matrix[i - 1][j] + 1
        );
      }
    }
  }

  return matrix[b.length][a.length];
}

function isFuzzyMatch(str1, str2, maxDistance = 2) {
  if (Math.abs(str1.length - str2.length) > maxDistance) {
    return false;
  }
  const distance = levenshteinDistance(str1.toLowerCase(), str2.toLowerCase());
  return distance <= maxDistance;
}

// =============================================================================
// PINYIN PROCESSING
// =============================================================================

function splitPinyinIntoSyllables(input) {
  const syllables = [
    "a","ai","an","ang","ao","ba","bai","ban","bang","bao","bei","ben","beng","bi","bian","biao","bie","bin","bing","bo",
    "bu","ca","cai","can","cang","cao","ce","cen","ceng","cha","chai","chan","chang","chao","che","chen","cheng","chi",
    "chong","chou","chu","chua","chuai","chuan","chuang","chui","chun","chuo","ci","cong","cou","cu","cuan","cui","cun",
    "cuo","da","dai","dan","dang","dao","de","dei","den","deng","di","dia","dian","diao","die","ding","diu","dong","dou",
    "du","duan","dui","dun","duo","e","ei","en","eng","er","fa","fan","fang","fei","fen","feng","fo","fou","fu","ga","gai",
    "gan","gang","gao","ge","gei","gen","geng","gong","gou","gu","gua","guai","guan","guang","gui","gun","guo","ha","hai",
    "han","hang","hao","he","hei","hen","heng","hong","hou","hu","hua","huai","huan","huang","hui","hun","huo","ji","jia",
    "jian","jiang","jiao","jie","jin","jing","jiong","jiu","ju","juan","jue","jun","ka","kai","kan","kang","kao","ke","ken",
    "keng","kong","kou","ku","kua","kuai","kuan","kuang","kui","kun","kuo","la","lai","lan","lang","lao","le","lei","leng",
    "li","lia","lian","liang","liao","lie","lin","ling","liu","long","lou","lu","lv","luan","lue","lun","luo","ma","mai",
    "man","mang","mao","me","mei","men","meng","mi","mian","miao","mie","min","ming","miu","mo","mou","mu","na","nai",
    "nan","nang","nao","ne","nei","nen","neng","ni","nian","niang","niao","nie","nin","ning","niu","nong","nou","nu",
    "nv","nuan","nue","nuo","o","ou","pa","pai","pan","pang","pao","pei","pen","peng","pi","pian","piao","pie","pin",
    "ping","po","pou","pu","qi","qia","qian","qiang","qiao","qie","qin","qing","qiong","qiu","qu","quan","que","qun",
    "ran","rang","rao","re","ren","reng","ri","rong","rou","ru","ruan","rui","run","ruo","sa","sai","san","sang","sao",
    "se","sen","seng","sha","shai","shan","shang","shao","she","shen","sheng","shi","shou","shu","shua","shuai","shuan",
    "shuang","shui","shun","shuo","si","song","sou","su","suan","sui","sun","suo","ta","tai","tan","tang","tao","te",
    "teng","ti","tian","tiao","tie","ting","tong","tou","tu","tuan","tui","tun","tuo","wa","wai","wan","wang","wei",
    "wen","weng","wo","wu","xi","xia","xian","xiang","xiao","xie","xin","xing","xiong","xiu","xu","xuan","xue","xun",
    "ya","yan","yang","yao","ye","yi","yin","ying","yo","yong","you","yu","yuan","yue","yun","za","zai","zan","zang",
    "zao","ze","zei","zen","zeng","zha","zhai","zhan","zhang","zhao","zhe","zhen","zheng","zhi","zhong","zhou","zhu",
    "zhua","zhuai","zhuan","zhuang","zhui","zhun","zhuo","zi","zong","zou","zu","zuan","zui","zun","zuo"
  ];
  let inputLower = input.toLowerCase();
  let result = [];
  let i = 0;
  while (i < inputLower.length) {
    let found = false;
    for (let len = Math.min(5, inputLower.length - i); len >= 1; len--) {
      let substr = inputLower.slice(i, i + len);
      if (syllables.includes(substr)) {
        result.push(substr);
        i += len;
        found = true;
        break;
      }
    }
    if (!found) {
      return null;
    }
  }
  return result.join(' ');
}

// =============================================================================
// SEARCH FUNCTIONS
// =============================================================================

function searchPinyin(query) {
  let lower = query.toLowerCase().trim();
  let splitAttempt = null;
  let split = lower;

  if (!lower.includes(' ')) {
    splitAttempt = splitPinyinIntoSyllables(lower);
    if (splitAttempt) split = splitAttempt;
  }

  let searchTerms = [];
  if (lower) searchTerms.push(lower);
  if (split && split !== lower) searchTerms.push(split);

  let variants = [];
  for (const term of searchTerms) {
    variants.push(term.replace(/\s+/g, ''));
    variants.push(term.replace(/\s+/g, ' '));
  }
  variants = Array.from(new Set(variants));

  const hasTones = /\d/.test(lower);

  const results = [];
  dictionary.forEach(entry => {
    if (!entry.pinyin) return;
    const entryPinyinWithTones = entry.pinyinWithTones.trim();
    const entryPinyinNoTones = entry.pinyinSearchable.trim();
    const entryPinyinWithTonesNoSpaces = entryPinyinWithTones.replace(/\s+/g, '');
    const entryPinyinNoTonesNoSpaces = entryPinyinNoTones.replace(/\s+/g, '');

    let matched = false;
    for (const term of variants) {
      const termNoSpaces = term.replace(/\s+/g, '');

      if (hasTones) {
        if (entryPinyinWithTones === term ||
            entryPinyinWithTonesNoSpaces === termNoSpaces ||
            entryPinyinWithTones.includes(term) ||
            entryPinyinWithTonesNoSpaces.includes(termNoSpaces)) {
          matched = true;
          break;
        }
      } else {
        if (entryPinyinNoTones === term ||
            entryPinyinNoTonesNoSpaces === termNoSpaces ||
            entryPinyinNoTones.includes(term) ||
            entryPinyinNoTonesNoSpaces.includes(termNoSpaces)) {
          matched = true;
          break;
        }
      }
    }
    if (matched) results.push(entry);
  });

  // If no exact matches, try fuzzy matching
  if (results.length === 0 && lower.length >= 3 && lower.length <= 15) {
    const fuzzyResults = [];
    dictionary.forEach(entry => {
      if (!entry.pinyin) return;
      const entryPinyin = hasTones ? entry.pinyinWithTones : entry.pinyinSearchable;
      const entryPinyinNoSpaces = entryPinyin.replace(/\s+/g, '');

      for (const term of variants) {
        const termNoSpaces = term.replace(/\s+/g, '');
        if (isFuzzyMatch(term, entryPinyin, 2) ||
            isFuzzyMatch(termNoSpaces, entryPinyinNoSpaces, 2)) {
          const distance = Math.min(
            levenshteinDistance(term, entryPinyin),
            levenshteinDistance(termNoSpaces, entryPinyinNoSpaces)
          );
          fuzzyResults.push({ ...entry, fuzzyDistance: distance });
          break;
        }
      }
    });

    return fuzzyResults
      .sort((a, b) => a.fuzzyDistance - b.fuzzyDistance || a.simplified.length - b.simplified.length)
      .slice(0, 50)
      .map(r => { delete r.fuzzyDistance; return r; });
  }

  return results.sort((a,b) => a.simplified.length - b.simplified.length).slice(0, 100);
}

function searchChinese(query) {
  const results = [];
  const cleanQuery = query.replace(/[，。！？；：、\s]/g,'');
  dictionary.forEach(entry => {
    if (entry.simplified === cleanQuery || entry.traditional === cleanQuery)
      results.push({...entry, exactMatch:true});
    else if (cleanQuery.length===1 && (entry.simplified.includes(cleanQuery)||entry.traditional.includes(cleanQuery)))
      results.push({...entry, exactMatch:false});
  });
  return results.sort((a,b) => (a.exactMatch&&!b.exactMatch?-1:!a.exactMatch&&b.exactMatch?1:a.simplified.length-b.simplified.length)).slice(0,100).map(r=>{delete r.exactMatch;return r;});
}

function searchEnglish(query) {
  const results = [], searchTerms = query.toLowerCase().trim().split(/\s+/);
  dictionary.forEach(entry => {
    if (!entry.searchableEnglish) return;
    const matches = searchTerms.some(term => term.length<=2 ? new RegExp(`\\b${term}\\b`,'i').test(entry.searchableEnglish) : entry.searchableEnglish.includes(term));
    if(matches){
      const matchCount = searchTerms.filter(term=>entry.searchableEnglish.includes(term)).length;
      const relevance = matchCount*10+calculateRelevance(entry.searchableEnglish,searchTerms);
      results.push({...entry, relevance});
    }
  });

  // If no exact matches and single term, try fuzzy matching
  if (results.length === 0 && searchTerms.length === 1 && searchTerms[0].length >= 4) {
    const fuzzyResults = [];
    const queryTerm = searchTerms[0];

    dictionary.forEach(entry => {
      if (!entry.searchableEnglish) return;
      const englishWords = entry.searchableEnglish.split(/[\s\/;,]+/);

      for (const word of englishWords) {
        if (isFuzzyMatch(queryTerm, word, 2)) {
          const distance = levenshteinDistance(queryTerm, word);
          fuzzyResults.push({ ...entry, fuzzyDistance: distance });
          break;
        }
      }
    });

    return fuzzyResults
      .sort((a, b) => a.fuzzyDistance - b.fuzzyDistance)
      .slice(0, 50)
      .map(r => { delete r.fuzzyDistance; return r; });
  }

  return results.sort((a,b)=>b.relevance-a.relevance).slice(0,100).map(r=>{delete r.relevance;return r;});
}

function calculateRelevance(text,searchTerms) {
  let score=0;
  searchTerms.forEach(term=>{
    const wordRegex=new RegExp(`\\b${term}\\b`,'gi');
    score+=(text.match(wordRegex)||[]).length*10;
    score+=(text.match(new RegExp(term,'gi'))||[]).length;
  });
  score-=text.length*0.01;
  return score;
}

function segmentSentence(sentence) {
  const results = [];
  let i = 0;
  const cleanSentence = sentence.replace(/[，。！？；：、\s]/g,'');
  while (i < cleanSentence.length) {
    let match = null, maxLen = 0;
    for (let len = Math.min(10, cleanSentence.length - i); len >= 1; len--) {
      const slice = cleanSentence.slice(i, i + len);
      const entry = dictionary.find(e =>
        e.simplified === slice || e.traditional === slice
      );
      if (entry) { match = entry; maxLen = len; break; }
    }
    if (match) {
      results.push({ ...match });
      i += maxLen;
    } else {
      const char = cleanSentence[i];
      if (/[\u4e00-\u9fff\u3400-\u4dbf]/.test(char)) {
        const singleEntry = dictionary.find(e =>
          e.simplified === char || e.traditional === char
        );
        if (singleEntry) {
          results.push({ ...singleEntry });
        } else {
          results.push({
            simplified: char, traditional: char, pinyin: '', english: ['(not found)']
          });
        }
      }
      i += 1;
    }
  }
  return results.filter(entry =>
    !(entry.english && entry.english[0] === "(not found)")
  );
}

function detectInputType(text) {
  const chineseRegex = /[\u4e00-\u9fff\u3400-\u4dbf]/;
  if (chineseRegex.test(text)) return 'chinese';
  const cleanText = text.toLowerCase().trim();
  const pinyinRegex = /^[a-z]+[0-5]?(\s+[a-z]+[0-5]?)*$/;
  const commonEnglish = ['a','i','me','you','he','she','it','we','they','can','will','would','should'];
  if (pinyinRegex.test(cleanText) && !commonEnglish.includes(cleanText)) {
    if (/[0-5]/.test(cleanText)) return 'pinyin';
    const syllables = cleanText.split(/\s+/);
    const pinyinPatterns = /^(zh|ch|sh|[bpmfdtnlgkhjqxrzcsyw])?[aeiouü]+n?g?$/;
    const likelyPinyin = syllables.every(syl => pinyinPatterns.test(syl));
    return likelyPinyin ? 'pinyin' : 'english';
  }
  return 'english';
}

// =============================================================================
// WORKER MESSAGE HANDLER
// =============================================================================

self.onmessage = function(e) {
  const { type, data } = e.data;

  switch (type) {
    case 'loadDictionary':
      dictionary = data;
      self.postMessage({ type: 'dictionaryLoaded', data: dictionary.length });
      break;

    case 'addChunk':
      dictionary = dictionary.concat(data);
      self.postMessage({ type: 'chunkAdded', data: dictionary.length });
      break;

    case 'search':
      const query = data.query;
      const inputType = detectInputType(query);
      let results = [];

      if (inputType === 'chinese') {
        if (query.length > 4 || /[，。！？；：、]/.test(query)) {
          results = segmentSentence(query);
        } else {
          results = searchChinese(query);
          if (!results.length) {
            results = segmentSentence(query);
          }
        }
      } else if (inputType === 'pinyin') {
        results = searchPinyin(query);
        if (!results.length) {
          results = searchEnglish(query);
        }
      } else {
        results = searchEnglish(query);
      }

      self.postMessage({
        type: 'searchResults',
        data: { results, inputType }
      });
      break;
  }
};
