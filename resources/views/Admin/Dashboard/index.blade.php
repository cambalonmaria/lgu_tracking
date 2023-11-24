 @extends('layouts.default')

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
                     <div class="info-box">
                        <span class="info-box-icon text-success"><img src="../asset/img/files-icon.jpg" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Number of Users</h5>
                           </span>
                           <span class="info-box-number" >
                              @if($nOusers=App\Models\User::count())
                                 <h2>{{$nOusers}}</h2>
                              @endif
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box d-flex align-items-center">
                        <span class="info-box-icon text-info"><img src="../asset/img/files-icon.jpg" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Number of Transaction</h5>
                           </span>
                           <span class="info-box-number">
                              @if($nOtransaction=App\Models\Transaction::where('status', 'pending')->count())
                                 <h2>{{$nOtransaction}}</h2>
                              @else 
                                 <h2>0</h2>
                              @endif
                           </span>
                        </div>
                        <a href="{{ route('admin.view.pending') }}"><button class="btn btn-primary">View</button></a>
                     </div>
                  </div>
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box d-flex align-items-center">
                        <span class="info-box-icon text-info"><img src="../asset/img/files-icon.jpg" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Approved Transactions</h5>
                           </span>
                           <span class="info-box-number">
                              @if($count_approved->count)
                                 <h2>{{$count_approved->count}}</h2>
                              @else 
                                 <h2>0</h2>
                              @endif
                           
                           </span>
                        </div>
                        <div class="d-flex">
                           <a class="nav-link" href="#" role="button" data-toggle="popover" 
                           data-content="
                           <div class='table-responsive' style='height: 150px; width: 300px'>
                           <table class='table'>
                           @foreach ($approved as $approved)
                           
                              <tr>
                                    <td><a href='{{ url('admin/transactionLogs/').'/'.$approved->id }}'>{{ $approved->name }} approved Transaction: {{ $approved->transaction_code }}</a></td>
                              </tr>
                           
                           @endforeach
                           </table>
                           </div>
                           "
                           data-html="true">
                           <i class="fa-solid fa-bell" id="bell-notif-approve" style="width:30px; height:30px;color:black" ></i>
                           </a>
                           <a href="{{ route('admin.view.approved') }}"><button class="btn btn-primary">View</button></a>
                       </div>
                        
                     </div>
                  </div>
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box d-flex align-items-center">
                        <span class="info-box-icon text-info"><img src="../asset/img/files-icon.jpg" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Number of Rejected Files</h5>
                           </span>
                           
                           <span class="info-box-number">
                              <h2>{{ $count_reject->count }}</h2>
                           
                           </span>
                        </div>
                          <div class="d-flex">
                              <a class="nav-link" href="#" role="button" data-toggle="popover" 
                              data-content="
                              <div class='table-responsive' style='height: 150px; width: 300px'>
                              <table class='table'>
                              @foreach ($transactions as $transaction)
                              
                                 <tr>
                                       <td><a href='{{ url('admin/transactionLogs/').'/'.$transaction->id }}'>{{ $transaction->name }} Rejected Transaction: {{ $transaction->transaction_code }}</a></td>
                                 </tr>
                              
                              @endforeach
                              </table>
                              </div>
                              "
                              data-html="true">
                              <i class="fa-solid fa-bell" id="bell-notif" style="width:30px; height:30px;color:black" ></i>
                              </a>
                              <a href="{{ route('admin.view.rejected') }}"><button class="btn btn-primary">View</button></a>
                          </div>
                     </div>
                  </div>

               </div>
            </div>
         </section>
      </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
   @if ($notif->isNotEmpty())
     $('#bell-notif').css('color', 'red');
  @endif

  @if($notif_approved->isNotEmpty())
      $('#bell-notif-approve').css('color', 'red');
  @endif

  $('#bell-notif-approve').click(function (e) { 
   e.preventDefault();
   $.ajax({
      type: "POST",
      url: "{{ route('admin.approved.notif') }}",
      data: {'_token': "{{ csrf_token() }}"},
      dataType: "json",
      success: function (response) {
         if(response.status_code == 1){
            $('#bell-notif-approve').css('color', 'black');
         }
      }
   });
   
  });

  $('#bell-notif').click(function (e) { 
   e.preventDefault();
   $.ajax({
      type: "POST",
      url: "{{ route('admin.rejected.notif') }}",
      data: {
         '_token': "{{ csrf_token() }}"
      },
      dataType: "json",
      success: function (response) {
         if(response.status_code == 1){
            $('#bell-notif').css('color', 'black');
         }
      }
   });
  });
</script>
@endsection
