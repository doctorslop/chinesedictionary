<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Chinese Dictionary</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- PWA Meta Tags -->
  <meta name="description" content="Fast, offline-capable Chinese-English dictionary with 123,596+ entries">
  <meta name="theme-color" content="#2563eb">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="汉语词典">

  <!-- PWA Manifest -->
  <link rel="manifest" href="manifest.json">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
:root {
  --font: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
  --font-size: 15px;

  --primary: #0066cc;
  --primary-hover: #0052a3;
  --background: #0a0e1a;
  --card-bg: #131720;
  --border: #1f2937;
  --text: #e2e8f0;
  --muted: #94a3b8;
  --shadow: 0 1px 3px rgba(0,0,0,0.1);
  --radius: 6px;
  --focus: #3b82f6;
}

body {
  font-family: var(--font);
  font-size: var(--font-size);
  background: var(--background);
  color: var(--text);
  margin: 0;
  min-height: 100vh;
  transition: background 0.2s, color 0.2s;
  font-weight: 400;
  line-height: 1.6;
  letter-spacing: normal;
}
body.light {
  --background: #ffffff;
  --card-bg: #f9fafb;
  --border: #e5e7eb;
  --text: #111827;
  --muted: #6b7280;
  --shadow: 0 1px 2px rgba(0,0,0,0.05);
}
a { color: var(--primary); text-decoration: none;}
.container {
  max-width: 720px;
  margin: 0 auto;
  padding: 0 20px 40px;
}
.header {
  text-align: center;
  margin-top: 48px;
  margin-bottom: 32px;
  position: relative;
}
.header h1 {
  font-size: 2rem;
  font-weight: 600;
  margin-bottom: 8px;
  letter-spacing: -0.5px;
  font-family: var(--font);
  color: var(--text);
}
.header p {
  color: var(--muted);
  font-size: 0.95rem;
  margin-bottom: 0;
  font-weight: 400;
  letter-spacing: normal;
}
#toggleTheme, #helpBtn {
  background: transparent;
  border: none;
  font-size: 1.1em;
  cursor: pointer;
  position: absolute;
  top: 0;
  color: var(--muted);
  border-radius: 4px;
  padding: 6px 10px;
  transition: all 0.15s ease;
  font-weight: 400;
  font-family: var(--font);
}
#helpBtn { right: 0; }
#toggleTheme { left: 0; }
#toggleTheme:focus, #helpBtn:focus { outline: none; color: var(--text); }
#toggleTheme:hover, #helpBtn:hover { color: var(--text); }
.search-box {
  background: var(--card-bg);
  border-radius: var(--radius);
  border: 1px solid var(--border);
  padding: 20px;
  box-shadow: var(--shadow);
  margin-bottom: 24px;
  transition: background 0.2s;
  display: flex;
  flex-direction: column;
  align-items: stretch;
}
.search-controls {
  display: flex;
  gap: 8px;
  align-items: stretch;
  flex-wrap: wrap;
  position: relative;
}
#search {
  flex: 1;
  padding: 11px 14px;
  font-size: 0.95rem;
  border: 1px solid var(--border);
  border-radius: var(--radius);
  background: var(--background);
  color: var(--text);
  box-shadow: none;
  font-family: var(--font);
  font-weight: 400;
  letter-spacing: normal;
  min-width: 0;
}
body.light #search {
  background: #fff;
  color: var(--text);
  border-color: var(--border);
}
#search:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
}
.btn {
  padding: 10px 16px;
  font-size: 0.9rem;
  border: 1px solid var(--border);
  border-radius: var(--radius);
  cursor: pointer;
  font-weight: 500;
  background: var(--card-bg);
  color: var(--text);
  transition: all 0.15s ease;
  letter-spacing: normal;
  font-family: var(--font);
  white-space: nowrap;
}
.btn:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
}
.btn-primary {
  background: var(--primary);
  color: #fff;
  border-color: var(--primary);
}
.btn-primary:hover {
  background: var(--primary-hover);
  border-color: var(--primary-hover);
}
.btn-secondary {
  background: transparent;
  color: var(--muted);
  border-color: var(--border);
}
.btn-secondary:hover {
  background: var(--card-bg);
  color: var(--text);
  border-color: var(--border);
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
  border: 1px solid var(--border);
  box-shadow: var(--shadow);
  padding: 20px;
  min-height: 200px;
  transition: background 0.2s;
}
.results-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
  padding-bottom: 12px;
  border-bottom: 1px solid var(--border);
  font-size: 0.9rem;
  font-weight: 500;
  font-family: var(--font);
}
.results-count { color: var(--muted);}
.view-options { display: flex; gap: 6px;}
.view-btn {
  padding: 6px 12px;
  font-size: 0.85rem;
  border: 1px solid var(--border);
  background: transparent;
  border-radius: var(--radius);
  color: var(--muted);
  font-weight: 500;
  cursor: pointer;
  transition: all 0.15s ease;
  font-family: var(--font);
}
.view-btn.active {
  background: var(--primary);
  color: #fff;
  border-color: var(--primary);
}
.view-btn:hover {
  color: var(--text);
  border-color: var(--border);
}
.cards-view {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
  gap: 16px;
}
.word-card {
  background: var(--background);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 16px;
  transition: all 0.15s ease;
  cursor: pointer;
  position: relative;
  word-break: break-word;
  min-height: 100px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  font-family: var(--font);
  font-size: 0.95rem;
  font-weight: 400;
}
.word-card:hover {
  border-color: var(--primary);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
.word-card .chinese-text {
  font-size: 1.4rem;
  font-weight: 600;
  color: var(--text);
  display: flex;
  align-items: baseline;
  gap: 6px;
  font-family: var(--font);
  margin-bottom: 8px;
}
.word-card .pinyin {
  font-size: 0.9rem;
  margin-bottom: 8px;
  line-height: 1.4;
  color: var(--primary);
  font-weight: 500;
  font-family: var(--font);
}
.word-card .english {
  font-size: 0.85rem;
  color: var(--muted);
  line-height: 1.4;
  font-family: var(--font);
}
.word-card .actions {
  position: absolute;
  top: 10px;
  right: 10px;
  display: flex;
  gap: 4px;
}
.word-card .actions button {
  background: transparent;
  border: none;
  font-size: 0.95em;
  cursor: pointer;
  color: var(--muted);
  transition: all 0.15s ease;
  border-radius: 4px;
  padding: 4px;
  font-family: var(--font);
  font-weight: 400;
}
.word-card .actions button:hover {
  color: var(--text);
  background: var(--card-bg);
}
body.light .word-card {
  background: #fff;
  border-color: var(--border);
}
body.light .word-card .english { color: var(--muted);}
.table-view {
  width: 100%;
  border-collapse: collapse;
  font-family: var(--font);
  font-size: 0.9rem;
}
.table-view thead { background: transparent;}
.table-view th {
  padding: 10px 12px;
  text-align: left;
  font-weight: 600;
  color: var(--muted);
  border-bottom: 1px solid var(--border);
  font-size: 0.85rem;
  font-family: var(--font);
}
.table-view td {
  padding: 12px;
  border-bottom: 1px solid var(--border);
  vertical-align: top;
  font-size: 0.9rem;
  font-family: var(--font);
  font-weight: 400;
}
.table-view tbody tr:hover { background: var(--card-bg);}
.table-view .chinese-cell { font-size: 1.1rem; font-weight: 600; color: var(--text);}
.table-view .pinyin-cell { font-size: 0.9rem; color: var(--primary);}
.table-view .english-cell { font-size: 0.9rem; color: var(--muted); line-height: 1.5;}
body.light .table-view thead { background: transparent;}
body.light .table-view th { color: var(--muted); border-color: var(--border);}
body.light .table-view td { border-color: var(--border);}
body.light .table-view tbody tr:hover { background: var(--card-bg);}
body.light .table-view .chinese-cell { color: var(--text);}
body.light .table-view .english-cell { color: var(--muted);}
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
#helpModal {
  display: none;
  position: fixed;
  z-index: 99;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  background: var(--card-bg);
  color: var(--text);
  border-radius: var(--radius);
  box-shadow: 0 10px 40px rgba(0,0,0,0.3);
  min-width: 180px;
  max-width: 500px;
  padding: 15px 12px;
  font-family: var(--font);
  font-size: 1em;
  font-weight: 500;
}
body.light #helpModal { background: #fff; color: #1e293b;}
#helpModal h2 { font-size: 1.3em; margin-bottom: 12px; font-weight: 700;}
#helpModal h3 { font-size: 1.1em; color: var(--primary); margin-bottom: 8px; border-bottom: 1px solid var(--border); padding-bottom: 4px;}
#helpModal .close-btn {
  float: right;
  background: none;
  border: none;
  font-size: 1.3em;
  cursor: pointer;
  color: var(--muted);
  font-family: var(--font);
  font-weight: 600;
  padding: 0 5px;
}
#helpModal kbd {
  background: var(--background);
  padding: 2px 6px;
  border-radius: 4px;
  border: 1px solid var(--border);
  font-family: monospace;
  font-size: 0.9em;
  white-space: nowrap;
}
#helpModal table { border-collapse: collapse; }
#helpModal table td { padding: 4px 8px; border-bottom: 1px solid var(--border); }
#helpModal table td:first-child { font-weight: 600; }
#helpModal a { color: var(--primary); text-decoration: underline; }
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
  #toggleTheme { top: 2px; font-size: 1em;}
  .search-box, .results-container { padding: 4px; }
  .table-view th, .table-view td { padding: 4px;}
  .results-header { font-size: 0.91em; flex-direction: column; align-items: flex-start;}
  .view-options { margin-top: 3px;}
}
  </style>
