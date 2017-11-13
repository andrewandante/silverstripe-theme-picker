# SilverStripe Theme Picker

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andrewandante/silverstripe-theme-picker/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andrewandante/silverstripe-theme-picker/badges/quality-score.png?b=master)

Module to replicate the SS3 dropdown for themes in SS4.

## Requirements

- SS4
- SiteConfig

## Installation

```bash
composer require andrewandante/silverstripe-theme-picker
```

## Config

This generates the dropdown from the `SSViewer::themes()` - so any theme you'd like to be selectable needs to be first present in `something.yml`.

```yaml
SilverStripe\View\SSViewer:
  themes:
    - 'simple'
    - 'complicated'
    - '$default'
```

Will result in the dropdown options 'simple' and 'complicated'.

## Caveats

- Currently hooks onto `PageController`.
- Hooks out the theme from the list and sticks it at the top.
