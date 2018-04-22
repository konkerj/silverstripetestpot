<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SilverStripe\Lessons;

use PageController;

use SilverStripe\Control\HTTPRequest;

class RegionsPageController extends PageController
{
    private static $allowed_actions = [
        'show',
    ];
    
    public function show(HTTPRequest $request)
    {
        $region = Region::get()->byID($request->param('ID'));
        
        if(!$region){
            return $this->httpError(404,'That region could not be found.');
        }
        
        return [
            'Region' => $region,
            'Title' => $region->Title,
        ];
    }
}
