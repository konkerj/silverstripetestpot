<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use SilverStripe\Dev\SapphireTest;

class PageTest extends SapphireTest
{
    //relative path name to project root.
    protected static $fixture_file = 'app/fixtures/SiteTreeTest.yml';
    
    /**
     * Test generation of the URLSegment valuess.
     * 
     * Make sure to 
     *  - Turn things into lowercase-hyphen-format
     *  - Generates from Title by default, unless URLSegment is explicitly set
     *  - Resolves duplicates by appending a number
     */
    public function testURLGeneration()
    {
        $expectedURLs = [
            'home' => 'home',
            'staff' => 'my-staff',
            'about' => 'about-us',
            'staffduplicate' =>'my-staff-2'
        ];
        
        foreach($expectedURLs as $fixture => $urlSegment){
            $obj = $this->objFromFixture('Page', $fixture);
            
            $this->assertEquals($urlSegment, $obj->URLSegment);
        }
    }
}

