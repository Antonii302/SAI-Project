<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Inventario', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product->description];

\yii\web\YiiAsset::register($this);

?>

<div class="inventory-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'current_quantity',
            'inventory_classification',
        ],
    ]) ?>

</div>
