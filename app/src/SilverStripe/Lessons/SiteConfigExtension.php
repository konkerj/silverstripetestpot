<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SilverStripe\Lessons;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'FacebookLink' => 'Varchar',
        'TwitterLink' => 'Varchar',
        'GoogleLink' => 'Varchar',
        'YouTubeLink' => 'Varchar',
        'FooterContent' => 'Text'
    ];
    
    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldsToTab('Root.Social', array(
        TextField::create('FacebookLink','Facebook'),
        TextField::create('TwitterLink','Twitter'),
        TextField::create('GoogleLink', 'Google'),
        TextField::create('YouTubeLink', 'YouTube'),            
        ));
        
        $fields->addFieldToTab('Root.Main', TextareaField::create('FooterContent','Content for footer'));
    }
}
