# Chinese Dictionary 📖

A fast, client-side Chinese-English dictionary with instant word segmentation, Pinyin lookup, and translation features. Built with vanilla JavaScript for maximum performance.

## ✨ Features

### Core Functionality
- **123,596+ dictionary entries** from CC-CEDICT
- **Smart search** - Search by Chinese characters, Pinyin, or English
- **Sentence segmentation** - Automatically breaks down Chinese sentences into individual words
- **Instant results** - Real-time search as you type
- **Multiple input methods** - Type, paste, or use keyboard shortcuts

### Search Capabilities
- **Chinese character search** - Direct lookup and substring matching
- **Pinyin search** - Works with or without tone numbers
- **English search** - Relevance-ranked results
- **Automatic syllable splitting** - Converts "nihao" to "ni hao"
- **Fuzzy matching** - Finds results with flexible spacing

### Display Options
- **Three view modes**:
  - 📊 **Table view** - Organized rows and columns
  - 🎴 **Card view** - Visual grid layout
  - 📝 **List view** - Compact linear format
- **Pinyin tone colorization** - Visual tone indicators
- **Dark/Light themes** - Eye-friendly reading modes
- **Responsive design** - Works on desktop and mobile

### User Experience
- **Favorites system** - Bookmark words for later study (optional)
- **Copy & share** - One-click copy definitions or share links
- **Keyboard shortcuts** - Fast navigation and controls
- **Adjustable font size** - Customizable text size
- **Offline-capable** - All data loaded client-side
- **No tracking** - Privacy-focused design

