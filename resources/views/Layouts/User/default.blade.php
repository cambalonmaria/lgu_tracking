<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Document-Tracking-System</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('/asset/fontawesome/css/all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/asset/css/adminlte.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/asset/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('/asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('/asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
   <style type="text/css">

      td a.btn{
         font-size: 0.7rem;
      }
      th{
         padding: 0.5rem !important;
      }
      table tr td {
         padding: 0.3rem !important;
      }
   </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-light" style="background-color: #cc0066;">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: white;"></i></a>
               </li>

               <li class="nav-item">
                  <h5 class="fw-bold">{{ Str::title(Auth::user()->name) }}</h5>
               </li>
         </ul>
         <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="#" role="button">
                     <img src="{{ asset('/asset/img/admin-icon.jpg') }}" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
                  </a>
               </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt" style="color: white;"></i>
               </a>
            </li> 
         </nav>
      <aside class="main-sidebar sidebar-light-primary" style="background-color: black;">
            <!-- Brand Logo -->
         <a href="/" class="brand-link">
         <img src="{{ asset('/asset/img/logo-bontoc.png') }}" alt="DSMS Logo" width="200">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                     <li class="nav-item">
                        <a href="{{ route('user.dashboard') }}" class="nav-link">
                           <img src="{{ asset('/asset/img/dashboard-icon.jpg') }}" width="30" style="border-radius: 100px;">
                           <p style="color: white;">
                              Dashboard
                           </p>
                        </a>
                     </li>
                 
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="{{ asset('/asset/img/trans.jpg') }}" width="30" style="border-radius: 50px;">
                        <p style="color: white;">
                           Transactions
                        </p>
                        <i class="right fas fa-angle-left" style="color: white;"></i>
                     </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                        <a href="{{ route('user.new.transaction') }}" class="nav-link">
                           <i class="nav-icon far fa-circle" style="color: white;"></i>
                           <p style="color: white;"> New </p>
                        </a>
                     </li>
                  </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route('pending.user') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;">Pending </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('approved.user') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;">Approved</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('user.rejected.transactions') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;">Rejected</p>
                     </a>
                  </li>
               </ul>
                  </li>
                <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="{{ asset('/asset/img/user-icon.jpg') }}" width="30" style="border-radius: 50px;">
                        <p style="color: white;">
                          Logs
                        </p>
                        <i class="right fas fa-angle-left" style="color: white;"></i>
                     </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route('user.log.document') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;"> Document Logs</p>
                     </a>
                  </li>
               </ul>
                  </li>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="{{ asset('/asset/img/admin-icon.jpg') }}" width="30" style="border-radius: 50px;">
                        <p style="color: white;">
                           Account
                        </p>
                        <i class="right fas fa-angle-left" style="color: white;"></i>
                     </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route ('user.logout.perform')}}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;"> Logout</p>
                     </a>
                  </li>
      </aside>
      <div class="content-wrapper" style="background-color:teal;">
         @yield('content')
      </div>
   </div>
   <!-- jQuery -->
   <script src="{{ asset('/asset/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('/asset/js/adminlte.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>