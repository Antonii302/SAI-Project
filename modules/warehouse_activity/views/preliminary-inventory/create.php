<?php

use yii\helpers\Html;

$this->title = 'Nuevo registro';
$this->params['breadcrumbs'][] = ['label' => 'Inventario preliminar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="preliminary-inventory-create">

    <?= $this->render('sections/create.form.php', [
        'models' => $models
    ]) ?>

</div>
