<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class PageController extends Controller
{
	public $layout = 'view';	
	/**
	 * terms
	 */
	public function actionTerms(){
	    $this->view->title = 'Terms & Conditions';
	    
	    $this->view->registerMetaTag([ 'name' => 'robots', 'content' => 'noindex,nofollow' ]);
	    
	    return $this->render('terms');
	}
	
	/**
	 * terms
	 */
	public function actionPrivacy(){
	    $this->view->title = 'Privacy Policy';
	    
        $this->view->registerMetaTag([ 'name' => 'robots', 'content' => 'noindex,nofollow' ]);
        
	    return $this->render('privacy');
	}
	
}
