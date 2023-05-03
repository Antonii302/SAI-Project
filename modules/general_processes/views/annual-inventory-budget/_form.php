<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AnnualInventoryBudget $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="annual-inventory-budget-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_period')->textInput() ?>

    <?= $form->field($model, 'end_period')->textInput() ?>

    <?= $form->field($model, 'is_editable')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
