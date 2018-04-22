<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use SilverStripe\Security\Member;
use SilverStripe\Dev\FunctionalTest;

class HomePageTest extends FunctionalTest
{
    /**
     * Test generation of the view
     */
    public function testViewHomePage()
    {
        $page = $this->get('home/');
        
        //Home page should load
        $this->assertEquals(200, $page->getStatusCode());
        
        //We should see a login form
        $login = $this->submitForm("LoginFormID", null,[
            'Email' => 'test@test.com',
            'Password' => 'adfsdf'
        ]);
        
        //wront details
        $this->assertExactHTMLMatchBySelector("#LoginForm p.error", [
            "That email address is invalid"
        ]);
        
        //if we logn as a user
        $me = Member::get()->first();
        
        $this->logInAs($me);
        $page = $this->get('home/');
        
        $this->assertExactHTMLMatchBySelector("#Welcome", [
            'Welcome Back'
        ]);
    }
}

