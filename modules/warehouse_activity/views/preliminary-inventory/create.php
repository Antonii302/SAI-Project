<?php

use yii\helpers\Html;

$this->title = 'Create Preliminary Inventory';
$this->params['breadcrumbs'][] = ['label' => 'Preliminary Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="preliminary-inventory-create">
    <p class="h5 text-truncate text-muted"><?= $this->title; ?></p>

    <?= $this->render('sections/form', [
        'model' => $model,
    ]) ?>

</div>
