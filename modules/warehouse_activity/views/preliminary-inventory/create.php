<?php

use yii\helpers\Html;

$this->title = 'Nuevo registro';
$this->params['breadcrumbs'][] = ['label' => 'Inventario preliminar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="preliminary-inventory-create">
    <p class="h5 text-truncate text-muted"><?= $this->title; ?></p>

    <?= $this->render('sections/form', [
        'model' => $model,
    ]) ?>

</div>
