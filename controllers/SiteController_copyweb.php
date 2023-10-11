<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\News;
use app\modules\admin\models\NewsQuery;
use app\modules\admin\models\Catelogies;
use app\modules\admin\models\Newsletter;
use app\modules\admin\models\Settings;
use app\modules\admin\models\TagList;

class SiteController extends Controller
{
    public $layout = 'view';
    /**
     * homepage
     * just show view in main layout
     */
    public function actionIndex()
    {
        $this->layout = 'main';
    	$setting = Settings::find()->one();
        
        $this->view->title = $setting->site_title;
        $this->view->registerMetaTag([ 'name' => 'description', 'content' => $setting->site_description ]);
        //Article Open Graph Generator
        $this->view->registerMetaTag([ 'name' => 'og:type', 'content' => 'website' ]);
        $this->view->registerMetaTag([ 'name' => 'og:title', 'content' => $setting->site_title ]);
        $this->view->registerMetaTag([ 'name' => 'og:description', 'content' => $setting->site_description]);
        $this->view->registerMetaTag([ 'name' => 'og:url', 'content' => \Yii::$app->params['siteUrl'] ]);
        $this->view->registerMetaTag([ 'name' => 'og:image', 'content' => 'https://phunu.website/images/posts/default.jpg' ]);
        
        return $this->render('index', [
        ]);
    }
    /**
     * show a post, and post like in catelogies
     * @param string $slug
     * @return string|\yii\web\Response
     */
    public function actionNews($slug){
        $setting = Settings::find()->one();
        $model = News::find()->where(['slug'=>$slug])->one();
        
        if($model != null && $model->post_status != 'DRAFT'){
            
            $this->view->title = $model->seoTitle;
            $this->view->registerMetaTag([ 'name' => 'description', 'content' => $model->seoDescription ]);
            //canonical
            $this->view->registerLinkTag(['rel'=>'canonical','href'=> \Yii::$app->params['siteUrl'] . $model->url]);
            //Article Open Graph Generator
            $this->view->registerMetaTag([ 'name' => 'og:type', 'content' => 'article' ]);
            $this->view->registerMetaTag([ 'name' => 'og:title', 'content' => $model->seoTitle ]);
            $this->view->registerMetaTag([ 'name' => 'og:description', 'content' => $model->seoDescription ]);
            $this->view->registerMetaTag([ 'name' => 'og:url', 'content' => \Yii::$app->params['siteUrl'] . $model->url ]);
            $this->view->registerMetaTag([ 'name' => 'og:image', 'content' => \Yii::$app->params['siteUrl'] . $model->cover ]);
            if($model->catelogiesList != null){
                foreach ($model->getListTags() as $indexTag=>$tagName){
                    $this->view->registerMetaTag([ 'name' => 'og:tag', 'content' => $tagName ]);
                }
            }
            
            $news = NewsQuery::getNewsPublic();
            $indexItem = 0;
            if($model->catelogiesList != null){
                foreach ($model->catelogiesList as $indexCat=>$cat){
                    $indexItem++;
                    if($indexItem == 1)
                        $news = $news->andFilterWhere(['like', 'catelogies', $indexCat]);
                    else
                        $news = $news->orFilterWhere(['like', 'catelogies', $indexCat]);
                }
            }
            $news = $news->andWhere('id != ' . $model->id)->offset(0)->limit($setting->number_post_like_in_news)->orderBy([
                'id' => SORT_DESC
            ])->all();
            return $this->render('news', ['model'=>$model, 'news'=>$news]);
        } else {
            return $this->redirect('not-found');
        }
    }
    
    /**
     * render catelogies page
     * @param string $slug
     * @param number $page
     * @return \yii\web\Response|string
     */
    public function actionCat($slug, $page=NULL){
        $setting = \app\models\Settings::find()->one();
        
        $modelCat = Catelogies::find()->where(['slug'=>$slug])->one();
        
        if($modelCat != null){
            $this->view->title = $modelCat->seoTitle;
            $this->view->registerMetaTag([ 'name' => 'description', 'content' => $modelCat->seoDescription ]);
        }
        
        $query = NewsQuery::getNewsPublic()->andFilterWhere(['like', 'catelogies', $slug]);
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
        
        if($model == null){
            return $this->render('not-found', []);
        } else {
            
            if($model != null && $page > $numPage){
                return $this->render('not-found', []);
            }
           
            return $this->render('cats', [
                'model'=>$model, 
                'modelCat'=>$modelCat,
                'catSlug' => $slug,
                'prev' => $page>1 ? ($page-1) : null,
                'next' => $page < $numPage ? ($page+1) : null,
            ]);
        }
    }
    /**
     * render tag page
     * @param string $slug
     * @param number $page
     * @return string
     */
    public function actionTag($slug, $page=NULL){
        $setting = \app\models\Settings::find()->one();
        $modelCat = TagList::find()->where(['slug'=>$slug])->one();
        
        $this->view->title = $modelCat->seoTitle;
        $this->view->registerMetaTag([ 'name' => 'description', 'content' => $modelCat->seoDescription ]);
        
        $query = NewsQuery::getNewsPublic()->andFilterWhere(['like', 'tags', $slug]);
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
        
        if($model == null){
            return $this->redirect('not-found');
        } else {
            if($model != null && $page > $numPage){
                return $this->render('not-found', []);
            }
            
            return $this->render('tags', [
                'model'=>$model,
                'modelCat'=>$modelCat,
                'catSlug' => $slug,
                'prev' => $page>1 ? ($page-1) : null,
                'next' => $page < $numPage ? ($page+1) : null,
            ]);
        }
    }
    /**
     * process newsletter
     * @return \yii\web\Response
     */
    public function actionNewsletter(){
        $email = $_GET['email'];
        if($email != null){
            $newsletter = Newsletter::find()->where(['email'=>$email])->one();
            if($newsletter == null){
                $newNewsletter = new Newsletter();
                $newNewsletter->email = $email;
                $newNewsletter->site = 'localhost';
                $newNewsletter->date_created = date('Y-m-d H:i:s');
                $newNewsletter->save();
            }
        }
        return $this->goBack();
    }
    
    /**
     * search page
     * @param number $page
     * @return string
     */
    public function actionSearch($page=NULL){        
               
        $setting = \app\models\Settings::find()->one();
        $search = $_GET['search'];
        
        $this->view->title = 'Kết quả tìm kiếm cho từ khóa: ' . $search;
        
        $query = NewsQuery::getNewsPublic()->andFilterWhere(['like', 'title', $search]);
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
        
        if($model != null && $page > $numPage){
            
            return $this->render('not-found', []);
        }
                
        return $this->render('search', [
            'model'=>$model,
            'prev' => $page>1 ? ($page-1) : null,
            'next' => $page < $numPage ? ($page+1) : null,
            'search' => $_GET['search']
        ]);
    }
    
    /**
     * show not found page
     * @return \yii\web\Response|string
     */
    public function actionNotFound(){
        
        $this->view->title = '404 page';
        
        $this->view->registerMetaTag([ 'name' => 'robots', 'content' => 'noindex,nofollow' ]);
        
        return $this->render('not-found', []);
    }

}
