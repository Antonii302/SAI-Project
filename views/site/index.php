<?php

use yii\helpers\Html;

use dosamigos\chartjs\ChartJs;

$this->title = 'Panel de control';
$this->params['breadcrumbs'] = [['label' => $this->title]];

?>

<div class="container-fluid">
    <!-- Info boxs -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => '[placeholder]',
                'number' => 'placeholder',
                'iconTheme' => 'teal',
                'icon' => 'fas fa-users',
                'theme' => 'white'
            ]); 
            ?>
        </div> <!-- ./col -->
        <div class="col-12 col-sm-6 col-md-3">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => '[placeholder]',
                'number' => 'placeholder',
                'iconTheme' => 'red',
                'icon' => 'fas fa-file-alt',
                'theme' => 'white'
            ]); 
            ?>
        </div> <!-- ./col -->
        <div class="col-12 col-sm-6 col-md-3">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => '[placeholder]',
                'number' => 'placeholder',
                'iconTheme' => 'dark',
                'icon' => 'fas fa-folder-open',
                'theme' => 'white'
            ]); 
            ?>
        </div> <!-- ./col -->
        <div class="col-12 col-sm-6 col-md-3">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => '[placeholder]',
                'number' => 'placeholder',
                'iconTheme' => 'cyan',
                'icon' => 'fas fa-barcode',
                'theme' => 'white'
            ]); 
            ?>
        </div> <!-- ./col -->
    </div>
    <!-- ./info boxs -->

    <!-- Pie charts -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <!-- Card -->
            <div class="card">
                <div class="card-header border-0">
                    <?= Html::a('Ver informe', [''], ['class' => 'card-link']); ?>
                </div> <!-- ./card header -->
                <div class="card-body">
                    <div class="p-4">
                        <?= 
                        ChartJs::widget([
                            'type' => 'doughnut',
                            'options' => [
                                'height' => 300,
                                'width' => 400
                            ],
                            'data' => [
                                'labels' => ["Red", "Blue", "Yellow"],
                                'datasets' => [
                                    [
                                        'label' => 'My First Dataset',
                                        'data' =>  [300, 50, 100],
                                        'backgroundColor' =>  [
                                        'rgb(255, 99, 132)',
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 205, 86)'
                                        ],
                                    ]
                                ]
                            ]
                        ]);
                        ?> <!-- ./chart -->
                    </div>
                    <h5 class="card-title">[placeholder]</h5>
                </div> <!-- ./card body -->
                <div class="card-footer">
                    <small class="text-muted">[placeholder]</small>
                </div> <!-- ./card footer -->
            </div>
            <!-- /.card -->
        </div> <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <!-- Card -->
            <div class="card">
                <div class="card-header border-0">
                    <?= Html::a('Ver informe', [''], ['class' => 'card-link']); ?>
                </div> <!-- ./card header -->
                <div class="card-body">
                    <div class="p-4">
                        <?= 
                        ChartJs::widget([
                            'type' => 'doughnut',
                            'options' => [
                                'height' => 300,
                                'width' => 400
                            ],
                            'data' => [
                                'labels' => ["Red", "Blue", "Yellow"],
                                'datasets' => [
                                    [
                                        'label' => 'My First Dataset',
                                        'data' =>  [300, 50, 100],
                                        'backgroundColor' =>  [
                                        'rgb(255, 99, 132)',
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 205, 86)'
                                        ],
                                    ]
                                ]
                            ]
                        ]);
                        ?> <!-- ./chart -->
                    </div>
                    <h5 class="card-title">[placeholder]</h5>
                </div> <!-- ./card body -->
                <div class="card-footer">
                    <small class="text-muted">[placeholder]</small>
                </div> <!-- ./card footer -->
            </div>
            <!-- /.card -->
        </div> <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <!-- Card -->
            <div class="card">
                <div class="card-header border-0">
                    <?= Html::a('Ver informe', [''], ['class' => 'card-link']); ?>
                </div> <!-- ./card header -->
                <div class="card-body">
                    <div class="p-4">
                        <?= 
                        ChartJs::widget([
                            'type' => 'doughnut',
                            'options' => [
                                'height' => 300,
                                'width' => 400
                            ],
                            'data' => [
                                'labels' => ["Red", "Blue", "Yellow"],
                                'datasets' => [
                                    [
                                        'label' => 'My First Dataset',
                                        'data' =>  [300, 50, 100],
                                        'backgroundColor' =>  [
                                        'rgb(255, 99, 132)',
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 205, 86)'
                                        ],
                                    ]
                                ]
                            ]
                        ]);
                        ?> <!-- ./chart -->
                    </div>
                    <h5 class="card-title">[placeholder]</h5>
                </div> <!-- ./card body -->
                <div class="card-footer">
                    <small class="text-muted">[placeholder]</small>
                </div> <!-- ./card footer -->
            </div>
            <!-- /.card -->
        </div> <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <!-- Card -->
            <div class="card">
                <div class="card-header border-0">
                    <?= Html::a('Ver informe', [''], ['class' => 'card-link']); ?>
                </div> <!-- ./card header -->
                <div class="card-body">
                    <div class="p-4">
                        <?= 
                        ChartJs::widget([
                            'type' => 'doughnut',
                            'options' => [
                                'height' => 300,
                                'width' => 400
                            ],
                            'data' => [
                                'labels' => ["Red", "Blue", "Yellow"],
                                'datasets' => [
                                    [
                                        'label' => 'My First Dataset',
                                        'data' =>  [300, 50, 100],
                                        'backgroundColor' =>  [
                                        'rgb(255, 99, 132)',
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 205, 86)'
                                        ],
                                    ]
                                ]
                            ]
                        ]);
                        ?> <!-- ./chart -->
                    </div>
                    <h5 class="card-title">[placeholder]</h5>
                </div> <!-- ./card body -->
                <div class="card-footer">
                    <small class="text-muted">[placeholder]</small>
                </div> <!-- ./card footer -->
            </div>
            <!-- /.card -->
        </div> <!-- /.col -->
    </div>
    <!-- ./pie charts -->

    <!-- Table -->
    <div class="row">
        <div class="col">
            <!-- Card -->
            <div class="card">
                <div class="card-header border-0">
                    <h5 class="card-title">[placeholder]</h5>
                </div>
                <div class="card-body">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr class="tr">
                                    <th scope="col">[placeholder]</th>
                                    <th scope="col">[placeholder]</th>
                                    <th scope="col">[placeholder]</th>
                                    <th scope="col">[placeholder]</th>
                                    <th scope="col">[placeholder]</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-danger">
                                    <th scope="row">[placeholder]</th>
                                    <td>[placeholder]</td>
                                    <td>[placeholder]</td>
                                    <td>----</td>
                                    <td>$ ----</td>
                                </tr>
                                <tr>
                                    <th scope="row">[placeholder]</th>
                                    <td>[placeholder]</td>
                                    <td>[placeholder]</td>
                                    <td>----</td>
                                    <td>$ ----</td>
                                </tr>
                                <tr class="table-warning">
                                    <th scope="row">[placeholder]</th>
                                    <td>[placeholder]</td>
                                    <td>[placeholder]</td>
                                    <td>----</td>
                                    <td>$ ----</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- ./table -->
                </div>
                <div class="card-footer text-center">
                    <?= Html::a('[placeholder]', [''], ['class' => 'card-link']); ?>
                </div> <!-- ./card footer -->
            </div>
            <!-- ./card -->
        </div> <!-- ./col -->
    </div>
    <!-- ./table -->

    <!-- Administrative details -->
    <div class="row">
        <div class="col-12 col-md-7">
            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">[placeholder]</h5>
                    <div class="card-tools">
                        <div class="btn-group">
                            <button type="button" class="btn bg-transparent dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span class="d-none d-md-inline">[placeholder]</span>
                            </button> <!-- ./button -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <div class="dropdown-header">
                                    Gráficas estádisticas disponibles
                                </div> <!-- ./dropdown header -->

                                <div class="dropdown-divider"></div>
                                
                                <div class="dropdown-body">
                                    <!-- List group -->
                                    <div class="list-group list-group-flush">
                                        <button type="button" class="list-group-item list-group-item-action">
                                            <i class="fas fa-chart-line mr-3"></i>
                                            Gráfica de líneas
                                        </button> <!-- .button -->
                                        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                                            <i class="fas fa-chart-bar mr-3"></i>
                                            Gráfica de barras
                                        </button> <!-- .button -->
                                        <button type="button" class="list-group-item list-group-item-action">
                                            <i class="fas fa-chart-pie mr-3"></i>
                                            Gráfica de pastel
                                        </button> <!-- .button -->
                                    </div>
                                    <!-- ./list group -->
                                </div> <!-- ./dropdown body -->
                            </div>
                        </div>
                    </div> <!-- ./card tools -->
                </div> <!-- ./card header -->
                <div class="card-body">
                    <?=
                    ChartJs::widget([
                        'type' => 'bar',
                        'options' => [
                            'height' => 140,
                            'width' => 400
                        ],
                        'data' => [
                            'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                            'datasets' => [
                                [
                                    'label' => "My First dataset",
                                    'data' => [65, 59, 90, 81, 56, 55, 40],
                                    'backgroundColor' => [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(255, 205, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(201, 203, 207, 1)'
                                    ],
                                    'borderColor' => [
                                        'rgb(255, 99, 132)',
                                        'rgb(255, 159, 64)',
                                        'rgb(255, 205, 86)',
                                        'rgb(75, 192, 192)',
                                        'rgb(54, 162, 235)',
                                        'rgb(153, 102, 255)',
                                        'rgb(201, 203, 207)'
                                    ]
                                ]
                            ]
                        ]
                    ]);
                    ?> <!-- ./chart -->
                </div> <!-- ./card body -->
            </div>
            <!-- ./card -->
        </div> <!-- ./col -->
        <div class="col-12 col-md-5">
            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">[placeholder]</h5>
                </div> <!-- ./card header -->
                <div class="card-body">
                    <!-- List group -->
                    <div class="list-group list-group-flush">
                        <button type="button" class="d-inline list-group-item list-group-item-action p-1">
                            <!-- Container fluid -->
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <p class="h6 text-truncate">[placeholder]</p>
                                        <p class="text-truncate text-muted small">[placeholder]</p>
                                    </div> <!-- .col -->
                                    <div class="col-6">
                                        <p class="h6 text-truncate">[placeholder]</p>
                                        <p class="h6 text-truncate">[placeholder]</p>
                                    </div> <!-- .col -->
                                    <div class="col-2">
                                        <p class="text-truncate small text-blue">[placeholder]</p>
                                    </div> <!-- .col -->
                                </div>
                            </div>
                            <!-- ./container fluid -->
                        </button> <!-- .list group item -->
                    </div>
                    <!-- ./list group -->
                </div> <!-- ./card body -->
                <div class="card-footer text-center">
                    <?= Html::a('[placeholder]', [''], ['class' => 'card-link']); ?>
                </div> <!-- ./card footer -->
            </div>
            <!-- ./card -->
        </div> <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-12 col-md-7">
            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">[placeholder]</h5>
                    <div class="card-tools">
                        <div class="btn-group">
                            <button type="button" class="btn bg-transparent dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span class="d-none d-md-inline">[placeholder]</span>
                            </button> <!-- ./button -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <div class="dropdown-header">
                                    Gráficas estádisticas disponibles
                                </div> <!-- ./dropdown header -->

                                <div class="dropdown-divider"></div>
                                
                                <div class="dropdown-body">
                                    <!-- List group -->
                                    <div class="list-group list-group-flush">
                                        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                                            <i class="fas fa-chart-line mr-3"></i>
                                            Gráfica de líneas
                                        </button> <!-- .button -->
                                        <button type="button" class="list-group-item list-group-item-action">
                                            <i class="fas fa-chart-bar mr-3"></i>
                                            Gráfica de barras
                                        </button> <!-- .button -->
                                        <button type="button" class="list-group-item list-group-item-action">
                                            <i class="fas fa-chart-pie mr-3"></i>
                                            Gráfica de pastel
                                        </button> <!-- .button -->
                                    </div>
                                    <!-- ./list group -->
                                </div> <!-- ./dropdown body -->
                            </div>
                        </div>
                    </div> <!-- ./card tools -->
                </div> <!-- ./card header -->
                <div class="card-body">
                    <?=
                    ChartJs::widget([
                        'type' => 'line',
                        'options' => [
                            'height' => 140,
                            'width' => 400
                        ],
                        'data' => [
                            'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                            'datasets' => [
                                [
                                    'label' => 'My First Dataset',
                                    'data' => [65, 59, 80, 81, 56, 55, 40],
                                    'fill' => false,
                                    'borderColor' => 'rgb(75, 192, 192)',
                                    'tension' => 0.1
                                ]
                            ]
                        ]
                    ]);
                    ?> <!-- ./chart -->
                </div> <!-- ./card body -->
            </div>
            <!-- ./card -->
        </div> <!-- ./col -->
        <div class="col-12 col-md-5">
            <!-- Card -->
            <div class="card">
                <div class="card-header border-0">
                    <h5 class="card-title">[placeholder]</h5>
                </div> <!-- ./card header -->
                <div class="card-body">
                    <!-- List group -->
                    <div class="list-group list-group-flush">
                        <button type="button" class="d-inline list-group-item list-group-item-action rounded shadow-sm p-1">
                            <!-- Container fluid -->
                            <div class="media">
                                <img src="<?= Yii::$app->request->hostInfo . '/images/about-website/provisional-product-image.png'; ?>" class="img-size-50 mr-2" alt="[placeholder]">
                                <div class="media-body">
                                    <p class="h6">
                                        [placeholder]
                                        <span class="float-right text-sm text-muted"><i class="fas fa-exclamation"></i></span>
                                    </p>
                                    <p class="text-sm">[placeholder]</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- ./container fluid -->
                        </button> <!-- .list group item -->
                    </div>
                    <!-- ./list group -->
                </div> <!-- ./card body -->
                <div class="card-footer text-center">
                    <?= Html::a('[placeholder]', [''], ['class' => 'card-link']); ?>
                </div> <!-- ./card footer -->
            </div>
            <!-- ./card -->
        </div> <!-- ./col -->
    </div>
    <!-- ./administrative details -->
</div>