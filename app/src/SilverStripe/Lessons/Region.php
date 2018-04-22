<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SilverStripe\Lessons;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

use SilverStripe\Versioned\Versioned;

use SilverStripe\Control\Controller;

class Region extends DataObject
{
    private static $db = [
        'Title' => 'Varchar',
        'Description' => 'HTMLText',
    ];
    
    private static $has_one = [
        'Photo' => Image::class,
        'RegionsPage' => RegionsPage::class,
    ];
    
    private static $has_many = [
        'Articles' => ArticlePage::class,
    ];
    
    private static $owns = [
        'Photo',
    ];
    
    private static $extensions = [
        Versioned::class,
    ];
    
    private static $summary_fields = [
        'GridThumbnail' => '',
        'Title' => 'Title of region',
        'Description' => 'Short description',
    ];
    
    private static $versioned_gridfield_extensions = true;
    
    public function getGridThumbnail()
    {
        if($this->Photo()->exists()){
            return $this->Photo()->ScaleWidth(100);
        }
        
        return "(no image)";
    }
    
    public function getCMSFields() {
        $fields = FieldList::create(
            TextField::create('Title'),
            HTMLEditorField::create('Description'),
            $uploader = UploadField::create('Photo')
        );
        
        $uploader->setFolderName('region-photos');
        $uploader->getValidator()->setAllowedExtensions(['png','jpeg','jpg','gif']);
        
        return $fields;
    }
    
    public function Link()
    {
        return $this->RegionsPage()->Link('show/'.$this->ID);
    }
    
    public function LinkingMode()
    {
        return Controller::curr()->getRequest()->param('ID') == $this->ID ? 'current' : 'link';
    }
    
    public function ArticlesLink()
    {
        $page = ArticleHolder::get()->first();
        
        if($page){
            return $page->Link('region/'.$this->ID);
        }
    }
}
