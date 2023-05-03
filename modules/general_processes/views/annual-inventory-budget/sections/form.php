<?php

use app\models\ProductBudgetDetail;
use app\models\Product;
use app\models\DepartmentalDivision;

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

<div class="annual-inventory-budget-form">
    <!-- Active form -->
    <?php 
    $form = ActiveForm::begin([
        'id' => 'annual-inventory-budget-form',
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <?= Html::activeLabel($annualInventoryBudget, 'start_period', ['class' => 'control-label d-sm-none text-muted']); ?>
                                    <?= $form->field($annualInventoryBudget, 'start_period')->widget(DatePicker::class, [
                                        'id' => 'start_period',
                                        'name' => 'start_period',
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
                                <div class="col-12 col-sm-6">
                                    <?= Html::activeLabel($annualInventoryBudget, 'end_period', ['class' => 'control-label d-sm-none text-muted']); ?>
                                    <?= $form->field($annualInventoryBudget, 'end_period')->widget(DatePicker::class, [
                                        'id' => 'end_period',
                                        'name' => 'end_period',
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
                            </div>
                        </div>
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
                                <div class="col-12 col-sm-5">
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
                                <div class="col-12 col-sm-4">
                                    <label for="departmental_division" class="control-label d-sm-none text-muted">División departamental</label>
                                    <?= Select2::widget([
                                        'id' => 'departmental_division',
                                        'name' => 'departmental_division',
                                        'data' => ArrayHelper::map(DepartmentalDivision::find()->orderBy('name')->all(), 'code', 'name'),
                                        'size' => Select2::SMALL,
                                        'options' => ['placeholder' => 'Selecciona una división departamental'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ]
                                    ]); ?> <!-- ./field -->
                                </div> <!-- ./col -->
                                <div class="col-12 col-sm-2">
                                <label for="requested_units" class="control-label d-sm-none text-muted">Unidades solicitadas</label>
                                    <?= 
                                    NumberControl::widget([
                                        'id' => 'requested_units',
                                        'name' => 'requested_units',
                                        'maskedInputOptions' => [
                                            'allowMinus' => false
                                        ],
                                        'displayOptions' => [
                                            'class' => 'form-control form-control-sm kv-monospace',
                                            'placeholder' => '9,999,999,999'
                                        ]
                                    ]); ?> <!-- ./field -->
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
                            'modelClass' => ProductBudgetDetail::class,
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
                                    'id' => 'departmental_division',
                                    'attribute' => 'departmental_division',
                                    'headerOptions' => [
                                        'class' => 'small text-muted text-bold',
                                        'width' => 20
                                    ]
                                ],
                                [
                                    'id' => 'requested_units',
                                    'attribute' => 'requested_units',
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