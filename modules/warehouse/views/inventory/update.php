<?php

use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product->description, 'url' => ['view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = 'Actualizar registro';

?>

<div class="inventory-update">

    <?=
    $this->render('form-classification', [
        'inventory_classification' => $inventory_classification,
        'inventories' => $inventories,
    ]);
    ?>

</div>
