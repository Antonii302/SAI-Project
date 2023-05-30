<?php

use app\models\Product;
use app\models\InventoryClassification;
use app\models\Inventory;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
use kartik\typeahead\Typeahead;

$this->title = 'Inventario';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="inventory-index">
    <!-- Card --> 
    <div class="card elevation-0 rounded-0">
        <div class="card-body p-3">
            <?=
            Html::a('<i class="fas fa-external-link-alt"></i> Registro de clasificaciones', [''], ['class' => 'card-link']);
            ?>
        </div> <!-- ./card body --> 
    </div>
    <!-- ./card -->

    <!-- Grid view -->
    <?= 
    app\components\Gridview::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'kartik\grid\DataColumn',
                'attribute' => 'classification_id',
                'value' => function ($model) {
                    return '<span class="text-blue h6">' . $model->classification->description . '</span>';
                },
                'group' => true,
                'groupedRow' => true,
                'groupOddCssClass' => 'bg-white',
                'groupEvenCssClass' => 'bg-white',
                'groupHeader' => function ($model, $key, $index, $widget) {
                    return [
                        'mergeColumns' => [[1, 2]],
                        'content' => [
                            1 => '<span class="text-blue h6">' . $model->classification->description . '</span>',
                            3 => GridView::F_SUM
                        ],
                        'contentFormats' => [
                            3 => ['format' => 'number', 'decimals' => 2],
                        ],
                        'contentOptions' => [
                            3 => ['style' => 'text-align: center;'],
                        ]
                    ];
                },
                'format' => 'raw',
                'hidden' => true
            ], // .data column
            [
                'class' => 'kartik\grid\SerialColumn',
                'header' => 'n°',
                'options' => ['style' => 'max-width: 10%;'],
                'width' => '10%'
            ], // .serial column
            [
                'class' => 'kartik\grid\DataColumn',
                'attribute' => 'product_description',
                'value' => 'product.description',
                'options' => ['style' => 'max-width: 35%;'],
                'width' => '35%',
                'filterType' => GridView::FILTER_TYPEAHEAD,        
                'filterInputOptions' => ['class' => 'form-control form-control-sm'],
                'filterWidgetOptions' => [
                    'name' => 'code',
                    'options' => [
                        'autocomplete' => 'off',
                        'placeholder' => 'Buscar...'
                    ],
                    'scrollable' => true,
                    'pluginOptions' => [
                        'highlight' => true
                    ],
                    'dataset' => [
                        [
                            'limit' => 10,
                            'local' => ArrayHelper::getColumn(Product::find()->orderBy('description')->all(), 'description')
                        ]
                    ]
                ]
            ], // .data column
            [
                'class' => 'kartik\grid\DataColumn',
                'attribute' => 'current_quantity',
                'options' => ['style' => 'max-width: 15%;'],
                'width' => '15%',
                'hAlign' => 'center',
                'pageSummary' => true,
                'format' => ['decimal', 2],
                'filter' => false
            ], // .number column
            [
                'class' => 'kartik\grid\DataColumn',
                'attribute' => 'measurement.description',
                'value' => function ($model) {
                    return '<span class="text-muted">' . strtolower($model->measurement->description) . '</span>';
                },
                'options' => ['style' => 'max-width: 20%;'],
                'width' => '20%',
                'format' => 'raw',
                'label' => false,
                'filter' => false
            ], // .data column
            [
                'class' => 'kartik\grid\ActionColumn',
                'options' => ['style' => 'max-width: 10%;'],
                'width' => '10%',
                'dropdown' => true,
                'dropdownButton' => ['label' => '<i class="fas fa-th-large"></i>','class' => 'btn btn-sm btn-default'],
                'template' => '<div class="list-group list-group-flush">{update} {view}</div>',
                'dropdownMenu' => ['class' => 'p-2'],
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="far fa-eye"></i> Abrir detalles', ['view', 'id' => $model->id], [
                            'class' => 'list-group-item list-group-item-action  w-100'
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-marker"></i> Editar registro', ['update', 'id' => $model->id], [
                            'class' => 'list-group-item list-group-item-action w-100'
                        ]);
                    }
                ],
                'header' => false,
            ] // .action column
        ]
    ]);
    ?>
    <!-- ./grid view -->
</div>