</head>
<body class="dark">
<div class="container" role="main">
  <div class="header">
    <button id="toggleTheme" aria-label="Toggle dark mode" title="Toggle dark mode">☀️</button>
    <button id="helpBtn" aria-label="Help" title="Help & Keyboard Shortcuts">❓</button>
    <h1 tabindex="0">Chinese Dictionary</h1>
    <p>Instant word segmentation, pinyin, translation, and more</p>
  </div>
  <div class="search-box" aria-label="Dictionary Search">
    <form class="search-controls" autocomplete="off" onsubmit="return false;">
      <input type="text" id="search" aria-label="Search field" placeholder="Type Chinese, Pinyin, or English..." disabled autocomplete="off">
      <button type="button" class="btn btn-primary" id="clearBtn" title="Clear search">Clear</button>
      <button type="button" class="btn btn-secondary" id="pasteBtn" title="Paste">Paste</button>
      <button type="button" class="btn btn-secondary" id="speakQueryBtn" title="Pronounce search query" style="display:none;">🔊</button>
      <button type="button" class="btn btn-secondary" id="voiceBtn" title="Voice input (Chinese or English)" style="display:none;">🎤</button>
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
    <span>v 0.2.2</span>
  </div>
</div>

<!-- Help Modal -->
<div id="helpModal" aria-modal="true" role="dialog" style="display: none;">
  <button class="close-btn" id="closeHelp" aria-label="Close help">&times;</button>
  <h2>Help & Shortcuts</h2>
  <div style="max-height: 400px; overflow-y: auto; padding: 10px;">
    <h3 style="margin-top: 10px; font-size: 1.1em;">Keyboard Shortcuts</h3>
    <table style="width: 100%; font-size: 0.9em; margin: 10px 0;">
      <tr><td><kbd>Ctrl+L</kbd></td><td>Clear search & focus</td></tr>
      <tr><td><kbd>Ctrl+D</kbd></td><td>Toggle theme</td></tr>
      <tr><td><kbd>Esc</kbd></td><td>Close modals</td></tr>
    </table>

    <h3 style="margin-top: 15px; font-size: 1.1em;">Basic Search</h3>
    <ul style="font-size: 0.9em; line-height: 1.6; padding-left: 20px;">
      <li><strong>Chinese:</strong> 你好, 学习</li>
      <li><strong>Pinyin:</strong> nihao, ni3hao3</li>
      <li><strong>English:</strong> hello, study</li>
      <li><strong>Sentences:</strong> Auto-segments long text</li>
    </ul>

    <h3 style="margin-top: 15px; font-size: 1.1em;">Advanced Search</h3>
    <ul style="font-size: 0.9em; line-height: 1.6; padding-left: 20px;">
      <li><strong>Wildcards:</strong> chin*, *文, b*g</li>
      <li><strong>Exclude:</strong> apple -phone</li>
      <li><strong>Field-specific:</strong> p:you, e:you, c:个</li>
      <li><strong>Exact phrase:</strong> "to use"</li>
    </ul>

    <h3 style="margin-top: 15px; font-size: 1.1em;">Features</h3>
    <ul style="font-size: 0.9em; line-height: 1.6; padding-left: 20px;">
      <li>📋 Copy definitions</li>
      <li>🔗 Share links</li>
      <li>📊 3 view modes: Table, Cards, List</li>
      <li>🌓 Dark/Light theme</li>
      <li>🔊 Text-to-speech pronunciation</li>
    </ul>

    <h3 style="margin-top: 15px; font-size: 1.1em;">About</h3>
    <p style="font-size: 0.85em; line-height: 1.5;">
      Dictionary data: <a href="https://www.mdbg.net/chinese/dictionary?page=cc-cedict" target="_blank" rel="noopener">CC-CEDICT</a><br>
      123,596+ entries | Client-side processing<br>
      Licensed: CC BY-SA 4.0
    </p>
  </div>
</div>
<script>
/**
 * Chinese Dictionary - Client-Side Search Application
 *
 * Features:
 * - Search by Chinese characters, Pinyin, or English
 * - Automatic sentence segmentation
 * - Multiple view modes (table, cards, list)
 * - Dark/light themes
 * - URL parameter handling and browser history
 *
 * Data: 123,596+ entries from CC-CEDICT
 * License: CC BY-SA 4.0
 */

// =============================================================================
// ADVANCED SEARCH QUERY PARSER
// =============================================================================

/**
 * Parse advanced search query with wildcards, exclusions, field-specific, and grouping
 * @param {string} query - Raw search query
 * @returns {Object} - Parsed query object with terms, exclusions, field, wildcards, etc.
 */
