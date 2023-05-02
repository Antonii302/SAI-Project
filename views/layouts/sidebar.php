<?php 

use yii\helpers\Url;

?>

<aside class="main-sidebar sidebar-light-primary elevation-1">
    <!-- Brand Logo -->
    <a href="<?=  Url::home(); ?>" class="brand-link">
        <img src="<?= Yii::$app->request->hostInfo . '/images/about-website/alcaldía-san-miguel-logotipo.jpg'; ?>" class="brand-image" alt="Logotipo | Alcaldía de San Miguel"/>
        <span class="brand-text font-weight-light">Proyecto S.A.I</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::$app->request->hostInfo . '/images/user-account/perfil-usuario.jpg'; ?>" class="img-circle elevation-1" style="width: 38px; height: 38px; object-fit: cover; object-position: center;" alt="Perfil de usuario">
            </div>
            <div class="info">
                <a href="#" class="d-block">[placeholder]</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?=
            \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Panel de control',
                        'icon' => 'tachometer-alt',
                        'url' => ['/site/index']
                    ],
                    [
                        
                        'label' => 'Actividad del depósito',
                        'icon' => 'dolly-flatbed',
                        'items' => [
                            [
                                'label' => 'Administración de inventario preliminar',
                                'iconStyle' => 'far',
                                'icon' => 'dot-circle',
                                'url' => ['/warehouse-activity/preliminary-inventory/index']
                            ],
                            [
                                'header' => true,
                                'label' => 'Detalles del producto',
                                'icon' => 'dolly-flatbed'
                            ],
                            [
                                'label' => 'Administración de categorías',
                                'iconStyle' => 'far',
                                'icon' => 'dot-circle'
                            ],
                            [
                                'label' => 'Administración de unidades de medida',
                                'iconStyle' => 'far',
                                'icon' => 'dot-circle'
                            ]
                        ]
                    ],
                    [
                        
                        'label' => 'Procesos generales',
                        'icon' => 'cogs',
                        'items' => [
                            [
                                'label' => 'Administración de divisiones departamentales',
                                'iconStyle' => 'far',
                                'icon' => 'dot-circle'
                            ],
                            [
                                'label' => 'Administración de presupuestos de inventario anual',
                                'iconStyle' => 'far',
                                'icon' => 'dot-circle'
                            ]
                        ]
                    ],
                    [
                        'label' => 'Permisos de acceso | Sistema de Inventario',
                        'icon' => 'user-lock',
                        'items' => [
                            [
                                'label' => 'Administración de usuarios',
                                'iconStyle' => 'far',
                                'icon' => 'dot-circle',
                                'url' => ['']
                            ]
                        ]
                    ],
                    [
                        'label' => 'Gii',
                        'icon' => 'bug',
                        'url' => ['/gii']
                    ]
                ]
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>