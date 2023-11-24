@extends('layouts.user.default')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0"><img src="{{ asset('/asset/img/form-icon.jpg') }}" width="40" style="border-radius: 100px;"> Pending Transaction</h1>
         </div>
            <div class="col-sm-6">
              <!--  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                  <li class="breadcrumb-item active" style="color: white;">Dashboard</li>
               </ol> -->
            </div>
         </div>
      </div>
   @include('layouts.partials.messages')
      <div class="row card p-5" style="background-color: white;">
      
            <div class="col-md-12">
               <div class="card-header">
                     <section class="content">
            <div class="container-fluid">
               <div class="card card-info">
                  <ol class="breadcrumb float-sm-right">
                     <div class="col-sm-12 col-md-10">
                        <div class="dataTables_length" id="example1_length">
                           <label>Show entries
                            <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                              <option value="10">10</option>
                              <option value="25">25</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                           </select> 
                        </label>
                        </div>
                     </div>
                  <div id="example1_filter" class="dataTables_filter">
                     <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                     </label>
                  </div>
               </ol>
                  <br>
                  <div class="col-md-12">
                     <div class="table-responsive">
                        
                     <table id="example1" class="table table-hover" style="text-align: center">
                        <thead>
                           <tr>
                              <th>Transaction Code</th>
                              <th>From</th>
                              <th>Full Name</th>
                              <th>Contact Number</th>
                              <th>Email Address</th>
                              <th>Address</th>
                              <th>Title</th>
                              <th>Purpose</th>
                              <th>Short Description</th>
                              <th colspan="2">Action</th>
                              <th><button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-modal-approve" disabled>Approve</button></th>
                           </tr>

                        </thead>
                        <tbody>
                          @foreach($transactions as $transaction)
                          <tr class="table-row">
                              <td>{{$transaction->transaction_code}}</td>
                              <td>{{ $transaction->department }}</td>
                              <td>{{$transaction->fullname}}</td>
                              <td>{{$transaction->contact_number}}</td>
                              <td>{{$transaction->email_address}}</td>
                              <td>{{$transaction->address}}</td>
                              <td>{{$transaction->title}}</td>
                              <td>{{$transaction->purpose}}</td>
                              <td>{{$transaction->short_description}}</td>
                              <td><a href="{{ url('user/transactionLogs/').'/'.$transaction->t_id }}"><button class="btn btn-sm btn-primary">View</button></a></td>
                              <td>
                                 <button class="btn btn-sm btn-danger btn-reject" sid="{{ $transaction->t_id }}" from-id="{{ Auth::id() }}" creator-id="{{ $transaction->from_id }}">Reject</button>
                              </td>
                              <td style="text-align: center"><input type="checkbox" name="" class="form-check-control approve-checbox" sid='{{ $transaction->t_id }}'></td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  
                     </div>
                  </div>
               </div>
            </div>
            
         </section>
               </center>
            </div>
       
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Select Destination</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <select name="" class="form-control" id="transaction-destination">
            @foreach ($users as $user)
               <option value="{{ $user->id }}" des-name="{{ $user->name }}" des-pos="{{ $user->position }}" des-dept="{{ $user->department }}">{{ $user->name }} | {{ $user->position }} | {{ $user->department }}</option>
            @endforeach
         </select>
         <label for="" class="mt-2">Optional: </label>
         <input type="text" class="form-control" placeholder="Enter name of receiver (if employee is not around)" id="receiver-name">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="btn-approve">Save changes</button>
       </div>
     </div>
   </div>
 </div>

 <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Reject Transaction</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <input type="text" id="transaction-id" class="form-control" style="display: none">
         <input type="text" id="from-id" class="form-control" style="display: none">
         <input type="text" id="creator-id" class="form-control" style="display: none">
         <input type="text" name="" placeholder="Reason for rejection" id="reject-reason" class="form-control">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="button" class="btn btn-danger" id="btn-reject">Reject</button>
       </div>
     </div>
   </div>
 </div>
<script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

   $('.btn-reject').click(function (e) { 
      e.preventDefault();

      let id = $(this).attr('sid');
      let from_id = $(this).attr('from-id');
      let creator_id = $(this).attr('creator-id');

      $('#rejectModal').modal('toggle');

      $('#transaction-id').val(id);
      $('#from-id').val(from_id);
      $('#creator-id').val(creator_id);
     
   });

   $('#btn-reject').click(function (e) { 
      e.preventDefault();

      let transaction_id = $('#transaction-id').val();
      let from_id = $('#from-id').val();
      let reason = $('#reject-reason').val();
      let creator_id = $('#creator-id').val();
      

      Swal.fire({
      title: "Reject?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, reject it!"
      }).then((result) => {
      if (result.isConfirmed) {
         $.ajax({
            type: "POST",
            url: '{{ route('user.reject.transaction') }}',
            data: {
               'transaction_id': transaction_id,
               'from_id': from_id,
               '_token': "{{ csrf_token() }}",
               'reason': reason,
               'creator_id': creator_id
            },
            dataType: "json",
            success: function (response) {
              
            }
         });
      }
      });

      $('#rejectModal').modal('toggle');
   });


   $('input[type=checkbox]').click(function (e) { 
      
      if ($(this).is(":checked")) {
            $("#btn-modal-approve").removeAttr("disabled");
        } else {
            $("#btn-modal-approve").attr("disabled", "disabled");
        }
   });

   
   $('#btn-approve').click(function (e) { 
      e.preventDefault();

      

      $('input[type=checkbox]:checked').each(function () {
         let sid = $(this).attr('sid');
         let el = this;
         let toDestination = $('#transaction-destination').val();
         let toName = $('option:selected', '#transaction-destination').attr('des-name');
         let toPosition = $('option:selected', '#transaction-destination').attr('des-pos');
         let toDepartment = $('option:selected', '#transaction-destination').attr('des-dept');
         let receiver = $('#receiver-name').val();
         
         
         $.ajax({
         type: "POST",
         url: "{{ route('user.approveTransaction') }}",
         data: {
            'id': sid,
            '_token': "{{ csrf_token() }}",
            'to_destination': toDestination,
            'to_name': toName,
            'to_position': toPosition,
            'to_department': toDepartment,
            'receiver': receiver
         },
         success: function (response) {
            if(response.status_code == 1){
               $(el).closest('.table-row').fadeOut(300,function(){
                  $(this).remove()
               })
            }
         }
         });
      });
      
      
      $('#exampleModal').modal('toggle');
      
   });
</script>
      
@endsection

