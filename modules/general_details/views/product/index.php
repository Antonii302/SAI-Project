<?php

use app\models\ProductCategory;
use app\models\UnitMeasurement;
use app\models\Product;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
use kartik\typeahead\Typeahead;
use kartik\select2\Select2;

$this->title = 'Detalles generales';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="general-detail-home">
    <!-- Container fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?=
                    app\components\GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'class' => 'kartik\grid\DataColumn',
                                'group' => true,
                                'attribute' => 'product_category',
                                'value' => function ($model, $key, $index, $widget) {
                                    return $model->productCategory->description;
                                },
                                'vAlign' => 'middle',
                                'options' => ['style' => 'max-width: 10%;'],
                                'width' => '10%',
                                'filterType' => GridView::FILTER_TYPEAHEAD,
                                'filterWidgetOptions' => [
                                    'name' => 'product_category',
                                    'options' => [
                                        'placeholder' => 'Buscar...'
                                    ],
                                    'dataset' => [
                                        [
                                            'limit' => 10,
                                            'local' => array_values(ArrayHelper::map(
                                                ProductCategory::find()
                                                ->orderBy('description')
                                                ->asArray()
                                                ->all(), 
                                                'description', 'description')
                                            )
                                        ]
                                    ],
                                    'pluginOptions' => [
                                        'highlight' => true
                                    ],
                                    'scrollable' => true
                                ],
                            ], // .data column
                            [
                                'class' => 'kartik\grid\SerialColumn',
                                'header' => 'n°',
                                'options' => ['style' => 'max-width: 10%;'],
                                'width' => '10%'
                            ], // .serial column
                            [
                                'class' => 'kartik\grid\DataColumn',
                                'attribute' => 'description',
                                'options' => ['style' => 'max-width: 50%;'],
                                'width' => '40%',
                                'filterType' => GridView::FILTER_TYPEAHEAD,
                                'filterWidgetOptions' => [
                                    'name' => 'description',
                                    'options' => [
                                        'placeholder' => 'Buscar...'
                                    ],
                                    'dataset' => [
                                        [
                                            'limit' => 10,
                                            'local' => array_values(ArrayHelper::map(
                                                Product::find()
                                                ->orderBy('description')
                                                ->asArray()
                                                ->all(), 
                                                'id', 'description')
                                            )
                                        ]
                                    ],
                                    'pluginOptions' => [
                                        'highlight' => true
                                    ],
                                    'scrollable' => true
                                ]
                            ], // .data column
                            [
                                'class' => 'kartik\grid\BooleanColumn',
                                'attribute' => 'productCategory.is_available',
                                'options' => ['style' => 'max-width: 10%;'],
                                'width' => '10%',
                                'filterWidgetOptions' => [
                                    'hideSearch' => true,
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ]
                                ],
                                'filter' => ArrayHelper::map(ProductCategory::find()->orderBy('is_available')->all(), 'is_available', 'is_available'),
                                'trueLabel' => 'Sí',
                                'trueIcon' => '<p class="text-bold text-green small">Habilitada</p>',
                                'falseLabel' => 'No',
                                'falseIcon' => '<p class="text-bold text-red small">Deshabilitada</p>'
                            ], // *data column
                            [
                                'class' => 'kartik\grid\DataColumn',
                                'attribute' => 'unit_measurement',
                                'value' => function ($model, $key, $index, $widget) {
                                    return strtolower($model->unitMeasurement->unit);
                                },
                                'options' => ['style' => 'max-width: 10%;'],
                                'width' => '10%',
                                'filterType' => GridView::FILTER_TYPEAHEAD,
                                'filterWidgetOptions' => [
                                    'name' => 'unit_measurement',
                                    'options' => [
                                        'placeholder' => 'Buscar...'
                                    ],
                                    'dataset' => [
                                        [
                                            'limit' => 10,
                                            'local' => array_values(ArrayHelper::map(
                                                UnitMeasurement::find()
                                                ->orderBy('unit')
                                                ->asArray()
                                                ->all(), 
                                                'id', 'unit')
                                            )
                                        ]
                                    ],
                                    'pluginOptions' => [
                                        'highlight' => true
                                    ],
                                    'scrollable' => true
                                ]
                            ], // .data column
                            [
                                'class' => 'kartik\grid\ActionColumn',
                                'width' => '10%',
                                'options' => ['style' => 'max-width: 10%;'],
                                'dropdown' => true,
                                'dropdownButton' => ['label' => '<i class="fas fa-th-list"></i>','class' => 'btn btn-sm btn-default'],
                                'buttons' => [
                                    'view' => function ($url, $model, $key) {
                                        return Html::a('<i class="far fa-eye"></i> Abrir detalles', ['view', 'product_category' => $model->product_category], [
                                            'class' => 'dropdown-item w-100'
                                        ]);
                                    },
                                    'update' => function ($url, $model, $key) {
                                        return Html::a('<i class="fas fa-marker"></i> Editar registro', ['update', 'product_category' => $model->product_category], [
                                            'class' => 'dropdown-item w-100'
                                        ]);
                                    },
                                    'delete' => function ($url, $model, $key) {
                                        return Html::a('<i class="fas fa-minus-circle"></i> Deshabilitar categoría', ['delete', 'product_category' => $model->product_category], [
                                            'class' => 'dropdown-item w-100'
                                        ]);
                                    }
                                ]
                            ] // .action column
                        ]
                    ]);
                    ?>
            </div> <!-- ./col -->
        </div>
    </div>
    <!-- ./container fluid -->
</div>