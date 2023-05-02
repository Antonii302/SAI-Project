<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('¿Quiénes somos?', ['/site/about'], ['class' => 'nav-link']); ?>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('Contáctanos', ['/site/contact'], ['class' => 'nav-link']); ?>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu fade dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <!-- User account and Software System Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle"></i>
                <span class="d-none d-sm-inline-block brand-text font-weight-light">Mi cuenta</span>
            </a>
            <!-- Dropdown menu -->
            <div class="dropdown-menu fade dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-header">
                    <!-- Card -->
                    <div class="card elevation-1">
                        <div class="card-body p-1">
                            <!-- List group -->
                            <div class="list-group list-group-flush">
                                <a type="button" class="list-group-item list-group-item-action rounded border-0 p-2">
                                    <div class="media">
                                        <img src="<?= Yii::$app->request->hostInfo . '/images/user-account/perfil-usuario.jpg'; ?>" class="profile-image img-circle mr-3" alt="[placeholder]">
                                        <div class="media-body">
                                            <p class="h6 text-left text-truncate text-muted">[placeholder]</p>
                                        </div>
                                    </div> <!-- ./media -->
                                </a> <!-- ./list group item -->
                                <?= 
                                Html::a('Administrar mi cuenta', [''], [
                                    'class' => 'list-group-item list-group-item-action text-left text-blue rounded p-2'
                                ]); 
                                ?> <!-- ./list group item -->
                            </div>
                            <!-- ./llist group -->
                        </div> <!-- ./card body -->
                    </div>
                    <!-- ./card -->
                </div>
                <div class="dropdown-footer text-left">
                    <!-- List group-->
                    <div class="list-group list-group-flush">
                        <button type="button" class="list-group-item list-group-item-action">
                            <i class="fas fa-server"></i>
                            Copias de seguridad
                        </button> <!-- ./lis group item -->
                        <button type="button" class="list-group-item list-group-item-action">
                            <i class="fas fa-sign-out-alt"></i>
                            Cerrar sesión
                        </button> <!-- ./lis group item -->
                    </div>
                    <!-- ./list group-->
                </div> <!-- ./dropdown footer -->
            </div>
            <!-- ./dropdown menu -->
        </li>
    </ul>
</nav>
<!-- /.navbar -->