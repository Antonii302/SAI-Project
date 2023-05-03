<?php

use yii\helpers\Html;

$this->title = 'Nuevo registro';
$this->params['breadcrumbs'][] = ['label' => 'Presupuesto de inventario anual', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="annual-inventory-budget-create">

    <?= $this->render('sections/form.php', [
        'models' => $models,
        'annualInventoryBudget' => $annualInventoryBudget
    ]) ?>

</div>
