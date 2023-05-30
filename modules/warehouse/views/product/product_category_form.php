<?php

use yii\helpers\Html;

use kartik\form\ActiveForm;

?>

<div class="product-category-form">
    <!-- Active form -->
    <?php $form = ActiveForm::begin([
        'id' => 'product-form',
        'enableClientValidation' => false,
        'type' => ActiveForm::TYPE_VERTICAL,
        'options' => [
            'autocomplete' => 'off'
        ],
        'fieldConfig' => [
            'template' => '<div class="control-label d-inline text-muted">{label}</div> {input}'
        ]
    ]); ?>

    <?= Html::submitButton('<i class="fas fa-plus"></i>', ['class' => 'btn btn-sm bg-blue']); ?>

    <?php ActiveForm::end(); ?>
    <!-- ./active form -->
</div>