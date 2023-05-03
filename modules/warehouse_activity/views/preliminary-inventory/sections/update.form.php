<?php

use app\models\PreliminaryInventory;
use app\models\Product;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\form\ActiveForm;
use kartik\checkbox\CheckboxX;
use kartik\select2\Select2;
use kartik\number\NumberControl;
use kartik\date\DatePicker;

use caiobrendo\dynamicgridform\DynamicGridForm;
use caiobrendo\dynamicgridform\ActionColumn;
use caiobrendo\dynamicgridform\NormalColumn;

?>

<div class="preliminary-inventory-form">
    <!-- Active form -->
    <?php 
    $form = ActiveForm::begin([
        'id' => 'preliminary-inventory-form',
        // 'enableClientValidation' => false,
        'type' => ActiveForm::TYPE_VERTICAL,
        'options' => [
            'autocomplete' => 'off'
        ],
        'fieldConfig' => [
            'template' => '{input}'
        ]
    ]);
    ?>
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <?= Html::activeLabel($model, 'product', ['class' => 'control-label d-sm-none text-muted']); ?>
                        <?= $form->field($model, 'product')->widget(Select2::class, [
                            'id' => 'product',
                            'name' => 'product',
                            'data' => ArrayHelper::map(Product::find()->orderBy('description')->all(), 'id', 'description'),
                            'size' => Select2::SMALL,
                            'options' => ['placeholder' => 'Selecciona un producto'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ]); ?> <!-- ./field -->
                    </div> <!-- ./col -->
                    <div class="col-12 col-sm-2">
                        <?= Html::activeLabel($model, 'total_units', ['class' => 'control-label d-sm-none text-muted']); ?>
                        <?= $form->field($model, 'total_units')->widget(NumberControl::class, [
                            'id' => 'total_units',
                            'name' => 'total_units',
                            'maskedInputOptions' => [
                                'allowMinus' => false
                            ],
                            'displayOptions' => [
                                'class' => 'form-control form-control-sm kv-monospace',
                                'placeholder' => '9,999,999,999'
                            ]
                        ]); ?> <!-- ./field -->
                    </div> <!-- ./col -->
                    <div class="col-12 col-sm-2">
                        <?= Html::activeLabel($model, 'unit_price', ['class' => 'control-label d-sm-none text-muted']); ?>
                        <?= $form->field($model, 'unit_price')->widget(NumberControl::class, [
                            'id' => 'unit_price',
                            'name' => 'unit_price',
                            'maskedInputOptions' => [
                                'prefix' => '$',
                                'allowMinus' => false
                            ],
                            'displayOptions' => [
                                'class' => 'form-control form-control-sm kv-monospace',
                                'placeholder' => '999,999.99'
                            ]
                        ]); ?> <!-- ./field -->
                    </div> <!-- ./col -->
                    <div class="col-12 col-sm-3">
                        <?= Html::activeLabel($model, 'date_expiry', ['class' => 'control-label d-sm-none text-muted']); ?>
                        <?= $form->field($model, 'date_expiry')->widget(DatePicker::class, [
                            'id' => 'date_expiry',
                            'name' => 'date_expiry',
                            'layout' => '{picker} {input} {remove}',
                            'pickerIcon' => '<i class="fas fa-calendar-week"></i>',
                            'removeIcon' => '<i class="fas fa-times-circle"></i>',
                            'options' => ['placeholder' => '01-01-2023'],
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'autoclose' => true,
                                'orientation' => 'bottom',
                            ],
                            'size' => 'sm'
                        ]);?> <!-- ./field -->
                    </div> <!-- ./col -->                                
                    <div class="col-sm-1 mt-2 mt-sm-0">
                        <?= Html::submitButton('<i class="fas fa-plus"></i> <span class="d-sm-none">Guardar registro</span>', ['type' => 'button', 'title' => 'Guardar registro', 'class' => 'btn btn-sm mb-2 w-100 bg-green']); ?>
                        <?= Html::resetButton('<i class="fab fa-digital-ocean"></i> <span class="d-sm-none">Limpiar campos</span>', ['title' => 'Limpiar formulario', 'id' => 'clean-fields', 'class' => 'btn btn-sm w-100 bg-red']); ?>
                    </div> <!-- ./col -->
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <!-- ./active form -->
</div>