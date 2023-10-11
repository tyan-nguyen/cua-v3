<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Settings;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * SettingsController implements the CRUD actions for Settings model.
 */
class SettingsController extends Controller
{
    public $layout = 'admin';
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }
   
    /**
     * Updates an existing Settings model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $model = Settings::findOne(1);       

        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['index', 'showUpdateSuccess'=>true]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        
    }

}
