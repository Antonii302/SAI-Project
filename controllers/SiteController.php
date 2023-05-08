<?php

namespace app\controllers;

use Yii;

use app\models\LoginForm;
use app\models\ContactForm;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\PreliminaryInventory;

class SiteController extends Controller
{
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

    public function actionIndex()
    {
        $preliminary_inventory = PreliminaryInventory::find()
        ->select([
            'preliminary_inventory.id as id', 
            'product_category.description as product_category', 
            'product.description as description', 
            'total_units', 
            'unit_measurement.unit as unit', 
            'unit_price'
            ])
        ->leftjoin('product', 'preliminary_inventory.product = product.id')
        ->leftjoin('product_category', 'product.product_category = product_category.code')
        ->leftjoin('unit_measurement', 'product.unit_measurement = unit_measurement.id');

        return $this->render('index', [
            'preliminary_inventory' => $preliminary_inventory->limit(15)->asArray()->all()
        ]);
    }

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

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
