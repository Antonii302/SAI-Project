<?php

use app\models\ProductCategory;
use app\models\Product;

use yii\Web\JsExpression;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

use kartik\form\ActiveForm;
use kartik\select2\Select2;

?>

<div class="product-category-form">
    <!-- Active form -->
    <?php $form = ActiveForm::begin([
        'id' => 'product-form',
        'enableClientValidation' => false,
        'type' => ActiveForm::TYPE_VERTICAL,
        'options' => [
            'autocomplete' => 'off'
        ],
        'fieldConfig' => [
            'template' => '{input} {hint}'
        ]
    ]); ?>

     <!-- Card -->
    <div class="card rounded-0 shadow-sm">
        <div class="card-header border-0">
            <p class="card-title">Detalle del catálogo</p>
            <div class="card-tools">
                <span class="badge badge-primary">15</span>
                <?= Html::button('<i class="fas fa-question-circle"></i>', ['type' => 'button', 'class' => 'btn btn-tool']); ?>
            </div>
            <p class="card-text text-sm text-muted">Una pequeña descripción</p>

            <div class="d-flex justify-content-end">
                <?= Html::button('<i class="fas fa-plus"></i> Agregar registro', ['type' => 'button', 'class' => 'btn btn-default btn-sm']); ?>
            </div>
        </div> <!-- ./card footer -->
        <div class="card-body">
            <!-- Product category -->
            <div class="product-category">
                <!-- Flex container -->
                <div class="d-flex justify-content-between">
                    <p class="card-title">Categoría del producto</p>
                    <?= Html::button('<i class="far fa-trash-alt"></i>', ['type' => 'button', 'class' => 'btn btn-default btn-sm']); ?>
                </div>
                <!-- ./flex container -->
                <p class="card-text text-sm text-muted">Una pequeña descripción</p>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
                <!-- Product -->
                <div class="product">
                    <!-- Flex container -->
                    <div class="d-flex justify-content-between">
                        <p class="card-title">Producto</p>
                        <?= Html::button('<i class="far fa-trash-alt"></i>', ['type' => 'button', 'class' => 'btn btn-default btn-sm']); ?>
                    </div>
                    <!-- ./flex container -->
                    <p class="card-text text-sm text-muted">Una pequeña descripción</p>
                </div>
            </div>

        </div> <!-- ./card body -->
    </div>
    
    <?php ActiveForm::end(); ?>
    <!-- ./active form -->
</div>