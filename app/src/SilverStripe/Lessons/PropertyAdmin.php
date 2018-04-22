<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SilverStripe\Lessons;

use SilverStripe\Admin\ModelAdmin;

class PropertyAdmin extends ModelAdmin
{
    private static $menu_title = 'Properties';
    
    private static $url_segment = 'properties';
    
    private static $managed_models = [
        Property::class,
    ];
    
    private static $menu_icon = 'images/property.png';
}