function parseSearchQuery(query) {
  const parsed = {
    include: [],      // Terms to include
    exclude: [],      // Terms to exclude (-)
    field: null,      // Field-specific search (p:, e:, c:)
    hasWildcard: false,
    originalQuery: query
  };

  // Extract quoted strings first (exact phrases)
  const quotedPattern = /"([^"]+)"/g;
  const quotes = [];
  let match;
  while ((match = quotedPattern.exec(query)) !== null) {
    quotes.push({ text: match[1], isQuoted: true });
  }

  // Remove quoted strings from query for further processing
  let remaining = query.replace(quotedPattern, '').trim();

  // Check for field-specific prefix at start
  const fieldMatch = remaining.match(/^([pec]):/i);
  if (fieldMatch) {
    parsed.field = fieldMatch[1].toLowerCase();
    remaining = remaining.substring(fieldMatch[0].length).trim();
  }

  // Split remaining into terms
  const terms = remaining.split(/\s+/).filter(t => t.length > 0);

  // Process each term
  terms.forEach(term => {
    // Check for field-specific prefix
    const termFieldMatch = term.match(/^([pec]):/i);
    if (termFieldMatch) {
      if (!parsed.field) parsed.field = termFieldMatch[1].toLowerCase();
      term = term.substring(termFieldMatch[0].length);
    }

    // Check for exclusion
    if (term.startsWith('-') && term.length > 1) {
      parsed.exclude.push(term.substring(1));
    }
    // Check for wildcard
    else if (term.includes('*')) {
      parsed.hasWildcard = true;
      parsed.include.push(term);
    }
    // Regular term
    else if (term.length > 0) {
      parsed.include.push(term);
    }
  });

  // Add quoted phrases to include list
  quotes.forEach(q => {
    parsed.include.push(q.text);
  });

  return parsed;
}

/**
 * Check if text matches wildcard pattern
 * @param {string} pattern - Pattern with * wildcards
 * @param {string} text - Text to match against
 * @returns {boolean} - True if matches
 */
function matchesWildcard(pattern, text) {
  if (!pattern.includes('*')) return text.includes(pattern);

  // Convert wildcard pattern to regex
  // Escape special regex chars except *
  const regexPattern = pattern
    .replace(/[.+?^${}()|[\]\\]/g, '\\$&')
    .replace(/\*/g, '.*');

  const regex = new RegExp('^' + regexPattern + '$', 'i');
  return regex.test(text);
}

// =============================================================================
// PINYIN PROCESSING
// =============================================================================

/**
 * Splits pinyin text into syllables
 * Example: "nihao" -> "ni hao"
 * @param {string} input - Pinyin text without spaces
 * @returns {string|null} - Space-separated syllables or null if splitting fails
 */
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
      return null; // Could not split, fallback to null
    }
  }
  return result.join(' ');
}

/**
 * Search dictionary entries by Pinyin (with advanced syntax support)
 * Handles: with/without tones, with/without spaces, wildcards, exclusions
 * @param {string} query - Pinyin search query
 * @param {Object} parsedQuery - Parsed query object (optional)
 * @returns {Array} - Matching dictionary entries (max 100)
 */
function searchPinyin(query, parsedQuery = null) {
  // Parse query if not already parsed
  if (!parsedQuery) {
    parsedQuery = parseSearchQuery(query);
  }

  // If field-specific and not pinyin, return empty
  if (parsedQuery.field && parsedQuery.field !== 'p') return [];

  let lower = parsedQuery.include.join(' ').toLowerCase().trim();
  let splitAttempt = null;
  let split = lower;

  // Try to split pinyin into syllables if not already spaced
  if (!lower.includes(' ') && !parsedQuery.hasWildcard) {
    splitAttempt = splitPinyinIntoSyllables(lower);
    if (splitAttempt) split = splitAttempt;
  }

  // Prepare search variants (with/without spaces, with/without tones)
  let searchTerms = [];
  if (lower) searchTerms.push(lower);
  if (split && split !== lower) searchTerms.push(split);

  // Generate variants with and without spaces
  let variants = [];
  for (const term of searchTerms) {
    variants.push(term.replace(/\s+/g, '')); // "nihao" or "ni3hao3"
    variants.push(term.replace(/\s+/g, ' ')); // "ni hao" or "ni3 hao3"
  }
  variants = Array.from(new Set(variants));

  // Check if query has tone numbers
  const hasTones = /\d/.test(lower);

  const results = [];
  dictionary.forEach(entry => {
    if (!entry.pinyin) return;
    const entryPinyinWithTones = entry.pinyinWithTones.trim();
    const entryPinyinNoTones = entry.pinyinSearchable.trim();
    const entryPinyinWithTonesNoSpaces = entryPinyinWithTones.replace(/\s+/g, '');
    const entryPinyinNoTonesNoSpaces = entryPinyinNoTones.replace(/\s+/g, '');

    // Match variants against dictionary entries
    let matched = false;
    let exactMatch = false;

    // Handle wildcard search
    if (parsedQuery.hasWildcard) {
      for (const term of parsedQuery.include) {
        if (term.includes('*')) {
          const targetPinyin = hasTones ? entryPinyinWithTones : entryPinyinNoTones;
          if (matchesWildcard(term, targetPinyin) || matchesWildcard(term, targetPinyin.replace(/\s+/g, ''))) {
            matched = true;
            exactMatch = true; // Treat wildcard matches as exact
            break;
          }
        }
      }
    } else {
      // Regular search
      for (const term of variants) {
        const termNoSpaces = term.replace(/\s+/g, '');

        // If query has tones, match with tones; otherwise match without tones
        if (hasTones) {
          if (entryPinyinWithTones === term || entryPinyinWithTonesNoSpaces === termNoSpaces) {
            matched = true;
            exactMatch = true;
            break;
          } else if (entryPinyinWithTones.includes(term) || entryPinyinWithTonesNoSpaces.includes(termNoSpaces)) {
            matched = true;
            exactMatch = false;
          }
        } else {
          if (entryPinyinNoTones === term || entryPinyinNoTonesNoSpaces === termNoSpaces) {
            matched = true;
            exactMatch = true;
            break;
          } else if (entryPinyinNoTones.includes(term) || entryPinyinNoTonesNoSpaces.includes(termNoSpaces)) {
            matched = true;
            exactMatch = false;
          }
        }
      }
    }

    // Check exclusions
    if (matched && parsedQuery.exclude.length > 0) {
      for (const excludeTerm of parsedQuery.exclude) {
        const targetText = (entry.searchableEnglish + ' ' + entry.pinyinSearchable + ' ' + entry.simplified).toLowerCase();
        if (targetText.includes(excludeTerm.toLowerCase())) {
          matched = false;
          break;
        }
      }
    }

    if (matched) results.push({...entry, exactMatch});
  });

  // If no exact matches found and query is reasonable length, try fuzzy matching
  if (results.length === 0 && lower.length >= 3 && lower.length <= 15 && !parsedQuery.hasWildcard) {
    const fuzzyResults = [];
    dictionary.forEach(entry => {
      if (!entry.pinyin) return;
      const entryPinyin = hasTones ? entry.pinyinWithTones : entry.pinyinSearchable;
      const entryPinyinNoSpaces = entryPinyin.replace(/\s+/g, '');

      // Try fuzzy match on both spaced and non-spaced versions
      for (const term of variants) {
        const termNoSpaces = term.replace(/\s+/g, '');
        if (isFuzzyMatch(term, entryPinyin, 2) ||
            isFuzzyMatch(termNoSpaces, entryPinyinNoSpaces, 2)) {
          const distance = Math.min(
            levenshteinDistance(term, entryPinyin),
            levenshteinDistance(termNoSpaces, entryPinyinNoSpaces)
          );

          // Check exclusions for fuzzy results too
          let excluded = false;
          if (parsedQuery.exclude.length > 0) {
            for (const excludeTerm of parsedQuery.exclude) {
              const targetText = (entry.searchableEnglish + ' ' + entry.pinyinSearchable + ' ' + entry.simplified).toLowerCase();
              if (targetText.includes(excludeTerm.toLowerCase())) {
                excluded = true;
                break;
              }
            }
          }

          if (!excluded) {
            fuzzyResults.push({ ...entry, fuzzyDistance: distance });
          }
          break;
        }
      }
    });

    // Sort by fuzzy distance (best matches first), then by length
    return fuzzyResults
      .sort((a, b) => a.fuzzyDistance - b.fuzzyDistance || a.simplified.length - b.simplified.length)
      .slice(0, 50)
      .map(r => { delete r.fuzzyDistance; return r; });
  }

  // Sort by exact match first, then by length; limit results
  return results
    .sort((a,b) => {
      // Exact matches first
      if (a.exactMatch && !b.exactMatch) return -1;
      if (!a.exactMatch && b.exactMatch) return 1;
      // Then by length
      return a.simplified.length - b.simplified.length;
    })
    .slice(0, 100)
    .map(r => { delete r.exactMatch; return r; });
}

