<!-- Page-top for scroll to top Page-->
<body id="page-top">
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="../users/main">Atlas Web Service</a>
    <?php if(isset($_SESSION['AWSession'])) : ?>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
    </button>
    <?php endif; ?>
    <!-- Navbar Shift Right icons -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <?php if(isset($_SESSION['AWSession'])) : ?>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- Call login details to navbar-->
                <?php $this->userModel->GetLoginDetails($data);?>
                <label><?php Utils::LoginDetailonNavbar($data);?></label>
            </a>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../users/logindetails">Oturum Açma Detayları</a>
                    <!-- Dropdown Divider-->
                    <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../users/logout" >Güvenli Çıkış</a>
            </div>
        </li>
        <?php else : ?>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
            </a>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../users/login" >Kullanıcı Giriş</a>
            </div>
        </li>
        <?php endif; ?>
    </ul>
</nav>