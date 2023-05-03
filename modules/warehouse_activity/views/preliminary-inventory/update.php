<?php


use yii\helpers\Html;

$this->title = 'Actualizar registro';
$this->params['breadcrumbs'][] = ['label' => 'Inventario preliminar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="preliminary-inventory-update">

    <?= $this->render('sections/update.form.php', [
        'model' => $model
    ]) ?>

</div>