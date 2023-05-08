<?php

use yii\helpers\Html;

$this->title = 'Actualizar registro';
$this->params['breadcrumbs'][] = ['label' => 'Presupuesto de inventario anual', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="annual-inventory-budget-create">

    <?= $this->render('sections/form.php', [
        'product_budget_detail' => $product_budget_detail,
        'annual_inventory_budget' => $annual_inventory_budget
    ]) ?>

</div>
