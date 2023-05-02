<?php

namespace app\modules\warehouse_activity\controllers;

use yii\web\Controller;

/**
 * Default controller for the `warehouse-activity` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
