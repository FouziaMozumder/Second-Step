<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "../assets/css/bootstrap.css"/>
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="../assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="../assets/css/main.min.css" rel="stylesheet" />
</head>

<?php if(isset($_SESSION['id'])) { ?>
<body class="fixed-navbar">
<div class="page-wrapper">
    <!-- START HEADER-->
    <header class="header">
        <div class="page-brand">
            <a class="link" href="index.html">
                    <span class="brand">Dashboard</span>
            </a>
        </div>
        <div class="flexbox flex-1">
            <!-- START TOP-LEFT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                    <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                </li>
                <li>
                    <form class="navbar-search" action="javascript">
                        <div class="rel">
                            <span class="search-icon"><i class="ti-search"></i></span>
                            <input class="form-control" placeholder="Search here...">
                        </div>
                    </form>
                </li>
            </ul>
            <nav class="navbar navbar-expand-md navbar-dark bg-red">
                <div class = "container">
                    <ul class = "navbar-nav ml-auto">
                        <li><a href = "user.php" class = "nav-link">Add User </a></li>
                        <li><a href = "actionUser.php?status=manageUser" class = "nav-link">Manage User</a></li>
                        <li><a href = "actionUser.php?status=logout" class = "nav-link">Logout</a></li>
                    </ul>
                </div>
            </nav>

            <?php } else { ?>
                <nav class="navbar navbar-expand-md navbar-dark bg-dark text-danger">
                    <div class = "container">


                    </div>
                </nav>
            <?php } ?>

        </div>
    </header>

<!-- CORE PLUGINS-->
<script src="../assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="../assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="../assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="../assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="../assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
</body>
</html>