// =============================================================================
// UTILITY FUNCTIONS
// =============================================================================

/**
 * Generate shareable URL for a dictionary entry
 * @param {Object} entry - Dictionary entry
 * @returns {string} - Full URL with query parameter
 */
function getShareLink(entry) {
  // Prefer simplified, fallback to pinyin, fallback to English
  let q = entry.simplified || entry.pinyin || (entry.english && entry.english[0]) || '';
  q = encodeURIComponent(q);
  return `${location.origin}${location.pathname}?q=${q}`;
}

// =============================================================================
// FUZZY MATCHING UTILITIES
// =============================================================================

/**
 * Calculate Levenshtein distance between two strings
 * Used for fuzzy matching to handle typos
 * @param {string} a - First string
 * @param {string} b - Second string
 * @returns {number} - Edit distance (lower = more similar)
 */
function levenshteinDistance(a, b) {
  if (a.length === 0) return b.length;
  if (b.length === 0) return a.length;

  const matrix = [];

  // Initialize matrix
  for (let i = 0; i <= b.length; i++) {
    matrix[i] = [i];
  }
  for (let j = 0; j <= a.length; j++) {
    matrix[0][j] = j;
  }

  // Fill matrix
  for (let i = 1; i <= b.length; i++) {
    for (let j = 1; j <= a.length; j++) {
      if (b.charAt(i - 1) === a.charAt(j - 1)) {
        matrix[i][j] = matrix[i - 1][j - 1];
      } else {
        matrix[i][j] = Math.min(
          matrix[i - 1][j - 1] + 1, // substitution
          matrix[i][j - 1] + 1,     // insertion
          matrix[i - 1][j] + 1      // deletion
        );
      }
    }
  }

  return matrix[b.length][a.length];
}

/**
 * Check if two strings are similar (fuzzy match)
 * @param {string} str1 - First string
 * @param {string} str2 - Second string
 * @param {number} maxDistance - Maximum allowed edit distance (default: 2)
 * @returns {boolean} - True if strings are similar enough
 */
function isFuzzyMatch(str1, str2, maxDistance = 2) {
  // Quick length check: if length difference is too large, can't be a match
  if (Math.abs(str1.length - str2.length) > maxDistance) {
    return false;
  }

  const distance = levenshteinDistance(str1.toLowerCase(), str2.toLowerCase());
  return distance <= maxDistance;
}

/**
 * Find fuzzy matches for a query in an array of strings
 * @param {string} query - Search query
 * @param {Array} candidates - Array of strings to search
 * @param {number} maxDistance - Maximum allowed edit distance (default: 2)
 * @returns {Array} - Array of objects with {value, distance}
 */
function findFuzzyMatches(query, candidates, maxDistance = 2) {
  const matches = [];
  const queryLower = query.toLowerCase();

  for (const candidate of candidates) {
    const candidateLower = candidate.toLowerCase();
    const distance = levenshteinDistance(queryLower, candidateLower);

    if (distance <= maxDistance) {
      matches.push({ value: candidate, distance });
    }
  }

  // Sort by distance (best matches first)
  return matches.sort((a, b) => a.distance - b.distance);
}

// =============================================================================
// GLOBAL STATE & CONSTANTS
// =============================================================================

let dictionary = [];                    // Main dictionary array (loaded from cedict.json)
let currentView = 'table';              // Current display mode: 'table', 'cards', or 'list'
let useWebWorker = localStorage.getItem('useWebWorker') !== 'false'; // Default: enabled

// DOM query shortcuts
const $ = sel => document.querySelector(sel);
const $$ = sel => document.querySelectorAll(sel);

// Security: Escape HTML to prevent XSS attacks
const escapeHTML = s => s.replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));

// Copy text to clipboard (requires HTTPS or localhost)
const copyToClipboard = text => navigator.clipboard?.writeText(text);

// =============================================================================
// WEB WORKER SETUP
// =============================================================================

let searchWorker = null;
let workerReady = false;
let pendingURLQuery = null; // Store URL query if dictionary not yet loaded

// Initialize Web Worker for background search processing
if (useWebWorker && typeof Worker !== 'undefined') {
  try {
    searchWorker = new Worker('search-worker.js');

    searchWorker.onmessage = function(e) {
      const { type, data } = e.data;

      switch (type) {
        case 'dictionaryLoaded':
          workerReady = true;
          console.log('✓ Search worker ready with ' + data + ' entries');
          break;

        case 'chunkAdded':
          console.log('✓ Worker dictionary updated: ' + data + ' total entries');
          break;

        case 'searchResults':
          displayWorkerResults(data);
          break;
      }
    };

    searchWorker.onerror = function(error) {
      console.error('Worker error:', error);
      useWebWorker = false;
      searchWorker = null;
    };
  } catch (err) {
    console.log('Web Workers not available, using main thread');
    useWebWorker = false;
  }
}

// =============================================================================
// DICTIONARY DATA PROCESSING
// =============================================================================

/**
 * Parse a dictionary entry from CC-CEDICT format
 * @param {Object} entry - Raw entry from cedict.json
 * @returns {Object} - Parsed entry with searchable fields
 */
function parseEntry(entry) {
  const traditional = entry.traditional || '';
  // Always parse from traditional field which contains: "trad simp [pinyin] /english/"
  const pinyinMatch = traditional.match(/\[(.*?)\]/);
  const pinyin = pinyinMatch ? pinyinMatch[1] : '';
  const englishMatch = traditional.match(/\/(.*?)\/$/);
  const englishDef = englishMatch ? englishMatch[1] : '';
  const englishArray = englishDef ? englishDef.split(/[;\/]/).map(e => e.trim()).filter(e=>e).slice(0,5) : [];

  // Extract traditional and simplified from the traditional field
  // Format is: "traditional simplified [pinyin] /english/"
  const parts = traditional.split(' ');
  let traditionalChars = parts[0] || '';
  let simplifiedChars = parts[0] || ''; // Default to same as traditional

  if (parts.length > 1 && /[\u4e00-\u9fff\u3400-\u4dbf]/.test(parts[1])) {
    // If second part is Chinese, it's the simplified form
    simplifiedChars = parts[1].replace(/\[.*?\].*/, '').trim();
    if (simplifiedChars === traditionalChars) {
      // They're the same, so both traditional and simplified use same chars
    } else {
      // They're different, first is traditional, second is simplified
      // traditionalChars already set above
    }
  }

  const pinyinSearchable = pinyin.toLowerCase().replace(/[0-9]/g,'');
  const pinyinWithTones = pinyin.toLowerCase();
  return {
    simplified: simplifiedChars,
    traditional: traditionalChars,
    pinyin,
    pinyinSearchable,
    pinyinWithTones,
    english: englishArray.length ? englishArray : ['(no definition)'],
    searchableEnglish: englishDef.toLowerCase()
  };
}

