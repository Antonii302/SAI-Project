<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PreliminaryInventory $model */

$this->title = 'Update Preliminary Inventory: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Preliminary Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="preliminary-inventory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('sections/form', [
        'model' => $model,
    ]) ?>

</div>
