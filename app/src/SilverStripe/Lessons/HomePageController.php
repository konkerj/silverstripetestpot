<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SilverStripe\Lessons;

use PageController;

class HomePageController extends PageController
{
    public function LatestArticles($count=3)
    {
        return ArticlePage::get()
                ->sort('Created', 'DESC')
                ->limit($count);
    }

    public function FeaturedProperties($count=6)
    {
        return Property::get()
                ->filter(array(
                    'FeaturedOnHomepage' => true
                ))
                ->limit($count);
    }
}