/**
 * Load and process dictionary data progressively
 * First tries to load from chunks (fast), falls back to full file (slow)
 */
async function loadDictionary() {
  const statusEl = $('#status');

  // Try progressive loading first
  try {
    const manifestRes = await fetch('dict_chunks/manifest.json');
    if (manifestRes.ok) {
      const manifest = await manifestRes.json();
      await loadDictionaryChunked(manifest);
      return;
    }
  } catch (err) {
    console.log('Chunks not available, loading full dictionary...');
  }

  // Fallback to full dictionary loading
  loadDictionaryFull();
}

/**
 * Load dictionary in chunks for progressive enhancement
 * Users can start searching after first chunk loads (~900KB vs 20MB)
 */
async function loadDictionaryChunked(manifest) {
  const statusEl = $('#status');
  const totalChunks = manifest.num_chunks;
  const totalEntries = manifest.total_entries;
  let loadedEntries = 0;

  statusEl.innerHTML = `<div class="loading">Loading dictionary chunks... (0/${totalChunks})</div>`;

  for (let i = 0; i < totalChunks; i++) {
    try {
      const chunkRes = await fetch(`dict_chunks/chunk_${i}.json`);
      const chunk = await chunkRes.json();

      // Process chunk
      const parsedChunk = [];
      chunk.forEach(entry => {
        const parsed = parseEntry(entry);
        if (parsed.simplified || parsed.traditional) {
          dictionary.push(parsed);
          parsedChunk.push(parsed);
        }
      });

      // Send chunk to web worker if available
      if (searchWorker) {
        searchWorker.postMessage({
          type: i === 0 ? 'loadDictionary' : 'addChunk',
          data: i === 0 ? parsedChunk : parsedChunk
        });
      }

      loadedEntries += chunk.length;

      // Enable search after first chunk loads
      if (i === 0) {
        $('#search').disabled = false;
        $('#search').placeholder = 'Type Chinese, Pinyin, or English...';
        statusEl.innerHTML = `<div class="loading">✓ Ready! Loading more entries in background... (${loadedEntries.toLocaleString()}/${totalEntries.toLocaleString()})</div>`;

        // Execute pending URL query if exists
        if (pendingURLQuery) {
          performSearch();
          pendingURLQuery = null;
        } else {
          $('#search').focus();
        }
      } else {
        statusEl.innerHTML = `<div class="loading">Loading... ${loadedEntries.toLocaleString()}/${totalEntries.toLocaleString()} entries (${((loadedEntries/totalEntries)*100).toFixed(0)}%)</div>`;
      }

      // Allow UI to breathe between chunks
      await new Promise(resolve => setTimeout(resolve, 10));

    } catch (err) {
      console.error(`Failed to load chunk ${i}:`, err);
    }
  }

  // All chunks loaded
  statusEl.style.display = 'none';
  console.log(`✅ Loaded ${dictionary.length.toLocaleString()} dictionary entries`);
}

/**
 * Fallback: Load full dictionary (slower initial load)
 * Uses chunked processing with requestIdleCallback to avoid blocking UI
 */
