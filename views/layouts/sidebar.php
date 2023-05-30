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
        <!-- Sidebar user panel -->
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
                        'iconStyle' => 'fas',
                        'icon' => 'tachometer-alt',
                        'url' => ['/site/index']
                    ], // *menu item
                    ['header' => true, 'label' => 'Almacén'],
                    [
                        'label' => 'Detalle general',
                        'iconStyle' => 'fas',
                        'icon' => 'th',
                        'items' => [
                            ['label' => 'Inventario', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                            ['label' => 'Estimación de costes', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                            ['label' => 'Detalles del catálogo', 'iconStyle' => 'far', 'icon' => 'dot-circle', 'url' => ['/warehouse/product/']]
                        ]
                    ], // *menu item
                    [
                        'label' => 'Actividad principal',
                        'iconStyle' => 'fas',
                        'icon' => 'dolly-flatbed',
                        'items' => [
                            ['label' => '', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                        ]
                    ], // *menu item
                    ['header' => true, 'label' => 'Sistema'], // *menu item
                    [
                        'label' => 'Permisos de acceso',
                        'iconStyle' => 'fas',
                        'icon' => 'user-lock',
                        'items' => [
                            ['label' => 'Usuarios', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                        ]
                    ], // *menu item
                    ['label' => 'Gii', 'icon' => 'bug', 'target' => '_blank','url' => ['/gii']] // *menu item
                ]
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>