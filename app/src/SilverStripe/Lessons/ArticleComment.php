<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SilverStripe\Lessons;

use SilverStripe\ORM\DataObject;

class ArticleComment extends DataObject
{
    private static $db = [
        'Name' => 'Varchar',
        'Email' => 'Varchar',
        'Comment' => 'Text'
    ];
    
    private static $has_one = [
        'ArticlePage' => ArticlePage::class,
    ];
}
