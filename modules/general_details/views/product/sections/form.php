<?php

use app\models\ProductCategory;
use app\models\UnitMeasurement;
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

<div class="product-form">
    
    <!-- Active form -->
    <?php 
    $form = ActiveForm::begin([
        'id' => 'product-form',
        'enableClientValidation' => false,
        'type' => ActiveForm::TYPE_VERTICAL,
        'options' => [
            'autocomplete' => 'off'
        ],
        'fieldConfig' => [
            'template' => '<div class="control-label d-inline text-muted">{label}</div> {input}'
        ]
    ]);
    ?>
    
    <?= Html::hiddenInput('id', '', ['id' => 'id']) ?>

    <!-- Container fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <!-- Card -->
                <div class="card rounded-0">
                    <div class="card-body p-2">
                        <div class="container-fluid">
                            <div class="row" style="gap: 8px;">
                                <div class="col-12">
                                    <?= 
                                    $form->field($product_category, 'description')->textInput([
                                        'placeholder' => 'Materiales, productos y art. varios', 
                                        'maxlength' => true, 
                                        'class' => 'form-control-sm'
                                    ]);
                                    ?> <!-- ./form field -->
                                </div> <!-- ./col -->
                                <div class="col-12">
                                    <?php
                                    echo $form->field($product_category, 'is_available')->label(false)->widget(CheckboxX::class, [
                                        'name' => 'is_available',
                                        'options' => [
                                            'id' => 'is_available',
                                            'class' => 'form-check-input', 
                                        ],
                                        'pluginOptions'=>[
                                            'threeState' => false,
                                            'iconChecked'=>'<i class="fas fa-square"></i>',
                                            'data-parsley-multiple' => null,
                                        ],
                                        'labelSettings' => [
                                            'label' => '¿Deshabilitar categoría?',
                                            'options' => [
                                                'class' => 'control-label text-muted'
                                            ],
                                            'position' => CheckboxX::LABEL_RIGHT
                                        ],
                                        'options' => [
                                            'required' => false,
                                        ],
                                    ]);
                                    ?> <!-- ./form field -->
                                </div> <!-- ./col -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./card -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Card -->
                <div class="card">
                    <div class="card-body p-2">
                        <div class="container-fluid">
                            <div class="form-row" class="row">
                                <div class="col-2">
                                    <label for="code" class="control-label d-sm-none text-muted">Descripción</label>
                                    <?= 
                                    Html::textInput('type', null, [
                                        'id' => 'code',
                                        'name' => 'code',
                                        'class' => 'form-control form-control-sm',
                                        'placeholder' => '3359001'
                                    ]); ?> <!-- ./field -->
                                </div> <!-- ./col -->
                                <div class="col">
                                    <label for="product" class="control-label d-sm-none text-muted">Descripción</label>
                                    <?= 
                                    Html::textInput('type', null, [
                                        'id' => 'description',
                                        'name' => 'description',
                                        'class' => 'form-control form-control-sm',
                                        'placeholder' => 'Libros en blanco'
                                    ]); ?> <!-- ./field -->
                                </div> <!-- ./col -->
                                <div class="col-12 col-sm-5">
                                    <label for="unit_measurement" class="control-label d-sm-none text-muted">Unidad de medida</label>
                                    <?= Select2::widget([
                                        'id' => 'unit_measurement',
                                        'name' => 'unit_measurement',
                                        'data' => ArrayHelper::map(UnitMeasurement::find()->orderBy('description')->all(), 'id', 'unit'),
                                        'size' => Select2::SMALL,
                                        'options' => ['placeholder' => 'Selecciona una unidad de medida'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ]
                                    ]); ?> <!-- ./field -->
                                </div> <!-- ./col -->                            
                                <div class="col-sm-1 mt-2 mt-sm-0">
                                    <?= Html::button('<i class="fas fa-plus"></i> <span class="d-sm-none">Añadir registro</span>', ['type' => 'button', 'title' => 'Añadir registro', 'id' => 'add-record', 'class' => 'btn btn-sm mb-2 w-100 bg-green']); ?>
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
                            'multipleModels' => $products,
                            'modelClass' => Product::class,
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
                                ], // *serial column
                                [
                                    'id' => 'code',
                                    'attribute' => 'code',
                                    'headerOptions' => [
                                        'class' => 'small text-muted text-bold',
                                        'width' => 20
                                    ]
                                ],
                                [
                                    'id' => 'description',
                                    'attribute' => 'description',
                                    'headerOptions' => [
                                        'class' => 'small text-muted text-bold',
                                        'width' => 40
                                    ]
                                ], // *data column
                                [
                                    'id' => 'unit_measurement',
                                    'attribute' => 'unit_measurement',
                                    'headerOptions' => [
                                        'class' => 'small text-muted text-bold',
                                        'width' => 30
                                    ]
                                ], // *data column
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
                                ] // *data column
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
    <!-- ./container fluid -->

    <?php ActiveForm::end(); ?>
    <!-- ./active form -->
</div>