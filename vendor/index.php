<?php include_once "../admin/includes/header.php"; 

$mess=$_GET["mess"] ?? null;
?>
    <body class="sb-nav-fixed">
       <?php include_once "../admin/includes/top.php";?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
       <?php include_once "includes/side.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                   <?php include_once "../admin/includes/message.php"?>
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                      
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Newspapers</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="newspapers.php">View</a>
                                        <div class="small text-white fas fa-eye"><i class="fas fa-eye"></i></div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                        <div class="row">
                           
                        </div>
                       
                    </div>
                </main>
                <?php include_once "../admin/includes/footer.php"?>