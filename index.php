<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Chinese Dictionary</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
:root {
  --font: -apple-system, BlinkMacSystemFont, "San Francisco", "Segoe UI", "Inter", Arial, sans-serif;
  --font-size: 16px;

  --primary: #2563eb;
  --accent: #3b82f6;
  --background: #0f172a;
  --card-bg: #182236;
  --border: #253047;
  --text: #e4e9f7;
  --muted: #7f93b8;
  --shadow: 0 2px 12px rgba(30,41,59,0.10);
  --radius: 9px;
  --focus: #93c5fd;
}

body {
  font-family: var(--font);
  font-size: var(--font-size);
  background: var(--background);
  color: var(--text);
  margin: 0;
  min-height: 100vh;
  transition: background 0.22s, color 0.22s;
  font-weight: 400;
  line-height: 1.7;
  letter-spacing: -0.01em;
}
body.light {
  --background: #f8fafc;
  --card-bg: #fff;
  --border: #e5e7eb;
  --text: #1e293b;
  --muted: #64748b;
  --shadow: 0 4px 24px rgba(0,0,0,0.07);
}
a { color: var(--primary); text-decoration: none;}
.container {
  max-width: 580px;
  margin: 0 auto;
  padding: 0 16px 32px;
}
.header {
  text-align: center;
  margin-top: 36px;
  margin-bottom: 18px;
  position: relative;
}
.header h1 {
  font-size: 1.7rem;
  font-weight: 700;
  margin-bottom: 4px;
  letter-spacing: -1.2px;
  font-family: var(--font);
}
.header p {
  color: var(--muted);
  font-size: 1.08rem;
  margin-bottom: 0;
  font-weight: 500;
  letter-spacing: -0.01em;
}
#settingsBtn, #toggleTheme {
  background: none;
  border: none;
  font-size: 1.22em;
  cursor: pointer;
  position: absolute;
  top: 7px;
  color: var(--muted);
  border-radius: 50%;
  padding: 4px 8px;
  transition: color 0.2s, background 0.2s;
  font-weight: 600;
  font-family: var(--font);
}
#settingsBtn { right: 0; }
#toggleTheme { left: 0; }
#settingsBtn:focus, #toggleTheme:focus { outline: 2px solid var(--focus); background: var(--card-bg);}
#toggleTheme:hover, #settingsBtn:hover { color: var(--primary); background: var(--card-bg);}
.search-box {
  background: var(--card-bg);
  border-radius: var(--radius);
  padding: 16px 17px 6px;
  box-shadow: var(--shadow);
  margin-bottom: 18px;
  transition: background 0.22s;
  display: flex;
  flex-direction: column;
  align-items: stretch;
}
body.light .search-box { background: var(--card-bg); }
.search-controls {
  display: flex;
  gap: 7px;
  align-items: stretch;
  flex-wrap: wrap;
  position: relative;
}
#search {
  flex: 1;
  padding: 10px 14px;
  font-size: 1em;
  border: 1.5px solid var(--border);
  border-radius: var(--radius);
  background: var(--background);
  color: var(--text);
  box-shadow: 0 1px 4px rgba(0,0,0,0.03);
  font-family: var(--font);
  font-weight: 500;
  letter-spacing: -0.01em;
}
body.light #search {
  background: #fff;
  color: #1e293b;
  border-color: var(--border);
}
#search:focus {
  outline: none;
  border-color: var(--focus);
  box-shadow: 0 0 0 2px var(--focus);
}
.btn {
  padding: 9px 16px;
  font-size: 1em;
  border: none;
  border-radius: var(--radius);
  cursor: pointer;
  font-weight: 600;
  background: linear-gradient(90deg, var(--card-bg) 85%, var(--background) 100%);
  color: var(--primary);
  border: 1.5px solid var(--border);
  transition: background 0.22s, color 0.22s, border-color 0.22s, box-shadow 0.22s;
  box-shadow: 0 1px 3px rgba(30,41,59,0.06);
  letter-spacing: 0.01em;
  font-family: var(--font);
}
.btn:focus {
  outline: none;
  border-color: var(--focus);
  box-shadow: 0 0 0 2px var(--focus);
}
.btn-primary {
  background: linear-gradient(90deg, var(--primary) 90%, var(--accent) 100%);
  color: #fff;
  border-color: var(--primary);
}
.btn-primary:hover, .btn-primary:focus {
  background: var(--accent);
  color: #fff;
  border-color: var(--accent);
}
.btn-secondary {
  background: var(--card-bg);
  color: var(--primary);
  border-color: var(--border);
}
.btn-secondary:hover, .btn-secondary:focus {
  background: var(--accent);
  color: #fff;
  border-color: var(--accent);
}
.status {
  padding: 6px 0 0;
  color: var(--muted);
  font-style: italic;
  font-size: 1em;
  font-weight: 500;
  font-family: var(--font);
}
.error {
  color: #b91c1c;
  background: #ffeaea;
  padding: 10px;
  border-radius: var(--radius);
  margin: 10px 0;
  font-size: 1em;
  font-weight: 600;
  font-family: var(--font);
}
body.light .error { background: #ffeaea; color: #b91c1c; }
.results-container {
  background: var(--card-bg);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  padding: 12px;
  min-height: 90px;
  transition: background 0.22s;
}
body.light .results-container { background: var(--card-bg);}
.results-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 8px;
  padding-bottom: 4px;
  border-bottom: 1.5px solid var(--border);
  font-size: 1em;
  font-weight: 600;
  font-family: var(--font);
}
body.light .results-header { border-color: var(--border);}
.results-count { color: var(--muted);}
.view-options { display: flex; gap: 7px;}
.view-btn {
  padding: 6px 14px;
  font-size: 1em;
  border: 1.5px solid var(--border);
  background: var(--card-bg);
  border-radius: var(--radius);
  color: var(--primary);
  font-weight: 600;
  cursor: pointer;
  transition: background 0.18s, color 0.18s, border-color 0.18s;
  font-family: var(--font);
}
.view-btn.active, .view-btn:focus {
  background: var(--primary);
  color: #fff;
  border-color: var(--primary);
}
body.light .view-btn { background: #fff; color: #2563eb; border-color: var(--border);}
body.light .view-btn.active { background: var(--primary); color: #fff;}
.cards-view {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
  gap: 13px;
}
.word-card {
  background: var(--background);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 10px 10px;
  transition: box-shadow 0.18s, border-color 0.18s;
  cursor: pointer;
  position: relative;
  word-break: break-word;
  min-height: 52px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  font-family: var(--font);
  font-size: 1.04em;
  font-weight: 500;
}
.word-card:hover, .word-card:focus {
  box-shadow: 0 4px 12px rgba(30,41,59,0.10);
  border-color: var(--primary);
}
.word-card .chinese-text {
  font-size: 1.13em;
  font-weight: 700;
  color: var(--text);
  display: flex;
  align-items: baseline;
  gap: 5px;
  font-family: var(--font);
}
.word-card .pinyin {
  font-size: 1em;
  margin-bottom: 4px;
  margin-top: 2px;
  line-height: 1.3;
  color: var(--primary);
  font-weight: 500;
  font-family: var(--font);
}
.word-card .english {
  font-size: 0.97em;
  color: #b0bdd1;
  margin-bottom: 1px;
  font-family: var(--font);
}
.word-card .actions {
  position: absolute;
  top: 4px;
  right: 5px;
  display: flex;
  gap: 3px;
}
.word-card .actions button {
  background: none;
  border: none;
  font-size: 1em;
  cursor: pointer;
  color: var(--muted);
  transition: color 0.18s;
  border-radius: 50%;
  padding: 2px;
  font-family: var(--font);
  font-weight: 600;
}
.word-card .actions button:hover {
  background: var(--accent);
  color: #fff;
}
body.light .word-card {
  background: #fff;
  border-color: #e5e7eb;
  color: #1e293b;
}
body.light .word-card .chinese-text { color: #1e293b;}
body.light .word-card .english { color: #1e293b;}
.table-view {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  font-family: var(--font);
  font-size: 1em;
}
.table-view thead { background: #182236;}
.table-view th {
  padding: 7px;
  text-align: left;
  font-weight: 700;
  color: #93c5fd;
  border-bottom: 1.5px solid #334155;
  font-size: 1em;
  font-family: var(--font);
}
.table-view td {
  padding: 7px;
  border-bottom: 1px solid #334155;
  vertical-align: top;
  font-size: 1em;
  font-family: var(--font);
  font-weight: 500;
}
.table-view tr:hover { background: #182236;}
.table-view .chinese-cell { font-size: 1.07em; font-weight: 700; color: var(--text);}
.table-view .pinyin-cell { font-size: 1em; color: var(--primary);}
.table-view .english-cell { font-size: 1em; color: #b0bdd1;}
body.light .table-view thead { background: #f3f4fa;}
body.light .table-view th { color: #2563eb; border-color: #e5e7eb;}
body.light .table-view td { border-color: #e5e7eb;}
body.light .table-view tr:hover { background: #f3f4fa;}
body.light .table-view .chinese-cell { color: #1e293b;}
body.light .table-view .english-cell { color: #1e293b;}
.list-view { padding: 6px 0;}
.list-entry {
  padding: 6px 0;
  border-bottom: 1px solid var(--border);
  font-size: 1em;
  line-height: 1.48;
  font-family: var(--font);
  font-weight: 500;
}
.list-entry:last-child { border-bottom: none; }
.list-entry .chinese { font-weight: 700; font-size: 1.05em; margin-right: 5px; }
.list-entry .pinyin { color: var(--primary); font-size: 1em; margin-right: 5px;}
.list-entry .english { color: #b0bdd1; font-size: 1em;}
body.light .list-entry .english { color: #1e293b;}
.tone1 { color: #ef4444;}
.tone2 { color: #f59e42;}
.tone3 { color: #22c55e;}
.tone4 { color: #3b82f6;}
.tone5 { color: #a21caf;}
@keyframes pulse { 0%,100%{opacity:1;} 50%{opacity:0.5;} }
.loading { animation: pulse 1.4s ease-in-out infinite; }
.empty-state {
  text-align: center;
  padding: 14px 0;
  color: var(--muted);
  font-size: 1em;
  font-family: var(--font);
  font-weight: 500;
}
.empty-state svg {
  width: 35px;
  height: 35px;
  margin-bottom: 6px;
  opacity: 0.45;
}
#settingsModal {
  display: none;
  position: fixed;
  z-index: 99;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  background: var(--card-bg);
  color: var(--text);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  min-width: 180px;
  padding: 10px 6px;
  font-family: var(--font);
  font-size: 1em;
  font-weight: 500;
}
body.light #settingsModal { background: #fff; color: #1e293b;}
#settingsModal h2 { font-size: 1.05em; margin-bottom: 8px; font-weight: 700;}
#settingsModal label { display: block; margin-bottom: 5px;}
#settingsModal .close-btn {
  float: right;
  background: none;
  border: none;
  font-size: 1.08em;
  cursor: pointer;
  color: var(--muted);
  font-family: var(--font);
  font-weight: 600;
}
.footer {
  text-align: center;
  margin-top: 11px;
  color: var(--muted);
  font-size: 0.95em;
  font-family: var(--font);
  font-weight: 500;
}
.footer a { color: var(--primary); text-decoration: underline; }
body.light .footer { color: #64748b;}
@media (max-width: 700px) {
  .container { padding: 0 3px 14px;}
  .header h1 { font-size: 1.15em;}
  .cards-view { grid-template-columns: 1fr; }
  #settingsBtn, #toggleTheme { top: 2px; font-size: 1em;}
  .search-box, .results-container { padding: 4px; }
  .table-view th, .table-view td { padding: 4px;}
  #settingsModal { min-width: 95px; padding: 3px 1px;}
  .results-header { font-size: 0.91em; flex-direction: column; align-items: flex-start;}
  .view-options { margin-top: 3px;}
}
  </style>
</head>
<body class="dark">
<div class="container" role="main">
  <div class="header">
    <button id="toggleTheme" aria-label="Toggle dark mode" title="Toggle dark mode">☀️</button>
    <button id="settingsBtn" aria-label="Settings" title="Settings">⚙️</button>
    <h1 tabindex="0">Chinese Dictionary</h1>
    <p>Instant word segmentation, pinyin, translation, and more</p>
  </div>
  <div class="search-box" aria-label="Dictionary Search">
    <form class="search-controls" autocomplete="off" onsubmit="return false;">
      <input type="text" id="search" aria-label="Search field" placeholder="Type Chinese, Pinyin, or English..." disabled autocomplete="off">
      <button type="button" class="btn btn-primary" id="clearBtn" title="Clear search">Clear</button>
      <button type="button" class="btn btn-secondary" id="pasteBtn" title="Paste">Paste</button>
    </form>
    <div id="status" class="status loading" aria-live="polite">Loading dictionary database...</div>
  </div>
  <div class="results-container" aria-label="Search Results">
    <div class="results-header" style="display:none;">
      <div class="results-count"><span id="wordCount">0</span> words found</div>
      <div class="view-options">
        <button class="view-btn active" data-view="table" aria-label="Table view">Table</button>
        <button class="view-btn" data-view="cards" aria-label="Card view">Cards</button>
        <button class="view-btn" data-view="list" aria-label="List view">List</button>
      </div>
    </div>
    <div id="results">
      <div class="empty-state">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.35-4.35"></path></svg>
        <p>Type or paste Chinese text above to begin.</p>
        <p style="font-size: 12px; color: #aaa; margin-top: 4px;">Examples: 你好 | ni3 hao3 | hello</p>
      </div>
    </div>
  </div>
  <div class="footer">
    <span>v 0.1</span>
  </div>
</div>
<!-- Settings Modal -->
<div id="settingsModal" aria-modal="true" role="dialog">
  <button class="close-btn" id="closeSettings" aria-label="Close settings">&times;</button>
  <h2>Settings</h2>
  <label>
    <input type="checkbox" id="toggleFavorites">
    Enable favorites
  </label>
  <label>
    Font size:
    <select id="fontSize">
      <option value="13">Small</option>
      <option value="15" selected>Normal</option>
      <option value="17">Large</option>
      <option value="19">Extra Large</option>
    </select>
  </label>
</div>
<script>
// --- Pinyin syllable splitter ---
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
      let substr = inputLower.substr(i, len);
      if (syllables.includes(substr)) {
        result.push(substr);
        i += len;
        found = true;
        break;
      }
    }
    if (!found) {
      return null; // Could not split, fallback to null
    }
  }
  return result.join(' ');
}

// --- Add this helper function ---
function generatePinyinToneCombos(syllables) {
  // Given ['ni','hao'] returns all ['ni1 hao1', 'ni1 hao2', ... 'ni4 hao4']
  const tones = [1,2,3,4];
  let combos = [''];
  for (const syl of syllables) {
    let next = [];
    for (const combo of combos) {
      for (const t of tones) {
        next.push((combo ? combo + ' ' : '') + syl + t);
      }
    }
    combos = next;
  }
  return combos;
}

// --- Replace your searchPinyin function with this ---
function searchPinyin(query) {
  let lower = query.toLowerCase().trim();
  let splitAttempt = null;
  let split = lower;
  if (!lower.includes(' ')) {
    splitAttempt = splitPinyinIntoSyllables(lower);
    if (splitAttempt) split = splitAttempt;
  }
  // Prepare all variants for searching
  let searchTerms = [];
  if (lower) searchTerms.push(lower);             // "nihao"
  if (split && split !== lower) searchTerms.push(split); // "ni hao"
  // Also add all forms with and without spaces
  let variants = [];
  for (const term of searchTerms) {
    variants.push(term.replace(/\s+/g, '')); // "nihao"
    variants.push(term.replace(/\s+/g, ' ')); // "ni hao"
  }
  // Remove duplicates
  variants = Array.from(new Set(variants));

  // --- NEW: If input has no tones, generate all possible tone combos ---
  let combos = [];
  if (variants.length && !/\d/.test(variants[0])) {
    // Only if no tone numbers in input
    const syls = variants[0].split(/\s+/);
    combos = generatePinyinToneCombos(syls);
  }

  const results = [];
  dictionary.forEach(entry => {
    if (!entry.pinyin) return;
    const entryPinyinWithTones = entry.pinyinWithTones.trim();
    const entryPinyinNoTones = entry.pinyinSearchable.trim();
    const entryPinyinWithTonesNoSpaces = entryPinyinWithTones.replace(/\s+/g, '');
    const entryPinyinNoTonesNoSpaces = entryPinyinNoTones.replace(/\s+/g, '');
    // Match all variants
    let matched = false;
    for (const term of variants) {
      if (
        entryPinyinWithTones === term ||
        entryPinyinNoTones === term ||
        entryPinyinWithTonesNoSpaces === term.replace(/\s+/g, '') ||
        entryPinyinNoTonesNoSpaces === term.replace(/\s+/g, '') ||
        entryPinyinWithTones.includes(term) ||
        entryPinyinNoTones.includes(term) ||
        entryPinyinWithTonesNoSpaces.includes(term.replace(/\s+/g, '')) ||
        entryPinyinNoTonesNoSpaces.includes(term.replace(/\s+/g, ''))
      ) {
        matched = true;
        break;
      }
    }
    // Try all tone combos if not matched
    if (!matched && combos.length) {
      for (const combo of combos) {
        if (
          entryPinyinWithTones === combo ||
          entryPinyinWithTones.replace(/\s+/g, '') === combo.replace(/\s+/g, '')
        ) {
          matched = true;
          break;
        }
      }
    }
    if (matched) results.push(entry);
  });
  return results.sort((a,b) => a.simplified.length-b.simplified.length).slice(0,100);
}

// Add this helper function before renderCards/renderTable/renderList
function getShareLink(entry) {
  // Prefer simplified, fallback to pinyin, fallback to English
  let q = entry.simplified || entry.pinyin || (entry.english && entry.english[0]) || '';
  q = encodeURIComponent(q);
  return `${location.origin}${location.pathname}?q=${q}`;
}

let dictionary = [];
let currentView = 'table';
let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
let enableFavorites = localStorage.getItem('enableFavorites') === 'true';
let fontSize = localStorage.getItem('fontSize') || '15';

const $ = sel => document.querySelector(sel);
const $$ = sel => document.querySelectorAll(sel);
const escapeHTML = s => s.replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const copyToClipboard = text => navigator.clipboard?.writeText(text);

function parseEntry(entry) {
  const traditional = entry.traditional || '';
  const simplified = entry.simplified || '';
  // --- Use entry.pinyin if available, fallback to parsing from traditional ---
  let pinyin = (entry.pinyin || '').trim();
  if (!pinyin) {
    const pinyinMatch = traditional.match(/\[(.*?)\]/);
    pinyin = pinyinMatch ? pinyinMatch[1] : '';
  }
  const englishMatch = traditional.match(/\/(.*?)\/$/);
  const englishDef = englishMatch ? englishMatch[1] : '';
  const englishArray = englishDef ? englishDef.split(/[;\/]/).map(e => e.trim()).filter(e=>e).slice(0,5) : [];
  const parts = traditional.split(' ');
  let traditionalChars = parts[0] || '';
  if (parts.length > 1 && parts[0] === simplified)
    traditionalChars = parts[1].replace(/\[.*?\].*/, '').trim() || parts[0];
  const pinyinSearchable = pinyin.toLowerCase().replace(/[0-9]/g,'');
  const pinyinWithTones = pinyin.toLowerCase();
  return {
    simplified,
    traditional: traditionalChars,
    pinyin,
    pinyinSearchable,
    pinyinWithTones,
    english: englishArray.length ? englishArray : ['(no definition)'],
    searchableEnglish: englishDef.toLowerCase()
  };
}

function loadDictionary() {
  fetch('cedict.json')
    .then(res => res.json())
    .then(data => {
      let processed = 0, chunkSize = 10000;
      const statusEl = $('#status');
      function processChunk() {
        const chunk = data.slice(processed, processed+chunkSize);
        chunk.forEach(entry => {
          const parsed = parseEntry(entry);
          if (parsed.simplified || parsed.traditional) dictionary.push(parsed);
        });
        processed += chunk.length;
        if (processed < data.length) {
          statusEl.innerHTML = `<div class="loading">Processing: ${processed.toLocaleString()} / ${data.length.toLocaleString()}</div>`;
          window.requestIdleCallback(processChunk);
        } else {
          // Debug: log a few entries to check pinyin fields
          // console.log(dictionary.slice(0,5));
          $('#search').disabled = false;
          statusEl.style.display = 'none';
          $('#search').placeholder = 'Type Chinese, Pinyin, or English...';
          $('#search').focus();
        }
      }
      processChunk();
    })
    .catch(err => {
      $('#status').innerHTML = '<div class="error">Failed to load dictionary. Please ensure cedict.json is available.</div>';
      console.error("Error loading dictionary:", err);
    });
}
loadDictionary();

function colorizePinyin(pinyin, highlight='') {
  if (!pinyin) return '<span style="color:#aaa;">—</span>';
  return pinyin.split(' ').map(syl => {
    const tone = syl.match(/[1-5]$/);
    let html = escapeHTML(syl);
    if(highlight && syl.includes(highlight)) html = `<mark>${html}</mark>`;
    return `<span class="tone${tone?tone[0]:''}">${html}</span>`;
  }).join(' ');
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
      results.push({...entry, relevance:matchCount*10+calculateRelevance(entry.searchableEnglish,searchTerms)});
    }
  });
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
      const slice = cleanSentence.substr(i, len);
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
function renderCards(segments, query='') {
  return `<div class="cards-view">${segments.map(entry=>{
    const isFav = favorites.some(f=>f.simplified===entry.simplified&&f.traditional===entry.traditional);
    const defText = `${entry.simplified} (${entry.pinyin}) - ${entry.english.join('; ')}`.replace(/'/g, "\\'");
    const shareUrl = getShareLink(entry);
    return `
      <div class="word-card" tabindex="0" aria-label="${escapeHTML(entry.simplified)}" data-simp="${escapeHTML(entry.simplified)}" data-trad="${escapeHTML(entry.traditional)}">
        <div class="actions">
          <button title="Copy" aria-label="Copy" onclick="copyToClipboard('${defText}')">📋</button>
          <button title="Copy share link" aria-label="Share link" onclick="copyToClipboard('${shareUrl}')">🔗</button>
          ${enableFavorites?`<button title="${isFav?'Remove from':'Add to'} favorites" aria-label="Favorite" onclick="toggleFavorite('${escapeHTML(entry.simplified)}','${escapeHTML(entry.traditional)}')">${isFav?'★':'☆'}</button>`:''}
        </div>
        <div class="chinese-text">
          <span>${highlight(entry.simplified,query)}</span>
        </div>
        <div class="pinyin">${colorizePinyin(entry.pinyin,query)}</div>
        <div class="english">${highlight(entry.english.join('; '),query)}</div>
      </div>
    `;
  }).join('')}</div>`;
}
function renderTable(segments, query='') {
  return `<table class="table-view">
    <thead><tr><th>Chinese</th><th>Pinyin</th><th>English</th><th></th></tr></thead>
    <tbody>${segments.map(entry=>{
      const shareUrl = getShareLink(entry);
      return `
        <tr>
          <td class="chinese-cell">${highlight(entry.simplified,query)}</td>
          <td class="pinyin-cell">${colorizePinyin(entry.pinyin,query)}</td>
          <td class="english-cell">${highlight(entry.english.join('; '),query)}</td>
          <td><button title="Copy share link" aria-label="Share link" onclick="copyToClipboard('${shareUrl}')">🔗</button></td>
        </tr>
      `;
    }).join('')}</tbody>
  </table>`;
}
function renderList(segments, query='') {
  return `<div class="list-view">${segments.map(entry => {
    const shareUrl = getShareLink(entry);
    return `
    <div class="list-entry">
      <span class="chinese">${highlight(entry.simplified,query)}</span>
      <span class="pinyin">${colorizePinyin(entry.pinyin,query)}</span>
      <span class="english">${highlight(entry.english.join('; '),query)}</span>
      <button title="Copy share link" aria-label="Share link" onclick="copyToClipboard('${shareUrl}')">🔗</button>
    </div>
  `;
  }).join('')}</div>`;
}
function highlight(text, query) {
  if (!query || !text) return escapeHTML(text||'');
  let safeQuery = escapeHTML(query);
  return text.replace(new RegExp("("+safeQuery+")", "gi"), '<mark>$1</mark>');
}
const searchInput = $('#search');
const resultsDiv = $('#results');
const resultsHeader = $('.results-header');
function performSearch() {
  const query = searchInput.value.trim();
  if (!query) {
    resultsHeader.style.display = 'none';
    resultsDiv.innerHTML = `<div class="empty-state"><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.35-4.35"></path></svg><p>Search Chinese, Pinyin, or English</p><p style="font-size: 12px; color: #aaa; margin-top: 4px;">Examples: 你好 | ni3 hao3 | hello</p></div>`;
    return;
  }
  if (dictionary.length===0) {
    resultsDiv.innerHTML = '<div class="error">Dictionary is still loading...</div>';
    return;
  }
  const inputType = detectInputType(query);
  let segments=[],searchTypeLabel='';
  if (inputType==='chinese') {
    if(query.length>4||/[，。！？；：、]/.test(query)){
      segments = segmentSentence(query);
      searchTypeLabel = ' (sentence segmentation)';
    } else {
      segments = searchChinese(query);
      searchTypeLabel = ' (character search)';
      if (!segments.length) {
        segments = segmentSentence(query);
        searchTypeLabel = ' (segmented)';
      }
    }
  } else if (inputType==='pinyin') {
    segments = searchPinyin(query);
    searchTypeLabel = ' (Pinyin search)';
    if (!segments.length) {
      segments = searchEnglish(query);
      if (segments.length) searchTypeLabel = ' (English → Chinese)';
    }
  } else {
    segments = searchEnglish(query);
    searchTypeLabel = ' (English → Chinese)';
  }
  if (!segments.length) {
    resultsHeader.style.display='none';
    resultsDiv.innerHTML = `<div class="empty-state"><p>No results for "${escapeHTML(query)}"</p><p style="font-size: 13px; margin-top: 6px; color: #aaa;">${inputType==='pinyin'?'Try with or without tone numbers':'Try simpler keywords or different terms'}</p></div>`;
    return;
  }
  resultsHeader.style.display='flex';
  $('.results-count').innerHTML = `<span id="wordCount">${segments.length}</span> results${searchTypeLabel}`;
  if (currentView==='cards') resultsDiv.innerHTML = renderCards(segments,query);
  else if (currentView==='list') resultsDiv.innerHTML = renderList(segments,query);
  else resultsDiv.innerHTML = renderTable(segments,query);
}
window.toggleFavorite = function(simp,trad) {
  const idx = favorites.findIndex(f=>f.simplified===simp&&f.traditional===trad);
  if(idx>=0) favorites.splice(idx,1);
  else favorites.push({simplified:simp,traditional:trad});
  localStorage.setItem('favorites',JSON.stringify(favorites));
  performSearch();
}
let searchTimeout;
searchInput.addEventListener('input', () => {
  clearTimeout(searchTimeout);
  searchTimeout = setTimeout(performSearch, 220);
});
$('#clearBtn').addEventListener('click', () => {
  searchInput.value = '';
  performSearch();
  searchInput.focus();
});
$('#pasteBtn').addEventListener('click', async () => {
  if(navigator.clipboard){
    const text = await navigator.clipboard.readText();
    searchInput.value = text;
    performSearch();
  }
  searchInput.focus();
});
$$('.view-btn').forEach(btn => {
  btn.addEventListener('click', e => {
    const view = e.target.dataset.view;
    if(view===currentView) return;
    $$('.view-btn').forEach(b=>b.classList.remove('active'));
    e.target.classList.add('active');
    currentView = view;
    performSearch();
  });
});
const toggleThemeBtn = $('#toggleTheme');
toggleThemeBtn.addEventListener('click', () => {
  document.body.classList.toggle('dark');
  document.body.classList.toggle('light');
  const isDark = document.body.classList.contains('dark');
  toggleThemeBtn.textContent = isDark ? "☀️" : "🌙";
  localStorage.setItem('theme', isDark ? 'dark' : 'light');
});
const savedTheme = localStorage.getItem('theme');
if(savedTheme==='light') {
  document.body.classList.remove('dark');
  document.body.classList.add('light');
  toggleThemeBtn.textContent='🌙';
} else {
  document.body.classList.remove('light');
  document.body.classList.add('dark');
  toggleThemeBtn.textContent='☀️';
}
document.addEventListener('keydown', e => {
  if(e.ctrlKey && e.key==='l'){e.preventDefault();searchInput.value='';performSearch();searchInput.focus();}
  if(e.ctrlKey && e.key==='d'){e.preventDefault();toggleThemeBtn.click();}
  if(e.key==='Escape'){if($('#settingsModal').style.display==='block')closeSettings();}
});
$('#settingsBtn').addEventListener('click', () => {
  $('#settingsModal').style.display = 'block';
});
$('#closeSettings').addEventListener('click', closeSettings);
function closeSettings(){ $('#settingsModal').style.display = 'none'; }
$('#toggleFavorites').checked = enableFavorites;
$('#toggleFavorites').addEventListener('change', e => {
  enableFavorites = e.target.checked;
  localStorage.setItem('enableFavorites', enableFavorites);
  performSearch();
});
$('#fontSize').value = fontSize;
$('#fontSize').addEventListener('change', e => {
  fontSize = e.target.value;
  document.body.style.fontSize = fontSize+'px';
  localStorage.setItem('fontSize',fontSize);
});
document.body.style.fontSize = fontSize+'px';
window.addEventListener('DOMContentLoaded', () => { if (searchInput) searchInput.focus(); });
</script>
</body>
</html>