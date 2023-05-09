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
                    ], // *menu item
                    [
                        
                        'label' => 'Actividad del depósito',
                        'icon' => 'dolly-flatbed',
                        'items' => [
                            [
                                'label' => 'Inventario',
                                'iconStyle' => 'fas',
                                'icon' => 'dot-circle',
                                'url' => ['']
                            ],
                            [
                                'header' => true,
                                'label' => 'Otros'
                            ],
                            [
                                'label' => 'Especificaciones generales',
                                'iconStyle' => 'fas',
                                'icon' => 'dot-circle',
                                'url' => ['/general-details/product/index']
                            ]
                        ]
                    ], // *menu item
                    [
                        'label' => 'Presupuesto de inventario anual',
                        'iconStyle' => 'fas',
                        'icon' => 'archive'
                    ], // *menu item
                    [
                        'label' => 'Permisos de acceso',
                        'icon' => 'user-lock',
                        'items' => [
                            [
                                'label' => 'Usuarios del sistema',
                                'iconStyle' => 'fas',
                                'icon' => 'dot-circle',
                                'url' => ['']
                            ]
                        ]
                    ], // *menu item
                    [
                        'label' => 'Gii',
                        'icon' => 'bug',
                        'url' => ['/gii']
                    ] // *menu item
                ]
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>