function loadDictionaryFull() {
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
          $('#search').disabled = false;
          statusEl.style.display = 'none';
          $('#search').placeholder = 'Type Chinese, Pinyin, or English...';

          // Execute pending URL query if exists
          if (pendingURLQuery) {
            performSearch();
            pendingURLQuery = null;
          } else {
            $('#search').focus();
          }
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

/**
 * Colorize pinyin syllables by tone
 * Tone 1=red, 2=orange, 3=green, 4=blue, 5=purple
 * @param {string} pinyin - Pinyin text with tone numbers
 * @param {string} highlight - Optional text to highlight
 * @returns {string} - HTML with styled spans
 */
function colorizePinyin(pinyin, highlight='') {
  if (!pinyin) return '<span style="color:#aaa;">—</span>';
  return pinyin.split(' ').map(syl => {
    const tone = syl.match(/[1-5]$/);
    let html = escapeHTML(syl);
    if(highlight && syl.includes(highlight)) html = `<mark>${html}</mark>`;
    return `<span class="tone${tone?tone[0]:''}">${html}</span>`;
  }).join(' ');
}

// =============================================================================
// SEARCH ALGORITHMS
// =============================================================================

/**
 * Detect input type: chinese, pinyin, or english
 * Uses heuristics to distinguish between Pinyin and English
 * @param {string} text - User input
 * @returns {string} - 'chinese', 'pinyin', or 'english'
 */
function detectInputType(text) {
  const chineseRegex = /[\u4e00-\u9fff\u3400-\u4dbf]/;
  if (chineseRegex.test(text)) return 'chinese';
  const cleanText = text.toLowerCase().trim();
  const pinyinRegex = /^[a-z]+[0-5]?(\s*[a-z]+[0-5]?)*$/;
  const commonEnglish = ['a','i','me','you','he','she','it','we','they','can','will','would','should'];
  if (pinyinRegex.test(cleanText) && !commonEnglish.includes(cleanText)) {
    if (/[0-5]/.test(cleanText)) return 'pinyin';
    // Try to split into syllables if no spaces
    let syllables = cleanText.split(/\s+/);
    if (syllables.length === 1 && !cleanText.includes(' ')) {
      const split = splitPinyinIntoSyllables(cleanText);
      if (split) syllables = split.split(/\s+/);
    }
    const pinyinPatterns = /^(zh|ch|sh|[bpmfdtnlgkhjqxrzcsyw])?[aeiouü]+n?g?$/;
    const likelyPinyin = syllables.every(syl => pinyinPatterns.test(syl));
    return likelyPinyin ? 'pinyin' : 'english';
  }
  return 'english';
}

/**
 * Search dictionary by Chinese characters (with advanced syntax support)
 * Prioritizes exact matches, then substring matches, supports wildcards and exclusions
 * @param {string} query - Chinese text
 * @param {Object} parsedQuery - Parsed query object (optional)
 * @returns {Array} - Matching entries (max 100)
 */
function searchChinese(query, parsedQuery = null) {
  // Parse query if not already parsed
  if (!parsedQuery) {
    parsedQuery = parseSearchQuery(query);
  }

  // If field-specific and not Chinese, return empty
  if (parsedQuery.field && parsedQuery.field !== 'c') return [];

  const results = [];
  const cleanQuery = parsedQuery.include.join('').replace(/[，。！？；：、\s]/g,'');

  dictionary.forEach(entry => {
    let matched = false;

    // Handle wildcard search
    if (parsedQuery.hasWildcard) {
      for (const term of parsedQuery.include) {
        if (term.includes('*')) {
          if (matchesWildcard(term, entry.simplified) || matchesWildcard(term, entry.traditional)) {
            matched = true;
            break;
          }
        }
      }
    } else {
      // Regular search
      if (entry.simplified === cleanQuery || entry.traditional === cleanQuery) {
        matched = true;
        results.push({...entry, exactMatch:true});
      } else if (cleanQuery.length===1 && (entry.simplified.includes(cleanQuery)||entry.traditional.includes(cleanQuery))) {
        matched = true;
        results.push({...entry, exactMatch:false});
      }
    }

    // Check exclusions
    if (matched && parsedQuery.exclude.length > 0) {
      for (const excludeTerm of parsedQuery.exclude) {
        const targetText = (entry.searchableEnglish + ' ' + entry.pinyinSearchable + ' ' + entry.simplified).toLowerCase();
        if (targetText.includes(excludeTerm.toLowerCase())) {
          matched = false;
          break;
        }
      }
    }

    if (matched && parsedQuery.hasWildcard) {
      results.push({...entry, exactMatch:true});
    }
  });

  return results.sort((a,b) => (a.exactMatch&&!b.exactMatch?-1:!a.exactMatch&&b.exactMatch?1:a.simplified.length-b.simplified.length)).slice(0,100).map(r=>{delete r.exactMatch;return r;});
}

/**
 * Search dictionary by English keywords (with advanced syntax support)
 * Uses relevance scoring to rank results, supports wildcards, exclusions, and exact phrases
 * @param {string} query - English text
 * @param {Object} parsedQuery - Parsed query object (optional)
 * @returns {Array} - Matching entries sorted by relevance (max 100)
 */
function searchEnglish(query, parsedQuery = null) {
  // Parse query if not already parsed
  if (!parsedQuery) {
    parsedQuery = parseSearchQuery(query);
  }

  // If field-specific and not English, return empty
  if (parsedQuery.field && parsedQuery.field !== 'e') return [];

  const results = [];
  const searchTerms = parsedQuery.include.map(t => t.toLowerCase());

  dictionary.forEach(entry => {
    if (!entry.searchableEnglish) return;

    let matched = false;
    let matchCount = 0;

    // Handle wildcard search
    if (parsedQuery.hasWildcard) {
      for (const term of searchTerms) {
        if (term.includes('*')) {
          const englishWords = entry.searchableEnglish.split(/[\s\/;,]+/);
          for (const word of englishWords) {
            if (matchesWildcard(term, word)) {
              matched = true;
              matchCount++;
              break;
            }
          }
        } else {
          if (entry.searchableEnglish.includes(term)) {
            matched = true;
            matchCount++;
          }
        }
      }
    } else {
      // Regular search
      for (const term of searchTerms) {
        const termMatch = term.length<=2 ?
          new RegExp(`\\b${term}\\b`,'i').test(entry.searchableEnglish) :
          entry.searchableEnglish.includes(term);
        if (termMatch) {
          matched = true;
          matchCount++;
        }
      }
    }

    // Check exclusions
    if (matched && parsedQuery.exclude.length > 0) {
      for (const excludeTerm of parsedQuery.exclude) {
        if (entry.searchableEnglish.includes(excludeTerm.toLowerCase())) {
          matched = false;
          break;
        }
      }
    }

    if(matched){
      results.push({...entry, relevance:matchCount*10+calculateRelevance(entry.searchableEnglish,searchTerms)});
    }
  });

  // If no exact matches and single term query (no wildcards), try fuzzy matching
  if (results.length === 0 && searchTerms.length === 1 && searchTerms[0].length >= 4 && !parsedQuery.hasWildcard) {
    const fuzzyResults = [];
    const queryTerm = searchTerms[0];

    dictionary.forEach(entry => {
      if (!entry.searchableEnglish) return;
      const englishWords = entry.searchableEnglish.split(/[\s\/;,]+/);

      for (const word of englishWords) {
        if (isFuzzyMatch(queryTerm, word, 2)) {
          const distance = levenshteinDistance(queryTerm, word);

          // Check exclusions for fuzzy results too
          let excluded = false;
          if (parsedQuery.exclude.length > 0) {
            for (const excludeTerm of parsedQuery.exclude) {
              if (entry.searchableEnglish.includes(excludeTerm.toLowerCase())) {
                excluded = true;
                break;
              }
            }
          }

          if (!excluded) {
            fuzzyResults.push({ ...entry, fuzzyDistance: distance });
          }
          break;
        }
      }
    });

    // Sort by fuzzy distance, then limit results
    return fuzzyResults
      .sort((a, b) => a.fuzzyDistance - b.fuzzyDistance)
      .slice(0, 50)
      .map(r => { delete r.fuzzyDistance; return r; });
  }

  return results.sort((a,b)=>b.relevance-a.relevance).slice(0,100).map(r=>{delete r.relevance;return r;});
}
/**
 * Calculate relevance score for English search results
 * @param {string} text - English definition text
 * @param {Array} searchTerms - Array of search keywords
 * @returns {number} - Relevance score (higher is better)
 */
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
/**
 * Segment Chinese sentence into words using greedy longest-match algorithm
 * Note: This is a simple greedy algorithm. For better results, consider
 * implementing Viterbi algorithm or dynamic programming approach.
 * @param {string} sentence - Chinese sentence
 * @returns {Array} - Array of dictionary entries representing words
 */
function segmentSentence(sentence) {
  const results = [];
  let i = 0;
  const cleanSentence = sentence.replace(/[，。！？；：、\s]/g,'');
  while (i < cleanSentence.length) {
    let match = null, maxLen = 0;
    for (let len = Math.min(10, cleanSentence.length - i); len >= 1; len--) {
      const slice = cleanSentence.slice(i, i + len);
      const entries = dictionary.filter(e =>
        e.simplified === slice || e.traditional === slice
      );
      if (entries.length > 0) {
        // Prefer entries with neutral tone (tone 5) for single characters,
        // as they're typically grammatical particles (like 吗 ma5)
        if (slice.length === 1) {
          const neutralTone = entries.find(e => e.pinyinWithTones && /[a-z]5/.test(e.pinyinWithTones));
          match = neutralTone || entries[0];
        } else {
          match = entries[0];
        }
        maxLen = len;
        break;
      }
    }
    if (match) {
      results.push({ ...match });
      i += maxLen;
    } else {
      const char = cleanSentence[i];
      if (/[\u4e00-\u9fff\u3400-\u4dbf]/.test(char)) {
        const entries = dictionary.filter(e =>
          e.simplified === char || e.traditional === char
        );
        if (entries.length > 0) {
          // Prefer neutral tone for single characters
          const neutralTone = entries.find(e => e.pinyinWithTones && /[a-z]5/.test(e.pinyinWithTones));
          results.push({ ...(neutralTone || entries[0]) });
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
// =============================================================================
// RENDERING FUNCTIONS
// =============================================================================

/**
 * Render results as card grid
 * Uses data attributes for event handling (XSS safe)
 * @param {Array} segments - Dictionary entries to display
 * @param {string} query - Search query for highlighting
 * @returns {string} - HTML string
 */
function renderCards(segments, query='') {
  return `<div class="cards-view">${segments.map(entry=>{
    const defText = `${entry.simplified} (${entry.pinyin}) - ${entry.english.join('; ')}`;
    const shareUrl = getShareLink(entry);
    // Use data attributes instead of inline event handlers for better security
    return `
      <div class="word-card" tabindex="0" aria-label="${escapeHTML(entry.simplified)}" data-simp="${escapeHTML(entry.simplified)}" data-trad="${escapeHTML(entry.traditional)}">
        <div class="actions">
          <button class="speak-btn" title="Pronounce" aria-label="Speak pronunciation" data-text="${escapeHTML(entry.simplified)}">🔊</button>
          <button class="copy-btn" title="Copy" aria-label="Copy" data-copy="${escapeHTML(defText)}">📋</button>
          <button class="share-btn" title="Copy share link" aria-label="Share link" data-share="${escapeHTML(shareUrl)}">🔗</button>
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
/**
 * Render results as table
 * @param {Array} segments - Dictionary entries to display
 * @param {string} query - Search query for highlighting
 * @returns {string} - HTML string
 */
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
          <td>
            <button class="speak-btn" title="Pronounce" aria-label="Speak pronunciation" data-text="${escapeHTML(entry.simplified)}">🔊</button>
            <button class="share-btn" title="Copy share link" aria-label="Share link" data-share="${escapeHTML(shareUrl)}">🔗</button>
          </td>
        </tr>
      `;
    }).join('')}</tbody>
  </table>`;
}
/**
 * Render results as compact list
 * @param {Array} segments - Dictionary entries to display
 * @param {string} query - Search query for highlighting
 * @returns {string} - HTML string
 */
function renderList(segments, query='') {
  return `<div class="list-view">${segments.map(entry => {
    const shareUrl = getShareLink(entry);
    return `
    <div class="list-entry">
      <span class="chinese">${highlight(entry.simplified,query)}</span>
      <span class="pinyin">${colorizePinyin(entry.pinyin,query)}</span>
      <span class="english">${highlight(entry.english.join('; '),query)}</span>
      <button class="speak-btn" title="Pronounce" aria-label="Speak pronunciation" data-text="${escapeHTML(entry.simplified)}">🔊</button>
      <button class="share-btn" title="Copy share link" aria-label="Share link" data-share="${escapeHTML(shareUrl)}">🔗</button>
    </div>
  `;
  }).join('')}</div>`;
}
/**
 * Highlight search query in text
 * @param {string} text - Text to highlight
 * @param {string} query - Query to highlight
 * @returns {string} - HTML with <mark> tags
 */
function highlight(text, query) {
  if (!query || !text) return escapeHTML(text||'');
  let safeQuery = escapeHTML(query);
  return text.replace(new RegExp("("+safeQuery+")", "gi"), '<mark>$1</mark>');
}
// =============================================================================
// MAIN SEARCH LOGIC
// =============================================================================

const searchInput = $('#search');
const resultsDiv = $('#results');
const resultsHeader = $('.results-header');

/**
 * Main search function - detects input type and routes to appropriate search
 * Updates UI with results and URL parameters
 * Uses Web Worker when available for better performance
 */
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

  // Use Web Worker if available for background processing
  if (searchWorker && workerReady) {
    searchWorker.postMessage({
      type: 'search',
      data: { query }
    });
    return;
  }

  // Fallback to main thread search
  performSearchMainThread(query);
}

/**
 * Display search results from Web Worker
 */
function displayWorkerResults(data) {
  const { results, inputType } = data;
  const query = searchInput.value.trim();

  if (!results.length) {
    resultsHeader.style.display='none';
    resultsDiv.innerHTML = `<div class="empty-state"><p>No results for "${escapeHTML(query)}"</p><p style="font-size: 13px; margin-top: 6px; color: #aaa;">${inputType==='pinyin'?'Try with or without tone numbers':'Try simpler keywords or different terms'}</p></div>`;
    return;
  }

  const searchTypeLabel = inputType==='chinese' ? ' (Chinese search)' : inputType==='pinyin' ? ' (Pinyin search)' : ' (English → Chinese)';

  resultsHeader.style.display='flex';
  $('.results-count').innerHTML = `<span id="wordCount">${results.length}</span> results${searchTypeLabel}`;
  if (currentView==='cards') resultsDiv.innerHTML = renderCards(results,query);
  else if (currentView==='list') resultsDiv.innerHTML = renderList(results,query);
  else resultsDiv.innerHTML = renderTable(results,query);

  // Update URL with current search
  if (typeof updateURL === 'function') {
    updateURL(query, true);
  }
}

/**
 * Fallback search on main thread (when worker not available)
 */
function performSearchMainThread(query) {
  // Parse the query for advanced syntax
  const parsedQuery = parseSearchQuery(query);

  // Determine input type from original query (before parsing)
  const inputType = detectInputType(parsedQuery.include.join(' '));
  let segments=[],searchTypeLabel='';

  // If field-specific search is specified, override detection
  if (parsedQuery.field === 'c') {
    segments = searchChinese(query, parsedQuery);
    searchTypeLabel = ' (Chinese search)';
  } else if (parsedQuery.field === 'p') {
    segments = searchPinyin(query, parsedQuery);
    searchTypeLabel = ' (Pinyin search)';
  } else if (parsedQuery.field === 'e') {
    segments = searchEnglish(query, parsedQuery);
    searchTypeLabel = ' (English search)';
  }
  // Auto-detect if no field specified
  else if (inputType==='chinese') {
    if(query.length>4||/[，。！？；：、]/.test(query)){
      segments = segmentSentence(query);
      searchTypeLabel = ' (sentence segmentation)';
    } else {
      segments = searchChinese(query, parsedQuery);
      searchTypeLabel = ' (character search)';
      if (!segments.length) {
        segments = segmentSentence(query);
        searchTypeLabel = ' (segmented)';
      }
    }
  } else if (inputType==='pinyin') {
    segments = searchPinyin(query, parsedQuery);
    searchTypeLabel = ' (Pinyin search)';
    if (!segments.length) {
      segments = searchEnglish(query, parsedQuery);
      if (segments.length) searchTypeLabel = ' (English → Chinese)';
    }
  } else {
    segments = searchEnglish(query, parsedQuery);
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

  // Update URL with current search (use replaceState to avoid cluttering history)
  if (typeof updateURL === 'function') {
    updateURL(query, true);
  }
}
// =============================================================================
// EVENT HANDLERS
// =============================================================================

// =============================================================================
// TEXT-TO-SPEECH FUNCTIONALITY
// =============================================================================

/**
 * Speak Chinese text using Web Speech API
 * @param {string} text - Chinese text to pronounce
 */
function speakChinese(text) {
  if (!text) return;

  // Check if speech synthesis is available
  if (!('speechSynthesis' in window)) {
    alert('Sorry, your browser does not support text-to-speech.');
    return;
  }

  // Cancel any ongoing speech
  window.speechSynthesis.cancel();

  const utterance = new SpeechSynthesisUtterance(text);

  // Set language to Chinese (Mandarin)
  utterance.lang = 'zh-CN';

  // Set voice properties
  utterance.rate = 0.9; // Slightly slower for clarity
  utterance.pitch = 1.0;
  utterance.volume = 1.0;

  // Try to find a Chinese voice
  const voices = window.speechSynthesis.getVoices();
  const chineseVoice = voices.find(voice =>
    voice.lang.startsWith('zh') || voice.lang.startsWith('cmn')
  );

  if (chineseVoice) {
    utterance.voice = chineseVoice;
  }

  // Error handling
  utterance.onerror = function(event) {
    console.error('Speech synthesis error:', event);
  };

  window.speechSynthesis.speak(utterance);
}

// Load voices when they become available (needed for some browsers)
if ('speechSynthesis' in window) {
  window.speechSynthesis.onvoiceschanged = function() {
    window.speechSynthesis.getVoices();
  };
}

/**
 * Event delegation for dynamically created buttons
 * Using data attributes instead of inline onclick handlers (XSS safe)
 */
document.addEventListener('click', function(e) {
  // Handle speak buttons
  if (e.target.classList.contains('speak-btn')) {
    const text = e.target.getAttribute('data-text');
    if (text) speakChinese(text);
  }
  // Handle copy buttons
  else if (e.target.classList.contains('copy-btn')) {
    const text = e.target.getAttribute('data-copy');
    if (text) copyToClipboard(text);
  }
  // Handle share buttons
  else if (e.target.classList.contains('share-btn')) {
    const url = e.target.getAttribute('data-share');
    if (url) copyToClipboard(url);
  }
});
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

// Speak query button - shows when there's Chinese text in search
const speakQueryBtn = $('#speakQueryBtn');
searchInput.addEventListener('input', () => {
  const hasChinese = /[\u4e00-\u9fff\u3400-\u4dbf]/.test(searchInput.value);
  speakQueryBtn.style.display = hasChinese ? 'inline-block' : 'none';
});

speakQueryBtn.addEventListener('click', () => {
  const query = searchInput.value.trim();
  if (query) speakChinese(query);
});

// =============================================================================
// VOICE INPUT SETUP
// =============================================================================

// Check if Web Speech API is available
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
let recognition = null;
let isListening = false;

if (SpeechRecognition) {
  // Show voice button if API is available
  const voiceBtn = $('#voiceBtn');
  voiceBtn.style.display = 'inline-block';

  // Initialize speech recognition
  recognition = new SpeechRecognition();
  recognition.continuous = false;
  recognition.interimResults = false;
  recognition.maxAlternatives = 1;

  // Support both Chinese and English
  recognition.lang = 'zh-CN'; // Default to Chinese, will auto-detect

  // Handle recognition results
  recognition.onresult = (event) => {
    const transcript = event.results[0][0].transcript;
    searchInput.value = transcript;
    performSearch();
    isListening = false;
    voiceBtn.textContent = '🎤';
    voiceBtn.style.background = '';
  };

  // Handle errors
  recognition.onerror = (event) => {
    console.error('Speech recognition error:', event.error);
    isListening = false;
    voiceBtn.textContent = '🎤';
    voiceBtn.style.background = '';

    if (event.error === 'no-speech') {
      $('#status').innerHTML = '<div style="color: var(--muted); font-style: italic;">No speech detected. Please try again.</div>';
      setTimeout(() => { $('#status').style.display = 'none'; }, 2000);
    }
  };

  // Handle end of recognition
  recognition.onend = () => {
    isListening = false;
    voiceBtn.textContent = '🎤';
    voiceBtn.style.background = '';
  };

  // Voice button click handler
  voiceBtn.addEventListener('click', () => {
    if (isListening) {
      // Stop listening
      recognition.stop();
      isListening = false;
      voiceBtn.textContent = '🎤';
      voiceBtn.style.background = '';
    } else {
      // Start listening
      try {
        recognition.start();
        isListening = true;
        voiceBtn.textContent = '🔴';
        voiceBtn.style.background = 'linear-gradient(90deg, #ef4444 90%, #dc2626 100%)';
        voiceBtn.style.color = '#fff';
        $('#status').innerHTML = '<div style="color: var(--primary); font-style: italic;">🎤 Listening... (speak in Chinese or English)</div>';
        $('#status').style.display = 'block';
      } catch (error) {
        console.error('Failed to start speech recognition:', error);
      }
    }
  });
}

$$('.view-btn').forEach(btn => {
  btn.addEventListener('click', e => {
    const view = e.target.dataset.view;
    if(view===currentView) return;
    $$('.view-btn').forEach(b=>b.classList.remove('active'));
    e.target.classList.add('active');
    currentView = view;
    performSearch();
    // Update URL when view changes
    if (typeof updateURL === 'function') {
      updateURL(searchInput.value, true);
    }
  });
});
const toggleThemeBtn = $('#toggleTheme');
toggleThemeBtn.addEventListener('click', () => {
  document.body.classList.toggle('dark');
  document.body.classList.toggle('light');
  const isDark = document.body.classList.contains('dark');
  toggleThemeBtn.textContent = isDark ? "☀️" : "🌙";
  localStorage.setItem('theme', isDark ? 'dark' : 'light');
  // Update URL when theme changes
  if (typeof updateURL === 'function') {
    updateURL(searchInput.value, true);
  }
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
  if(e.key==='Escape'){
    if($('#helpModal').style.display==='block') closeHelp();
  }
});

$('#helpBtn').addEventListener('click', () => {
  $('#helpModal').style.display = 'block';
});
$('#closeHelp').addEventListener('click', closeHelp);
function closeHelp(){ $('#helpModal').style.display = 'none'; }

// =============================================================================
// URL PARAMETER HANDLING & BROWSER HISTORY
// =============================================================================

/**
 * Parse URL query parameters
 * @returns {Object} - Object with q, view, theme parameters
 */
function getURLParams() {
  const params = new URLSearchParams(window.location.search);
  return {
    q: params.get('q') || '',
    view: params.get('view') || null,
    theme: params.get('theme') || null
  };
}

/**
 * Update URL with current search state
 * @param {string} query - Search query
 * @param {boolean} replaceState - Use replaceState instead of pushState
 */
function updateURL(query, replaceState = false) {
  const url = new URL(window.location);
  if (query && query.trim()) {
    url.searchParams.set('q', query);
  } else {
    url.searchParams.delete('q');
  }
  url.searchParams.set('view', currentView);
  url.searchParams.set('theme', document.body.classList.contains('dark') ? 'dark' : 'light');

  if (replaceState) {
    window.history.replaceState({}, '', url);
  } else {
    window.history.pushState({}, '', url);
  }
}

// Load parameters from URL on page load
window.addEventListener('DOMContentLoaded', () => {
  const params = getURLParams();

  // Apply theme from URL
  if (params.theme === 'light' && document.body.classList.contains('dark')) {
    toggleThemeBtn.click();
  } else if (params.theme === 'dark' && document.body.classList.contains('light')) {
    toggleThemeBtn.click();
  }

  // Apply view mode from URL
  if (params.view && ['table', 'cards', 'list'].includes(params.view)) {
    currentView = params.view;
    $$('.view-btn').forEach(btn => {
      btn.classList.toggle('active', btn.dataset.view === params.view);
    });
  }

  // Load query from URL - but wait for dictionary to load first
  if (params.q && searchInput) {
    searchInput.value = params.q;
    if (searchInput.disabled) {
      // Dictionary not ready yet, store for later
      pendingURLQuery = params.q;
    } else {
      // Dictionary already loaded, search immediately
      performSearch();
    }
  }

  if (searchInput && !searchInput.disabled) searchInput.focus();
});

// Handle browser back/forward buttons
window.addEventListener('popstate', () => {
  const params = getURLParams();
  if (searchInput) {
    searchInput.value = params.q;
    performSearch();
  }
});

// =============================================================================
// SERVICE WORKER REGISTRATION (PWA Support)
// =============================================================================

if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('./service-worker.js')
      .then(registration => {
        console.log('✓ ServiceWorker registered:', registration.scope);

        // Check for updates
        registration.addEventListener('updatefound', () => {
          const newWorker = registration.installing;
          newWorker.addEventListener('statechange', () => {
            if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
              // New service worker available, show update prompt
              console.log('New version available! Refresh to update.');
              // You could show a toast notification here
            }
          });
        });
      })
      .catch(error => {
        console.log('ServiceWorker registration failed:', error);
      });
  });

  // Handle service worker messages
  navigator.serviceWorker.addEventListener('message', event => {
    console.log('Message from service worker:', event.data);
  });
}

// PWA install prompt
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
  // Prevent the mini-infobar from appearing on mobile
  e.preventDefault();
  // Stash the event so it can be triggered later
  deferredPrompt = e;
  console.log('PWA install prompt available');

  // Optionally, show your own install button here
  // For now, we'll just log it
});

window.addEventListener('appinstalled', () => {
  console.log('PWA was installed');
  deferredPrompt = null;
});
</script>
</body>
</html>