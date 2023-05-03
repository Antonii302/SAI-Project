<?php

use yii\helpers\Html;

$this->title = 'Vista detallada';
$this->params['breadcrumbs'][] = ['label' => 'Inventario preliminar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="preliminary-inventory-view">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="bg-light p-2">
                                <?= $model->product0->description ;?>
                            </h5>
                        </div>
                        <div class="col-6">
                            <?= Html::a('<i class="fas fa-marker"></i> Editar registro', ['update', 'id' => $model->id], [
                                'class' => 'btn btn-sm btn-default w-100' ]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <p class="small">Unidades totales</p>
                                </div>
                                <div class="col-8">
                                    <p class="text-bold text-primary text-right"><?= $model->total_units; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <p class="small">Precio unitario</p>
                                </div>
                                <div class="col-8">
                                    <p class="text-bold text-primary text-right"><?= $model->unit_price; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <p class="small">Fecha de caducidad</p>
                                </div>
                                <div class="col-8">
                                    <p class="text-right"><?= $model->date_expiry; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./card -->
            </div>            
        </div>
    </div>

</div>
