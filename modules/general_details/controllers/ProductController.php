<?php

namespace app\modules\general_details\controllers;

use Yii;
use Exception;

use yii\base\Model;

use app\models\ProductCategory;
use app\models\Product;
use app\modules\general_details\models\ProductCategorySearch;
use app\modules\general_details\models\ProductSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;

use caiobrendo\dynamicgridform\Helper;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query
        ->orderBy('product_category');

        $dataProvider->pagination->pageSize = 5;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate() {
        $product_category = new ProductCategory();
        $products = Helper::createMultiple(Product::class);

        $post_method = Yii::$app->request->post();

        if ($product_category->load($post_method) && Model::loadMultiple($products, $post_method)) {
            $transaction = Yii::$app->db->beginTransaction();

            try {
                if ($product_category->save()) {
                    foreach ($products as $product) {
                        $product->product_category = $product_category->code;
                        
                        if (!$product->save()) { 
                             var_dump($product->getErrors());
                            throw new Exception(); }
                    }
                    $transaction->commit();

                    $this->redirect(['index']);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
            }
        }

        return $this->render('create', [
            'product_category' => $product_category,
            'products' => $products,
        ]);
    }
    
    public function actionUpdate($product_category) {
        $product_category = ProductCategory::findOne(['code' => $product_category]);
        $products = $product_category->products;

        $post_method = Yii::$app->request->post();
        
        if ($product_category->load($post_method)) {
            $transaction = Yii::$app->db->beginTransaction();
            
            try {
                if ($product_category->save()) {
                    $products = Helper::createMultiple(Product::class, $products);
                    Model::loadMultiple($products, $post_method);

                    $olds_records = ArrayHelper::map($product_category->products, 'id', 'id');
                    $news_records = ArrayHelper::map($products, 'id', 'id');

                    $delete = array_diff($olds_records, $news_records);
                    Product::deleteAll(['id' => $delete]);

                    foreach ($products as $product) {
                        $product->product_category = $product_category->code;
                    }

                    if (!$product->save()) { 
                        var_dump($product->getErrors());
                       throw new Exception(); }

                    $transaction->commit();

                    $this->redirect(['index']);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
            }
        }

        return $this->render('update', [
            'product_category' => $product_category,
            'products' => $products,
        ]);
    }
}
