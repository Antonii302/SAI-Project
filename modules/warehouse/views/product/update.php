<?php

use yii\helpers\Html;

$this->title = 'Editar registro';

$this->params['breadcrumbs'][] = ['label' => 'Detalles del catálogo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product->description, 'url' => ['view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('product_form', [
        'model' => $model,
    ]) ?>

</div>
