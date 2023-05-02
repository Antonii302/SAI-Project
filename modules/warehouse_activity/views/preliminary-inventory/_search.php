<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\warehouse_activity\models\PreliminaryInventorySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="preliminary-inventory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product') ?>

    <?= $form->field($model, 'total_units') ?>

    <?= $form->field($model, 'unit_price') ?>

    <?= $form->field($model, 'date_expiry') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
