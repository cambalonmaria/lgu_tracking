@extends('layouts.user.default')

@section('content')
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="{{ asset('/asset/img/dashboard-icon.jpg') }}" width="40" style="border-radius: 100px;" style="color: white;"> Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <!--  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#" >Home</a></li>
                  <li class="breadcrumb-item active" >Dashboard</li>
               </ol> -->
            </div>
         </div>
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                  </div>
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box">
                        <span class="info-box-icon text-info"><img src="../asset/img/files-icon.jpg" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Number of Transaction</h5>
                           </span>
                           <span class="info-box-number">
                             <h2>{{ $pending }}</h2>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box">
                        <span class="info-box-icon text-info"><img src="../asset/img/files-icon.jpg" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Number of Approved Files</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>{{ $approved }}</h2>
                           
                           </span>
                        </div>
                     </div>
                  </div>

                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box">
                        <span class="info-box-icon text-info"><img src="../asset/img/files-icon.jpg" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Number of Rejected Files</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>{{ $rejected }}</h2>
                           
                           </span>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </section>
      </div>
</div>
      
@endsection
