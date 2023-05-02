<?php

use app\models\Product;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\form\ActiveForm;
use kartik\checkbox\CheckboxX;
use kartik\select2\Select2;
use kartik\number\NumberControl;
use kartik\date\DatePicker;

?>
<div class="preliminary-inventory-form">
    <!-- Active form -->
    <?php 
    $form = ActiveForm::begin([
        'id' => 'preliminary-inventory-form',
        'type' => ActiveForm::TYPE_VERTICAL,
        'options' => [
            'autocomplete' => 'off'
        ],
        'fieldConfig' => [
            'template' => '{input} <div class="d-block" style="margin-top: 5px; margin-bottom: 12px; height: 25px;">{error}</div>'
        ]
    ]);
    ?>
    <!-- Card -->
    <div class="card" style="border-radius: 0 0 12px 12px;">
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
            ?>
            <label class="cbx-label d-inline float-rigth text-muted ml-3" for="inventory_type">¿Almacenar como INVENTARIO PRELIMINAR?</label> <!-- ./form field -->
        </div> <!-- ./card body -->
        <div class="card-footer">
            <?= Html::button('<i class="fas fa-plus"></i> Guardar registros', ['type' => 'submit', 'class' => 'btn w-100 btn-sm btn-primary']); ?>
        </div> <!-- ./card footer -->
    </div>
    <!-- ./card -->

    <!-- Card -->
    <div class="card">
        <div class="card-body p-1">
            <div class="container-fluid">
                <div id="no-records-alert" class="bg-light rounded p-2">
                    <span class="text-muted text-red">No se han encontrado registros.</span>
                </div>
                <div id="records-list" class="p-2" style="max-height: 420px; overflow-y: auto; overflow-x: hidden;"></div>
            </div>
        </div> <!-- ./card body -->
        <div class="card-footer">
            <small id="total-records">[] registros totales</small>
        </div> <!-- ./card footer -->
    </div>
    <!-- ./card -->

    <!-- Card -->
    <div class="card" style="border-radius: 12px 12px 0 0;">
        <div class="card-body p-1">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <?= Html::button('<i class="fas fa-plus"></i>', ['type' => 'button', 'title' => 'Añadir registro', 'id' => 'add-record', 'class' => 'btn btn-sm float-right bg-blue']); ?>
                    </div> <!-- ./col -->
                </div>
                <div class="form-row" class="row mb-4">
                    <div class="col-12 col-sm-4">
                        <?= $form->field($model, 'product[]')->widget(Select2::class, [
                            'data' => ArrayHelper::map(Product::find()->orderBy('description')->all(), 'id', 'description'),
                            'size' => Select2::SMALL,
                            'options' => ['placeholder' => 'Selecciona un producto'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ]); ?> <!-- ./field -->
                    </div> <!-- ./col -->
                    <div class="col-12 col-sm-2">
                        <?= $form->field($model, 'total_units')->widget(NumberControl::class, [
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
                        <?= $form->field($model, 'unit_price')->widget(NumberControl::class, [
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
                        <?= $form->field($model, 'date_expiry')->widget(DatePicker::class, [
                            'layout' => '{picker} {input} {remove}',
                            'pickerIcon' => '<i class="fas fa-calendar-week"></i>',
                            'removeIcon' => '<i class="fas fa-times-circle"></i>',
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'autoclose' => true,
                                'orientation' => 'top',
                            ],
                            'size' => 'sm',
                            'options' => ['placeholder' => '01-01-2023'],
                        ]);?> <!-- ./field -->
                    </div> <!-- ./col -->
                    <div class="col-sm-1">
                        <?= Html::button('<i class="fab fa-digital-ocean"></i>', ['type' => 'button', 'title' => 'Limpiar formulario', 'id' => 'clean-fields', 'class' => 'btn btn-sm w-100 bg-red']); ?>
                    </div> <!-- ./col -->
                </div>
                <div class="d-none d-sm-flex bg-light rounded p-2 row" role="button">
                    <div class="col-sm-4"><p class="h6 text-lowercase text-muted">Producto</p></div> <!-- ./col -->
                    <div class="col-sm-2"><p class="h6 text-lowercase text-muted">Total unidades</p></div> <!-- ./col -->
                    <div class="col-sm-2"><p class="h6 text-lowercase text-muted">Precio unitario</p></div> <!-- ./col -->
                    <div class="col-sm-3"><p class="h6 text-lowercase text-muted">Fecha de caducidad</p></div> <!-- ./col -->
                </div>
            </div>
        </div> <!-- ./card body -->
    </div>
    <!-- ./card -->
    <?php ActiveForm::end(); ?>
    <!-- ./active form -->
</div>