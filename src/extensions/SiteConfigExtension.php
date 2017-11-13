<?php

namespace AndrewAndante\ThemePicker;

use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\SSViewer;

class SiteConfigExtension extends DataExtension
{
    public function updateCMSFields(FieldList $fields)
    {
        parent::updateCMSFields($fields);
        $fields->addFieldToTab('Root.Main',
            DropdownField::create('SiteConfigTheme', 'Set the site theme', SSViewer::get_themes())
        );
    }
}
