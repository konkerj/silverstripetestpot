<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SilverStripe\Lessons;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class ArticleCategory extends DataObject
{
    private static $db = [
        'Title' => 'Varchar',
    ];
    
    private static $has_one = [
        'ArticleHolder' => ArticleHolder::class,
    ];
    
    private static $belongs_many_many = [
        'Articles' => ArticlePage::class,
    ];
    
    public function getCMSFields() {
        return FieldList::create(
        TextField::create('Title'));
    }
    
    public function Link()
    {
        return $this->ArticleHolder()->Link(
                'category/'.$this->ID);
    }
}
