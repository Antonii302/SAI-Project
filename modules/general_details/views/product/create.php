<?php

use yii\helpers\Html;

$this->title = 'Nuevo registro';
$this->params['breadcrumbs'][] = ['label' => 'Detalles generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="product-create">
    <?= $this->render('sections/form.php', [
        'product_category' => $product_category,
        'products' => $products,
    ]) ?>
</div>
