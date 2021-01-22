<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Expense Tracker</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('resources/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('resources/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Datetimepicker -->
    <link rel="stylesheet" href="<?php echo base_url('resources/css/bootstrap-datetimepicker.min.css');?>">
     <!-- Nepali Datepicker CSS -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/nepali.datepicker.v3.1.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('resources/css/AdminLTE.min.css');?>">


    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('resources/css/_all-skins.min.css');?>">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 



</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->	
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">Expense Tracker</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Expense Tracker </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

                <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                                


                                <li class="dropdown user user-menu">
                                <a href="<?php echo base_url()?>login/logout" class="btn-danger"><i class="fa fa-sign-out"></i>Sign out</a>

                            </li>
                             <li lass="dropdown user user-menu" style="background:#3C8DBC">
                       
                        <ul class="dropdown-menu" style="width:700px">
                            <li class="">
                               
                            </li>
                        </ul>
                    </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url('images/userimages/avatar.png');?>" class="img-circle" alt="User Image">
			   </div>
                <div class="pull-left info">
                 <span class="font-weight-bold mb-2"><?php echo $users['FullName']; ?></span>
				
				</div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li>
                    <a href="<?php echo site_url('welcome');?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
            
             
                    <li>
                    <a href="#">
                        <i class="fa fa-money"></i> <span>Expense</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo site_url('expense/add');?>"><i class="fa fa-plus"></i> Add</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('expense/index');?>"><i class="fa fa-list-ul"></i> List</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('expense/datewisereport');?>"><i class="fa fa-list-ul"></i> Date Wise Report</a>
                        </li>
                        
                    </ul>
                </li>

                    <li>
                    <a href="#">
                        <i class="fa fa-money"></i> <span>Income</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo site_url('income/add');?>"><i class="fa fa-plus"></i> Add</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('income/index');?>"><i class="fa fa-list-ul"></i> List</a>
                        </li>
                    </ul>
                </li>
               
				<!--<li>
                    <a href="#">
                        <i class="fa fa-desktop"></i> <span>My Setting</span>
                    </a>
                    <ul class="treeview-menu">
					  <li  class="active">
                            <a href="<?php echo site_url('welcome/userprofile');?>"><i class="fa fa-list-ul"></i>User Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('welcome/changeprofile');?>"><i class="fa fa-list-ul"></i>Change Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('welcome/changepassword');?>"><i class="fa fa-list-ul"></i> Change Password</a>
                        </li>
                    </ul>
					
                </li>-->
				
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <?php
            if(isset($_view) && $_view)
                $this->load->view($_view);
            ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->

        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url('resources/js/demo.js');?>"></script>
<!-- DatePicker -->
<script src="<?php echo site_url('resources/js/moment.js');?>"></script>
<script src="<?php echo site_url('resources/js/nepali.datepicker.v3.1.min.js');?>"> </script>

<script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
<script src="<?php echo site_url('resources/js/global.js');?>"></script>


 <!--Data Table-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#export').DataTable( {
                        dom: 'Bfrtip',
                        /*buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]*/
                        buttons: [
                            'excel','pdf'
                        ]
                    } );
                } );
                </script> 

</body>
</html>
