<?php

use yii\helpers\Html;

$this->title = 'Actualizar registro';
$this->params['breadcrumbs'][] = ['label' => 'Detalles generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="preliminary-inventory-update">

    <?= $this->render('sections/form.php', [
        'product_category' => $product_category,
        'products' => $products,
    ]) ?>

</div>