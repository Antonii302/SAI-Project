<?php

use yii\helpers\Html;

$this->title = 'Nuevo registro';

$this->params['breadcrumbs'][] = ['label' => 'Detalles del catálogo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="product-create">
    
    <!-- Product category form -->
    <?= $this->render('product_form', [
        'product' => $product,
    ]); ?>
    <!-- ./product category form -->

</div>
