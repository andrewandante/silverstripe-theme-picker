<?php

namespace AndrewAndante\ThemePicker;

use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\SSViewer;

class PageControllerExtension extends Extension
{
    public function onAfterInit()
    {
        $siteConfigTheme = SiteConfig::current_site_config()->SiteConfigTheme;
        $baseThemes = SSViewer::get_themes();

        if ($siteConfigTheme && in_array($siteConfigTheme, $baseThemes)) {
            // Put the theme at the top of the list
            array_unshift($baseThemes, $siteConfigTheme);
            SSViewer::set_themes(array_unique($baseThemes));
        }
    }
}
