<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PreliminaryInventory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="preliminary-inventory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product')->textInput() ?>

    <?= $form->field($model, 'total_units')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_expiry')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
