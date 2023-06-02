<?php

use app\models\Product;
use app\models\UnitMeasurement;
use app\models\InventoryClassification;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;

use wbraganca\dynamicform\DynamicFormWidget;

?>

<div class="inventory-form">
    <!-- Active form -->
    <?php 
    $form = ActiveForm::begin([
        'id' => 'inventory-form',
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

    <div class="card shadow-sm rounded-0">
        <div class="card-header border-0 p-3">
            <?=
            CheckboxX::widget([
                'name' => 'asd',
                'options' => [
                    'class' => 'form-check-input'
                ],
                'labelSettings' => [
                    'label' => 'Clasificación especial',
                    'options' => [
                        'class' => ' ml-2 col-form-label text-muted'
                    ],
                    'position' => CheckboxX::LABEL_RIGHT
                ],
                'pluginOptions' => [
                    'threeState' => false,
                    'iconChecked' => '<i class="fas fa-square"></i>',
                    'data-parsley-multiple' => null
                ]
            ]); // .form field
            ?>
        </div> <!-- ./card body --> 
    </div>

    <!-- Dynamic form -->
    <?php
    DynamicFormWidget::begin([
        'widgetContainer' => 'dynamic_form',
        'widgetBody' => '.container-classification',
        'widgetItem' => '.single-classification',
        'formId' => 'inventory-form',
        'model' => $inventory_classification[0],
        'formFields' => [
            'description'
        ],
        'insertButton' => '.add-classification',
        'deleteButton' => '.remove-classification',
        'min' => 1,
        'limit' => 2,
    ]);
    ?>

    <!-- Container classification -->
    <div class="container-classification">
        <?php foreach($inventory_classification as $i => $classification): ?>
            <div class="single-classification">
                <!-- Container -->
                <div class="container-fluid p-0">
                    <div class="row">
                        <?php
                            if (!$classification->isNewRecord) {
                                echo Html::activeHiddenInput($classification, "[{$i}]id");
                            }
                        ?>
                        <div class="col-12 col-md-4">
                            <!-- Card --> 
                            <div class="card shadow-sm rounded-0">
                                <div class="card-body p-3">
                                    <?= $form->field($classification, "[{$i}]description")->widget(Select2::class, [
                                        'data' => ArrayHelper::map(InventoryClassification::find()->orderBy('description')->all(), 'description', 'description'),
                                        'options' => ['placeholder' => 'Inventario por clasificación...'],
                                        'pluginOptions' => [
                                            'tags' => true
                                        ],
                                        'theme' => Select2::THEME_BOOTSTRAP,
                                        'size' => Select2::SMALL
                                    ]); // .form field
                                    ?>
                                </div> <!-- ./card body -->
                            </div>
                            <!-- ./card -->
                        </div>
                        <div class="col-12 col-md-8">
                            <!-- Card --> 
                            <div class="card shadow-sm rounded-0"> 
                                <div class="card-body p-3">
                                    <?= $this->render('form-inventory', [
                                        'form' => $form,
                                        'i' => $i,
                                        'inventories' => $inventories[$i],
                                    ]) ?>
                                </div> <!-- ./card body -->
                            </div>
                            <!-- ./card -->
                        </div> <!-- ./col -->
                    </div>
                </div>
                <!-- ./container -->
            </div>
        <?php endforeach; ?>
    </div>
    <!-- ./container classification -->

    <?php DynamicFormWidget::end(); ?>
    <!-- ./dynamic form -->

    <?php ActiveForm::end(); ?>
    <!-- ./active form -->
</div>
