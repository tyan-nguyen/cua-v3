<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\modules\admin\models\NewsQuery;
use yii\web\NotFoundHttpException;
use app\modules\admin\models\News;
use app\models\Settings;
use app\modules\admin\models\Catelogies;
use app\modules\admin\models\Product;
use app\modules\admin\models\ProductQuery;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    /**
     * show errors
     */
    public function actionError(){
        $this->layout = 'view-post';
        return $this->render('error');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
     * Displays detail product page.
     *
     * @return string
     */
    /* public function actionProducts()
    {
        $this->layout = 'view-product';
        return $this->render('view-product-list');
    } */
    public function actionProducts($slug)
    {
        $this->layout = 'view-product';
        
        $catelogy = Catelogies::find()->where(['slug'=>$slug])->one();
        if($catelogy != null && $catelogy->pid == 0){
            $catChild = Catelogies::find()->where(['pid'=>$catelogy->id])->all();           
            return $this->render('view-product-list', compact('catelogy', 'catChild'));
        } else if ($catelogy != null && $catelogy->pid > 0){
            $products = ProductQuery::getProductByCat($catelogy->slug);
            return $this->render('view-product-list-one', compact('catelogy', 'products'));
        } else {
            return $this->render('error');
        }
        
        //return $this->render('view-product-list');
    }
    
    /**
     * Displays detail product page.
     *
     * @return string
     */
    /* public function actionProductss($id=NULL)
    {
        $this->layout = 'view-product';
        if($id==1){
            $title = 'Hệ cửa đi';
        } else {
            $title = 'Hệ cửa sổ';
        }
        return $this->render('view-product-list-one', compact('title', 'id'));
    } */
    
    /**
     * Displays detail product page.
     *
     * @return string
     */
    public function actionProduct($slug)
    {
        $this->layout = 'view-product';
        
        $product = Product::findOne(['slug'=>$slug]);
        if($product!= null && $product->post_status == 'PUBLISH'){
            return $this->render('view-product', compact('product'));
        } else {
            return $this->render('error');
        }
    }
    
    /**
     * Displays detail product page.
     *
     * @return string
     */
    public function actionPosts($page=NULL)
    {
        $setting = \app\models\Settings::find()->one();
        
        $this->layout = 'view-post';
        $query = NewsQuery::getNewsPublic('tin-tuc');
        $countModels = $query->count();
        
        if($page == NULL)
            $page = 1;
        $numPerPage = $setting->number_post_per_page;
        $numPage = ceil($countModels/$numPerPage);
        $model = $query->offset($page*$numPerPage-$numPerPage)->limit($numPerPage)->orderBy([
            'date_updated' => SORT_DESC,
            'date_created' => SORT_DESC,
            'id' => SORT_DESC
        ])->all();
            
        return $this->render('view-post-list', [
            'model'=>$model,
            'prev' => $page>1 ? ($page-1) : null,
            'next' => $page < $numPage ? ($page+1) : null,
        ]);
    }
    
    /**
     * Displays detail product page.
     *
     * @return string
     */
    public function actionPost($slug)
    {
        $setting = Settings::find()->one();
        $model = News::find()->where(['slug'=>$slug])->one();
        $this->layout = 'view-post';
        
        $titlePage = 'Blogs';
        $isPage = false;
        
        if($model != null && $model->post_status != 'DRAFT' && $model->is_static == false){
            
            return $this->render('view-post', [
                'blog'=>$model,
                'titlePage'=>$titlePage,
                'isPage'=>$isPage
            ]);
        } else {
            return $this->render('error');
        }
        
    }
    
    /**
     * Displays detail product page.
     *
     * @return string
     */
    public function actionPage($slug)
    {
        $setting = Settings::find()->one();
        $model = News::find()->where(['slug'=>$slug])->one();
        $this->layout = 'view-post';
        
        if($model != null && $model->post_status != 'DRAFT' && $model->is_static == true){
            $titlePage = $model->title;
            $isPage = true;
            return $this->render('view-post', [
                'blog'=>$model,
                'titlePage'=>$titlePage,
                'isPage'=>$isPage
            ]);
        } else {
            return $this->render('error');
        }
        
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
