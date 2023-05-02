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
            'template' => '{label} {input} <div style="margin-top: 5px; margin-bottom: 5px; height: 10px;">{error}</div>'
        ]
    ]);
    ?>
    <!-- Card -->
    <div class="card" style="border-radius: 0 0 12px 12px;">
        <div class="card-body">
            <?= 
            CheckboxX::widget([
                'name' => 'inventory_type',
                'options' => [
                    'id' => 'inventory_type'
                ],
                'labelSettings' => [
                    'label' => 'Almacenamiento como INVENTARIO PRELIMINAR',
                    'position' => CheckboxX::LABEL_RIGHT,
                    'options' => ['class' => 'text-muted ml-3']
                ],
                'pluginOptions'=>[
                    'threeState' => false,
                    'iconChecked'=>'<i class="fas fa-square"></i>',
                ]
            ]);
            ?>
        </div> <!-- ./card body -->
        <div class="card-footer">
            <?= Html::button('<i class="fas fa-plus"></i> Guardar en inventario', ['type' => 'submit', 'class' => 'btn w-100 btn-sm btn-primary']); ?>
        </div> <!-- ./card footer -->
    </div>
    <!-- ./card -->

    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <div class="bg-light rounded p-2">
                <p class="text-red">Aún no añades producto alguno.</p>
            </div>
        </div>
    </div>
    <!-- ./card -->

    <!-- Card -->
    <div class="card" style="border-radius: 12px 12px 0 0;">
        <div class="card-header border-0">

        </div> <!-- ./card header -->
        <div class="card-body p-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <?= $form->field($model, 'product')->widget(Select2::class, [
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
                            'options' => [
                                'type' => 'text'
                            ],
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
                            'options' => [
                                'type' => 'text'
                            ],
                            'maskedInputOptions' => [
                                'prefix' => '$',
                                'allowMinus' => false
                            ],
                            'displayOptions' => [
                                'class' => 'form-control form-control-sm kv-monospace',
                                'placeholder' => '000000.00'
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
                                'orientation' => 'bottom',
                                'todayBtn' => true
                            ],
                            'size' => 'sm',
                            'options' => ['placeholder' => '01-01-2023'],
                        ]);?> <!-- ./field -->
                    </div> <!-- ./col -->
                    <div class="col-12 col-sm-1 m-auto">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <?= Html::button('<i class="fas fa-plus"></i>', ['type' => 'button', 'title' => 'Añadir producto', 'class' => 'btn w-100 btn-sm bg-blue']); ?>
                            </div> <!-- ./col -->
                            <div class="col-12">
                                <?= Html::button('<i class="fab fa-digital-ocean"></i>', ['type' => 'button', 'title' => 'Limpiar formulario', 'class' => 'btn w-100 btn-sm bg-red']); ?>
                            </div> <!-- ./col -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./card body -->
    </div>
    <!-- ./card -->
    <?php ActiveForm::end(); ?>
    <!-- ./active form -->
</div>