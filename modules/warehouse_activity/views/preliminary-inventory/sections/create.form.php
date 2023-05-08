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
    
    <?= Html::hiddenInput('id', '', ['id' => 'id']) ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <!-- Card -->
                <div class="card rounded-0">
                    <div class="card-body p-2">
                        <?= 
                        CheckboxX::widget([
                            'name' => 'inventory_type',
                            'options' => [
                                'id' => 'inventory_type'
                            ],
                            'pluginOptions'=>[
                                'threeState' => false,
                                'iconChecked'=>'<i class="fas fa-square"></i>',
                            ]
                        ]);
                        ?> <!-- ./form field -->
                        <label class="cbx-label d-inline float-rigth text-muted ml-3" for="inventory_type">¿Almacenar como INVENTARIO PRELIMINAR?</label>
                    </div> <!-- ./card body -->
                </div>
                <!-- ./card -->
            </div> <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Card -->
                <div class="card">
                    <div class="card-body p-2">
                        <div class="container-fluid">
                            <div class="form-row" class="row">
                                <div class="col-12 col-sm-4">
                                    <label for="product" class="control-label d-sm-none text-muted">Producto</label>
                                    <?= Select2::widget([
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
                                <label for="total_units" class="control-label d-sm-none text-muted">Unidades totales</label>
                                    <?= 
                                    NumberControl::widget([
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
                                    <label for="unit_price" class="control-label d-sm-none text-muted">Precio unitario</label>
                                    <?= 
                                    NumberControl::widget([
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
                                    <label for="date_expiry" class="control-label d-sm-none text-muted">Fecha de caducidad</label>
                                    <?= 
                                    DatePicker::widget([
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
                                    <?= Html::button('<i class="fas fa-plus"></i> <span class="d-sm-none">Añadir registro</span>', ['type' => 'button', 'title' => 'Añadir registro', 'id' => 'add-record', 'class' => 'btn btn-sm mb-2 w-100 bg-blue']); ?>
                                    <?= Html::resetButton('<i class="fab fa-digital-ocean"></i> <span class="d-sm-none">Limpiar campos</span>', ['title' => 'Limpiar formulario', 'id' => 'clean-fields', 'class' => 'btn btn-sm w-100 bg-red']); ?>
                                </div> <!-- ./col -->
                            </div>
                        </div>
                    </div> <!-- ./card body -->
                </div>
                <!-- ./card -->
            </div> <!-- ./col -->
            <div class="col-md-6">
                <!-- Card -->
                <div class="card">
                    <div id="list-place" class="card-body p-1">
                        <?=
                        DynamicGridForm::widget([
                            'widgetContainer' => 'dgf-container',
                            'multipleModels' => $models,
                            'modelClass' => PreliminaryInventory::class,
                            'columns' => [
                                [
                                    'class' => NormalColumn::class,
                                    'id' => 'id',
                                    'attribute' => 'id',
                                    'options' => [
                                        'class' => 'd-none'
                                    ],
                                    'headerOptions' => [
                                        'class' => 'd-none'
                                    ]
                                ],
                                [
                                    'id' => 'product',
                                    'attribute' => 'product',
                                    'headerOptions' => [
                                        'class' => 'small text-muted text-bold',
                                        'width' => 30
                                    ]
                                ],
                                [
                                    'id' => 'total_units',
                                    'attribute' => 'total_units',
                                    'headerOptions' => [
                                        'class' => 'small text-muted text-bold',
                                        'width' => 20
                                    ]
                                ],
                                [
                                    'id' => 'unit_price',
                                    'attribute' => 'unit_price',
                                    'headerOptions' => [
                                        'class' => 'small text-muted text-bold',
                                        'width' => 20
                                    ]
                                ],
                                [
                                    'id' => 'date_expiry',
                                    'attribute' => 'date_expiry',
                                    'headerOptions' => [
                                        'class' => 'small text-muted text-bold',
                                        'width' => 20
                                    ]
                                ],
                                [
                                    'class' => ActionColumn::class,
                                    'template' => '{delete}',
                                    'buttonsClient' => [
                                        'delete' => '<button type="button" class="pull-left btn btn-sm remove-record bg-red"><i class="fas fa-minus"></i></button>'
                                    ],
                                    'buttons' => [
                                        'delete' => '<button type="button" class="pull-left btn btn-sm remove-record bg-red"><i class="fas fa-minus"></i></button>'
                                    ],
                                    'headerOptions' => [
                                        'width' => 10
                                    ]
                                ]
                            ],
                            'insertButton' => 'add-record',
                            'deleteRowClass' => 'remove-record'
                        ]);
                        ?>
                    </div> <!-- ./card body -->
                </div>
                <!-- ./card -->
            </div> <!-- ./col -->
        </div>
        <div class="row">
            <div class="col">
                <!-- Card -->
                <div class="card rounded-0">
                    <div class="card-body p-2">
                        <?= Html::button('<i class="fas fa-plus"></i> Guardar registros', ['type' => 'submit', 'class' => 'btn w-100 btn-sm btn-primary']); ?>
                    </div> <!-- ./card body -->
                </div>
                <!-- ./card -->
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <!-- ./active form -->
</div>