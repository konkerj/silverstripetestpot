<?php
namespace SilverStripe\Lessons\Forms;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;

use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Lessons\ArticleComment;

class CommentForm extends Form
{
    /**
     * 
     */
    public function __construct(\SilverStripe\Control\RequestHandler $controller = null, $name = self::DEFAULT_NAME, FieldList $fields = null, FieldList $actions = null, \SilverStripe\Forms\Validator $validator = null) {
        $fields = FieldList::create(
                    TextField::create('Name','')
                       ->setAttribute('placeholder', 'Name*')
                       ->addExtraClass('form-control'),
                    EmailField::create('Email','')
                       ->setAttribute('placeholder', 'Email*')
                       ->addExtraClass('form-control'),
                    TextareaField::create('Comment','')
                       ->setAttribute('placeholder', 'Comment*')
                       ->addExtraClass('form-control')
                );
        
        $actions =  FieldList::create(
                    FormAction::create('handleComment','Post Comment')
                       ->setUseButtonTag(true)
                       ->addExtraClass('btn btn-default-color btn-lg')
               );
        
        $requires = RequiredFields::create('Name','Email','Comment');
        
        parent::__construct($controller, $name, $fields, $actions, $requires);
        
        $this->setFormMethod('POST');
        
        //$request = Injector::inst()->get(HTTPRequest::class);
        $session = $controller->getRequest()->getSession();
        $data = $session->get("FormData.{$name}.data");
        
        $this->loadDataFrom($data);
    }
    
    /**
     * 
     * @param array $data
     * @param Form $form
     */
    public static function handleComment($data, $form, \SilverStripe\Control\RequestHandler $controller = null){
        $session = $controller->getRequest()->getSession();
        
        $session->set("FormData.{$form->getName()}.data", $data);
        
        /**
        $existing = $this->Comments()->filter([
            'Comment' => $data['Comment']
        ]);
        
        if($existing->exists() && strlen($data['Comment'])>20){
            $form->sessionMessage('That comment already exists! spam', 'bad');
            
            return $this->redirectBack();
        }**/
        
        $comment = ArticleComment::create();
        $comment->ArticlePageID = $controller->ID;
        $form->saveInto($comment);
        $comment->write();
        
        //$session->clear("FormData.{$form->getName()}.data");
        $form->sessionMessage('Thanks for your comment!', 'good');
        
        return true;
    }
}