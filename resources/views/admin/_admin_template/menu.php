<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/dist/img/user2-160x160.jpg"
                             class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $_SESSION['admin']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/dist/img/user2-160x160.jpg"
                                 class="img-circle" alt="User Image">

                            <p>
                                Nghĩa Thân - Web Developer
                                <small>Member since Nov. 1993</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo BASE_PATH; ?>/admin/login/logout"
                                   class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="<?php echo BASE_PATH; ?>/admin/login/logout"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>