## 🚀 Quick Start

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/doctorslop/chinesedictionary.git
   cd chinesedictionary
   ```

2. **Serve with a web server:**
   ```bash
   # Using Python 3
   python3 -m http.server 8000

   # Using PHP
   php -S localhost:8000

   # Using Node.js (http-server)
   npx http-server -p 8000
   ```

3. **Open in browser:**
   ```
   http://localhost:8000/index.php
   ```

### Requirements
- Modern web browser (Chrome, Firefox, Safari, Edge)
- Web server to serve the dictionary JSON file
- ~20MB of bandwidth for initial dictionary load

## 📖 Usage Guide

### Basic Search

**Search Chinese:**
```
你好    → Returns "hello"
学习    → Returns "to study"
```

**Search Pinyin:**
```
nihao   → Returns 你好 (hello)
ni3hao3 → Returns 你好 (hello) with tones
xue xi  → Returns 学习 (to study)
```

**Search English:**
```
hello   → Returns 你好
study   → Returns 学习, 研究, etc.
```

### Sentence Segmentation

Type or paste a Chinese sentence to automatically break it into words:
```
我喜欢学习中文 → 我 | 喜欢 | 学习 | 中文
```

### Keyboard Shortcuts

| Shortcut | Action |
|----------|--------|
| `Ctrl + L` | Clear search field and focus |
| `Ctrl + D` | Toggle dark/light theme |
| `Esc` | Close settings modal |

### Features in Detail

**Copy Functionality:**
- 📋 Click the clipboard icon to copy word definition
- 🔗 Click the link icon to copy shareable URL

**Favorites (Optional):**
- Enable in Settings (⚙️)
- Star (★) to save words
- Saved to browser localStorage

**View Modes:**
- Switch between Table, Cards, and List views
- Preference remembered in your browser

**Theme Toggle:**
- Click ☀️/🌙 button in header
- System preference detected automatically
- Choice saved across sessions

## 🛠️ Technical Details

### Architecture
- **Frontend:** Vanilla JavaScript (ES6+)
- **Styling:** Custom CSS with CSS variables
- **Data:** CC-CEDICT in JSON format
- **Storage:** localStorage for preferences

### Performance
- Client-side processing (no server calls after load)
- Optimized search algorithms
- Debounced input (220ms delay)
- Chunked dictionary processing
- Limited to 100 results per search

### Data Source
Dictionary data from [CC-CEDICT](https://www.mdbg.net/chinese/dictionary?page=cc-cedict):
- License: Creative Commons Attribution-ShareAlike 4.0
- Entries: 123,596+ words and phrases
- Updated: Regularly maintained community project

## 🔧 Configuration

### Font Size
Access via Settings (⚙️):
- Small (13px)
- Normal (15px) - default
- Large (17px)
- Extra Large (19px)

### URL Parameters
Share specific searches via URL:
```
index.php?q=你好       → Pre-fills search with "你好"
```

## 📊 Browser Support

| Browser | Minimum Version |
|---------|----------------|
| Chrome | 90+ |
| Firefox | 88+ |
| Safari | 14+ |
| Edge | 90+ |

**Required Features:**
- ES6 JavaScript
- CSS Variables
- Fetch API
- localStorage
- Clipboard API (for copy features)

## ⚡ Performance Features

### Progressive Loading
- **Chunked Dictionary Loading** - Dictionary split into 25 chunks (~900KB each)
- **Fast Initial Load** - Search available after loading just first chunk (900KB vs 20MB)
- **Background Loading** - Remaining chunks load while you search
- **Result**: 20x faster time-to-interactive

### Web Workers
- **Background Search Processing** - Search runs in separate thread
- **Non-Blocking UI** - Interface stays responsive during heavy searches
- **Automatic Fallback** - Uses main thread if workers unavailable

### Fuzzy Matching
- **Typo Tolerance** - Handles spelling errors in pinyin and English
- **Levenshtein Distance** - Up to 2 character differences
- **Smart Fallback** - Only triggers when exact matches fail
- **Examples**: "nihoa" → "nihao", "studdy" → "study"

### Voice Input
- **Web Speech API** - Speak Chinese or English
- **Hands-Free Search** - Click 🎤 button and speak
- **Auto-Detection** - Recognizes Chinese (zh-CN) and English
- **Browser Support**: Chrome, Edge, Safari

### PWA Support
- **Install as App** - Works like native app on desktop/mobile
- **Offline Access** - Service worker caches dictionary chunks
- **Fast Startup** - Loads from cache when offline
- **Auto-Updates** - New versions install automatically

## 🧪 Testing

Unit tests available at `tests.html`:
- Pinyin syllable splitting
- Input type detection
- Chinese/Pinyin/English search
- Fuzzy matching algorithms
- Relevance scoring
- Edge cases and regressions

## 🚧 Known Limitations

1. **Result Limit** - Maximum 100 results per search (50 for fuzzy matches)
2. **Greedy Segmentation** - May not find optimal sentence segmentation
3. **Fuzzy Matching Scope** - Only for pinyin/English, not Chinese characters
4. **Voice Input Browser Support** - Chrome, Edge, Safari (not Firefox)

## 🔮 Future Improvements

See [Issues](https://github.com/doctorslop/chinesedictionary/issues) for roadmap:
- [ ] Search indexing with trie/hash maps
- [ ] Better segmentation algorithm (Viterbi/DP)
- [ ] Export to CSV/Anki
- [ ] Advanced search filters (HSK level, word length)
- [ ] Example sentences from Tatoeba
- [ ] Audio pronunciation (TTS)
- [ ] Character stroke order animations
- [ ] Handwriting input

## 🤝 Contributing

Contributions welcome! Please:
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

Areas needing help:
- Performance optimization
- Mobile UX improvements
- Additional language pairs
- Documentation

## 📄 License

This project is open source. Dictionary data (CC-CEDICT) is licensed under Creative Commons Attribution-ShareAlike 4.0.

## 🙏 Acknowledgments

- **CC-CEDICT** - For the comprehensive dictionary data
- **MDBG** - For maintaining and hosting the CC-CEDICT project
- **Contributors** - Everyone who has improved this tool

## 📞 Support

- **Issues:** [GitHub Issues](https://github.com/doctorslop/chinesedictionary/issues)
- **Discussions:** [GitHub Discussions](https://github.com/doctorslop/chinesedictionary/discussions)

## 📈 Changelog

### v0.2 (Current) - Performance & Features Update
- ⚡ **Progressive Loading** - 20x faster initial load with chunked dictionary
- 🎯 **Fuzzy Matching** - Typo-tolerant search for pinyin and English
- 🎤 **Voice Input** - Speak Chinese or English to search
- 🔧 **Web Workers** - Background search processing for responsive UI
- 📱 **PWA Support** - Install as app, works offline
- 🧪 **Unit Tests** - Comprehensive test suite for all search algorithms
- 📦 **25 Dictionary Chunks** - Faster loading, better performance

### v0.1 - Initial Release
- Basic search functionality (Chinese, Pinyin, English)
- Three view modes (Table, Cards, List)
- Dark/light themes
- Favorites system
- Keyboard shortcuts
- 123,596 dictionary entries from CC-CEDICT

---

**Made with ❤️ for Chinese language learners**
