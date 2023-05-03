<?php 

use app\models\PreliminaryInventory;
use app\models\Product;


use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
use kartik\typeahead\Typeahead;
use kartik\select2\Select2;

$this->title = 'Inventario preliminar';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="user-index">
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
                            'class' => 'kartik\grid\SerialColumn',
                            'header' => 'n°',
                            'width' => '10%',
                            'options' => ['style' => 'max-width: 10%;']
                        ],
                        [
                            'class' => 'kartik\grid\DataColumn',
                            'attribute' => 'product',
                            'value' => function ($model, $key, $index, $widget) {
                                return $model->product0->description;
                            },
                            'width' => '35%',
                            'filterType' => GridView::FILTER_SELECT2,
                            'filter' => ArrayHelper::map(Product::find()->orderBy('description')->all(), 'id', 'description'),
                            'filterWidgetOptions' => [
                                'options' => ['placeholder' => 'Buscar...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ]
                            ],
                            'options' => ['style' => 'max-width: 35%;']
                        ],
                        [
                            'class' => 'kartik\grid\DataColumn',
                            'attribute' => 'total_units',
                            'vAlign' => 'middle',
                            'width' => '15%',
                            'options' => ['style' => 'max-width: 15%;'],
                            'filterType' => GridView::FILTER_TYPEAHEAD,
                            'filterWidgetOptions' => [
                                'name' => 'total_units',
                                'options' => [
                                    'placeholder' => 'Buscar...'
                                ],
                                'dataset' => [
                                    [
                                        'local' => array_values(ArrayHelper::map(
                                            PreliminaryInventory::find()
                                            ->orderBy('total_units')
                                            ->asArray()
                                            ->all(), 
                                            'total_units', 'total_units')
                                        ),
                                        'limit' => 10
                                    ]
                                ],
                                'scrollable' => true,
                                'pluginOptions' => [
                                    'highlight' => true
                                ],
                            ]
                        ],
                        [
                            'class' => 'kartik\grid\DataColumn',
                            'attribute' => 'unit_price',
                            'vAlign' => 'middle',
                            'width' => '10%',
                            'options' => ['style' => 'max-width: 10%;'],
                            'filterType' => GridView::FILTER_TYPEAHEAD,
                            'filterWidgetOptions' => [
                                'name' => 'total_units',
                                'options' => [
                                    'placeholder' => 'Buscar...'
                                ],
                                'dataset' => [
                                    [
                                        'local' => array_values(ArrayHelper::map(
                                            PreliminaryInventory::find()
                                            ->orderBy('unit_price')
                                            ->asArray()
                                            ->all(), 
                                            'unit_price', 'unit_price')
                                        ),
                                        'limit' => 10
                                    ]
                                ],
                                'scrollable' => true,
                                'pluginOptions' => [
                                    'highlight' => true
                                ],
                            ]
                        ],
                        [
                            'attribute' => 'date_expiry',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDate($model->date_expiry, 'yyyy-MM-dd');
                            },
                            'filterType' => GridView::FILTER_DATE,
                            'filterWidgetOptions' => [
                                'layout' => '{picker} {input} {remove}',
                                'pickerIcon' => '<i class="fas fa-calendar-week"></i>',
                                'removeIcon' => '<i class="fas fa-times-circle"></i>',
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'autoclose' => true,
                                ],
                            'options' => ['placeholder' => 'Buscar...'],
                            ]
                        ],
                        [
                            'class' => 'kartik\grid\ActionColumn',
                            'width' => '10%',
                            'options' => ['style' => 'max-width: 10%;'],
                            'dropdown' => true,
                            'dropdownButton' => ['label' => '<i class="fas fa-th-list"></i>','class' => 'btn btn-sm btn-default'],
                            'buttons' => [
                                'view' => function ($url, $model, $key) {
                                    return Html::a('<i class="far fa-eye"></i> Abrir detalles', ['view', 'id' => $model->id], [
                                        'class' => 'dropdown-item w-100'
                                    ]);
                                },
                                'update' => function ($url, $model, $key) {
                                    return Html::a('<i class="fas fa-marker"></i> Editar registro', ['update', 'id' => $model->id], [
                                        'class' => 'dropdown-item w-100'
                                    ]);
                                }
                            ]
                        ]
                    ]
                ]);
                ?>
            </div> <!-- ./col -->
        </div>
    </div> 
    <!-- ./container fluid -->
</div>