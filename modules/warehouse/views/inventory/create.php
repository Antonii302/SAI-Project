<?php

use yii\helpers\Html;

$this->title = 'Nuevo registro';

$this->params['breadcrumbs'][] = ['label' => 'Inventario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="inventory-create">

    <?= 
    $this->render('form-classification', [
        'inventory_classification' => $inventory_classification,
        'inventories' => $inventories,
    ]);
    ?>

</div>
