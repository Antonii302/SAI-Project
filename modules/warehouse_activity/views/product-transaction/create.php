<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductTransaction $model */

$this->title = 'Create Product Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Product Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
