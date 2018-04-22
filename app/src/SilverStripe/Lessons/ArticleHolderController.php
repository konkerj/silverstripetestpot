<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SilverStripe\Lessons;

use PageController;
use SilverStripe\ORM\PaginatedList;

use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\FieldType\DBField;

use Psr\Log\LoggerInterface;

class ArticleHolderController extends PageController
{
    private static $allowed_actions = [
        'category',
        'region',
        'date',
        'doSomething'
    ];
    
    private static $dependencies = [
      'logger' => '%$' . LoggerInterface::class  
    ];
    
    protected $shouldFail = true;
    
    /**
     *
     * @var LoggerInterface
     */
    public $logger;
    
    protected $articleList;
    
    protected function init() {
        parent::init();
        
        $this->articleList = ArticlePage::get()->filter([
            'ParentID' => $this->ID
        ])->sort('Date DESC');
    }
    
    public function PaginatedArticles($num = 10)
    {
        return PaginatedList::create(
                $this->articleList,
                $this->getRequest()
                )->setPageLength($num);
    }
    
    public function category(HTTPRequest $r)
    {
        $category = ArticleCategory::get()->byID(
                $r->param('ID'));
        
        if(!$category){
            return $this->httpError(404, 'That category was not found');
        }
        
        $this->articleList = $this->articleList->filter([
            'Categories.ID' => $category->ID
        ]);
        
        return [
            'SelectedCategory' => $category
        ];
    }
    
    public function region(HTTPRequest $r)
    {
        $region = Region::get()->byID(
                $r->param('ID'));
        
        if(!$region){
            return $this->httpError(404, 'That region was not found');
        }
        
        $this->articleList = $this->articleList->filter([
            'RegionID' => $region->ID
        ]);
        
        return [
            'SelectedRegion' => $region
        ];
    }
    
    public function date(HTTPRequest $r)
    {
        $year = $r->param('ID');
        $month = $r->param('OtherID');
        
        if (!$year) return $this->httpError (404);
        
        $startDate = $month ? "{$year}-{$month}-01" : "{$year}-01-01";
        
        if(strtotime($startDate) === false){
            return $this->httpError(404, 'Invalid date');
        }
        
        $adder = $month ? "+1 month" : '+1 year';
        $endDate = date('Y-m-d', strtotime($adder, strtotime($startDate)));
        
        $this->articleList = $this->articleList->filter([
            'Date:GreaterThanOrEqual' => $startDate,
            'Date:LessThan' => $endDate
        ]);
        
        return [
            'StartDate' => DBField::create_field('Datetime', $startDate),
            'EndDate' => DBField::create_field('Datetime', $endDate)
        ];
    }
    
    public function doSomething()
    {
        if($this->shouldFail){
            $this->logger->error('It failed');
             $this->logger->critical('It failed critical');
            die('It failed');
        }
    }
}
