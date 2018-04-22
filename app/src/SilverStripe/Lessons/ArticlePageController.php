<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SilverStripe\Lessons;

use PageController;
use SilverStripe\Lessons\Forms\CommentForm;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;

class ArticlePageController extends PageController
{
    private static $allowed_actions = [
        'CommentForm',
    ];
    
    public function CommentForm()
    {
       return new CommentForm($this, 'CommentForm');
    }
    
    /**
     * 
     * @param array $data
     * @param Form $form
     */
    public function handleComment($data, $form)
    {
        /**
        $session = $this->getRequest()->getSession();
        $session->set("FormData.{$form->getName()}.data", $data);
        
        $existing = $this->Comments()->filter([
            'Comment' => $data['Comment']
        ]);
        
        if($existing->exists() && strlen($data['Comment'])>20){
            $form->sessionMessage('That comment already exists! spam', 'bad');
            
            return $this->redirectBack();
        }
        
        $comment = ArticleComment::create();
        $comment->ArticlePageID = $this->ID;
        $form->saveInto($comment);
        $comment->write();
        
        $session->clear("FormData.{$form->getName()}.data");
        $form->sessionMessage('Thanks for your comment!', 'good');
        **/
        
        if(CommentForm::handleComment($data, $form, $this)){
            return $this->redirectBack();
        }
    }
    
}
