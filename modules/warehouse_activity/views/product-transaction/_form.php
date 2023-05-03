<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductTransaction $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product')->textInput() ?>

    <?= $form->field($model, 'departmental_division')->textInput() ?>

    <?= $form->field($model, 'requested_units')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
