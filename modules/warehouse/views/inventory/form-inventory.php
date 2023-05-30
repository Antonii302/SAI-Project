<?php

use app\models\Product;
use app\models\UnitMeasurement;
use app\models\Inventory;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\select2\Select2;
use kartik\number\NumberControl;

use wbraganca\dynamicform\DynamicFormWidget;

?>

<div class="classification-form">
    <?php
    DynamicFormWidget::begin([
        'widgetContainer' => 'form_inner',
        'widgetBody' => '.container-inventory',
        'widgetItem' => '.single-inventory',
        'formId' => 'inventory-form',
        'model' => $inventories[0],
        'formFields' => [
            'product_id',
            'current_quantity',
            'measurement_id',
        ],
        'insertButton' => '.add-inventory',
        'deleteButton' => '.remove-inventory',
        'min' => 1,
        'limit' => 50,
    ]);
    ?>

    <div class="container-inventory">
        <div class="container-fluid">            
            <?php foreach($inventories as $j => $inventory): ?>
                <div class="single-inventory">
                    <div class="row">
                        <div class="col-12 col-sm-5">
                            <?=
                            $form->field($inventory, "[{$j}]product_id")->widget(Select2::class, [
                                'data' => ArrayHelper::map(Product::find()->orderBy('description')->all(), 'id', 'description'),
                                'options' => ['placeholder' => 'Seleccionar...'],
                                'pluginOptions' => [
                                    'tags' => true
                                ],
                                'theme' => Select2::THEME_BOOTSTRAP,
                                'size' => Select2::SMALL
                            ]);
                            ?>
                        </div> <!-- ./col -->
                        <div class="col-12 col-sm-3">
                            <?=
                            $form->field($inventory, "[{$j}]current_quantity")->widget(NumberControl::class, [
                                'maskedInputOptions' => [
                                    'allowMinus' => false
                                ],
                                'displayOptions' => [
                                    'class' => 'form-control form-control-sm',
                                    'placeholder' => '99,999,999.99'
                                ]
                            ]);
                            ?>
                        </div>
                        <div class="col-12 col-sm-3">
                            <?=
                            $form->field($inventory, "[{$j}]measurement_id")->widget(Select2::class, [
                                'data' => ArrayHelper::map(UnitMeasurement::find()->orderBy('description')->all(), 'id', 'description'),
                                'options' => ['placeholder' => 'Seleccionar...'],
                                'pluginOptions' => [
                                    'tags' => true
                                ],
                                'theme' => Select2::THEME_BOOTSTRAP,
                                'size' => Select2::SMALL
                            ]);
                            ?>
                        </div> <!-- ./col -->
                        <div class="col-sm-1 mt-2 mt-sm-0">
                            <?= Html::button('<i class="fas fa-plus"></i> <span class="d-sm-none">Añadir registro</span>', ['type' => 'button', 'title' => 'Añadir registro', 'class' => 'btn btn-sm add-record mb-2 w-100 bg-green']); ?>
                            <?= Html::resetButton('<i class="fab fa-digital-ocean"></i> <span class="d-sm-none">Limpiar campos</span>', ['title' => 'Limpiar formulario', 'id' => 'clean-fields', 'class' => 'btn btn-sm w-100 bg-red']); ?>
                        </div> <!-- ./col -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>
    <!-- ./dynamic form -->
</div>