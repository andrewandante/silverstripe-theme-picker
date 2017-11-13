<?php

namespace AndrewAndante\ThemePicker;

use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\ArrayLib;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\SSViewer;

class SiteConfigExtension extends DataExtension
{

    private static $db = [
        'SiteConfigTheme' => 'Varchar(60)'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        parent::updateCMSFields($fields);
        $fields->addFieldToTab('Root.Main',
            DropdownField::create(
                'SiteConfigTheme',
                'Set the site theme',
                $this->getPickableThemes()
            )
        );
    }

    protected function getPickableThemes()
    {
        $baseThemes = Config::inst()->get(SSViewer::class, 'themes');
        // Pop off $default from array
        $defaultTheme = array_search(SSViewer::DEFAULT_THEME, $baseThemes);
        if ($defaultTheme !== false) {
            unset($baseThemes[$defaultTheme]);
        }

        return ArrayLib::valuekey(array_values($baseThemes));
    }

}
