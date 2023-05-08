<?php 

use app\models\AnnualInventoryBudget;
use app\models\Product;
use app\models\DepartmentalDivision;


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
                            'attribute' => 'start_period',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDate($model->start_period, 'yyyy-MM-dd');
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
                            'attribute' => 'end_period',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDate($model->end_period, 'yyyy-MM-dd');
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
                            'class' => 'kartik\grid\BooleanColumn',
                            'attribute' => 'is_editable',
                            'width' => '15%',
                            'options' => ['style' => 'max-width: 15%;'],
                            'filterType' => GridView::FILTER_SELECT2,
                            'filterWidgetOptions' => [
                                // 'size' => Select2::SMALL,
                                'hideSearch' => true,
                                // 'options' => ['placeholder'=> 'Buscar...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ]
                            ],
                            'trueLabel' => 'Sí',
                            'trueIcon' => '<p class="text-bold text-green small">Activo</p>',
                            'falseLabel' => 'No',
                            'falseIcon' => '<p class="text-bold text-red small">Inactivo</p>'
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