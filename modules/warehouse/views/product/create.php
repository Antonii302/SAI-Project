<?php

use yii\helpers\Html;

$this->title = 'Nuevo registro';

$this->params['breadcrumbs'][] = ['label' => 'Detalles del catálogo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="product-create">
    <!-- Card -->
    <div class="card rounded-0 ">
        <div class="card-body p-3">
            <p class="card-title">Categoría del producto</p>
        </div> <!-- ./card body -->
    </div>
    <!-- ./card -->
    
    <!-- Card -->
    <div class="card rounded-0 elevation-0">
        <div class="card-body p-3">
            <?= $this->render('product_category_form', [
                'product' => $product,
            ]); ?>
        </div> <!-- ./card body -->
    </div>
    <!-- ./card -->

</div>
