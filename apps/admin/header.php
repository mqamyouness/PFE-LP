<?php
    include("../../.database.php");
    try {
        session_start();
        if($_SESSION["admin_SESSION"] == null)
        {
            header("Location: login.php");
            exit();
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Projet de stage">
    <meta name="author" content="MQAM YOUNESS">
    <link href="img/logo.jpg" rel="icon">
    <title>ادارة مجموعة مدارس الحكيم</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        *{
            font-size : 18px;
            text-align: right !important;
        }
        .left-text{
            text-align: left !important;
        }
        .modal-xl{
            margin-left :10px !important;
        }
    </style>
    <script src="vendor/jquery/jquery.min.js"></script>
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                   <img src="img/logo.jpg" style="width :50px ;height : 50px;">
                </div>
                <div class="sidebar-brand-text mx-3">Groupe AlHakim</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>الصفحة الرئيسية</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
               <h5>النظام الداخلي</h5>
            </div>
            <li class="nav-item" id="drow1">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>إعدادات</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h5 class="collapse-header">:  قائمة</h5>
                        <a class="collapse-item" href="niveau.php" id="niveauPage">المستويات</a>
                        <a class="collapse-item" href="classe.php" id="classePage">الاقسام</a>
                        <a class="collapse-item" href="groupe.php" id="groupePage">الافواج</a>
                        <a class="collapse-item" href="absence.php" id="absencePage">لائحة الغياب</a>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#modal_transport">نقل</a>
                    </div>
                </div>
            </li>   
            <li class="nav-item" id="studentPage">
                <a class="nav-link" href="student.php" >
                    <i class="fas fa-envelope fa-users"></i>
                    <span>التلاميذ</span>
                <a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item" id="drow2">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>حسابات</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="inscriptionPage" href="inscription.php">التسجيل</a>
                        <a class="collapse-item" id="paiementPage" href="paiement.php">الأداء الشهري</a>
                        <a class="collapse-item" id="recuperationPage" href="menuRecuperation.php">وصل التسجيل/الأداء</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                <h5>إعدادات صفحة الزائر</h5>
            </div>
            <li class="nav-item" id="listInscriptionsPage">
                <a class="nav-link" href="listInscriptions.php">
                    <i class="fas fa-edit" ></i>
                    <span>التسجيلات</span></a>
            </li>
            <li class="nav-item" id="galeriePage">
                <a class="nav-link" href="galerie.php" >
                    <i class="fa fa-camera"></i>
                    <span>صور المؤسسة</span>
                </a>
            </li>
            <li class="nav-item" id="activityPage">
                <a class="nav-link" href="activity.php" >
                    <i class="fas fa-fw fa-table"></i>
                    <span>النشاطات</span>
                </a>
            </li>
            <li class="nav-item" id="adsPage">
                <a class="nav-link" href="ads.php" >
                    <i class="fas fa-fw fa-table"></i>
                    <span>الإعلانات</span></a>
            </li>
            <li class="nav-item" id="drow3">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>إعدادات الثانوية</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="calls.php" id="callsPage">طلب مكالمة</a>
                        <a class="collapse-item" href="newsletter.php" id="newsletterPage">مشتركون النشرة الإخبارية</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline" >
                <button class="rounded-circle border-0" id="sidebarToggle" style="text-align: center !important;"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->