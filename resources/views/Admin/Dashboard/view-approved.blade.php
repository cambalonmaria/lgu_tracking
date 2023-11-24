@extends('layouts.default')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row">
            <a href="admin/dashboard"><button class="btn btn-primary btn-sm">Go Back</button></a>
        </div>
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Approved Request</h1>
            </div>
            <div class="col-sm-6">
              <!--  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#" >Home</a></li>
                  <li class="breadcrumb-item active" >Dashboard</li>
               </ol> -->
            </div>
         </div>
         <section class="content">
            <div class="row card p-5 m-4" style="background-color: white;">
                <div class="row-col-6">
                    <div class="table-responsive" style="height: 460px;">
                       <table class="table">
                            @foreach ($approved as $approved)
                              <tr>
                                 <th>Transaction Code: {{ $approved->transaction_code }}</th>
                                 <th>Name: {{ $approved->fullname }}</th>
                                 <th>Title: {{ $approved->title }}</th>
                                 <th><a href="{{ url('admin/transactionLogs/').'/'.$approved->id }}"><button class="btn btn-primary">View</button></a></th>
                              </tr>
                            @endforeach
                       </table>
                    </div>
                </div>
              </div>  
         </section>
      </div>
</div>
      
@endsection
