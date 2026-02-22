# wp-soli-festival-theme

WordPress child theme of Twenty Twenty-Five for Soli's Binge Festival website.

## Purpose

This theme provides the public-facing website for Soli's Binge Festival, presenting festival information such as program details, sponsors, and general announcements in a clean, editorial design.

## Architecture

```
festival site (e.g., dev.soli.nl or soli.nl)
├── twentytwentyfive (parent theme)  - Base block theme
└── wp-soli-festival-theme (this repo)  - Child theme customizations
```

### Child Theme Approach

This theme extends Twenty Twenty-Five using WordPress best practices:

- **`theme.json`** - Overrides parent color palette, typography, and layout settings
- **`style.css`** - Theme header metadata (child theme declaration)
- **`assets/css/festival.css`** - Custom styles for editorial design
- **`functions.php`** - Child theme setup, style enqueuing, GitHub updater

### Design System

Inspired by the Soli Binge Festival newsletters:

| Element | Value |
|---------|-------|
| Content width | 653px |
| Wide width | 900px |
| Background | `#ffffff` |
| Text color | `#1d1d1f` |
| Link color | `#06c` |
| Secondary text | `#6e6e73` |
| Border color | `#d2d2d7` |
| Font family | System sans-serif stack |
| Body font size | 17px (1.0625rem) |
| Line height | 1.47 |

## Development Guidelines

### WordPress Version

Target the latest stable WordPress version. Requires Twenty Twenty-Five as parent theme.

### Coding Standards

- Follow [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- Use WordPress escaping functions (`esc_html()`, `esc_attr()`, `esc_url()`, etc.)
- Prefix all functions, hooks, and global variables with `soli_festival_`
- Text domain: `soli-festival-theme`

### Theme Structure

```
wp-soli-festival-theme/
├── style.css              # Theme metadata (child theme declaration)
├── functions.php          # Theme setup, style enqueuing, updater
├── theme.json             # Block editor customizations
├── updater.php            # GitHub theme updater
├── assets/
│   └── css/
│       └── festival.css   # Custom styles
├── languages/             # Translation files
├── tests/
│   └── e2e/               # Playwright tests
└── CLAUDE.md              # Development documentation
```

### Customization via theme.json

All design tokens (colors, fonts, sizes, layout) are defined in `theme.json`. This integrates with the block editor so content creators get the correct palette and typography options.

### Adding Custom Templates

To override parent templates, create template files in the theme root. Twenty Twenty-Five is a block theme, so templates use HTML with block markup.

## Git Workflow

- `main` branch is the primary branch
- Create feature branches for new work
- Keep commits focused and descriptive
