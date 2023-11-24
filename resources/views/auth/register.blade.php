@extends('layouts.auth')

@section('content')
<div class="card col-sm-12">
    <form method="post" id="form-register">
  
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>
       
        <div class="form-group form-floating mb-3">
            <select name="department" id="" class="form-control mb-3">
                <option value="Sangguniang Bayan Office">Sangguniang Bayan Office</option>
                <option value="Municipal Planning & Development Office">Municipal Planning & Development Office</option>
                <option value="Municipal Local Civil Registrar">Municipal Local Civil Registrar</option>
                <option value="Municipal Budget Office">Municipal Budget Office</option>
                <option value="Municipal Accounting Office">Municipal Accounting Office</option>
                <option value="Municipal Treasurer Office">Municipal Treasurer Office</option>
                <option value="Municipal Assessor's Office">Municipal Assessor's Office</option>
                <option value="Municipal Health Office">Municipal Health Office</option>
                <option value="Municipal Social Welfare & Development Office">Municipal Social Welfare & Development Office</option>
                <option value="Municipal Agriculture Office">Municipal Agriculture Office</option>
                <option value="Municipal Engineering Office">Municipal Engineering Office</option>
            </select>
            <label for="floatingEmail">Department</label>
        </div>
        

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="position" placeholder="HR" required="required" autofocus>
            <label for="floatingEmail">Position</label>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('username') }}" placeholder="Name" required="required" autofocus>
            <label for="floatingName">Name</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" id="confirm-password"  placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            <span style="color:tomato; display:none" id="error-pass">Password does not match</span>
        </div>
        <span id="response"></span>

        <button class="w-100 btn btn-lg btn-primary" type="button" id="btn-register">Register</button>
        
        @include('auth.partials.copy')

    </form>
</div>
<script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

   $('#btn-register').click(function (e) { 
    e.preventDefault();

    let confirm_pass = $('#confirm-password').val();
    let password = $('#password').val();

    if(confirm_pass != password){
        return $('#error-pass').css('display', 'block');
    }else{
        $('#error-pass').css('display', 'none');
    }

    if($('#form-register input').val() == ""){
        return $('#reponse').text('Missing Fields');
    }

    $.ajax({
        type: "POST",
        url: '/registerUser',
        data: $("#form-register").serialize(),
        dataType: "json",
        success: function (response) {
            if(response.status_code == 1){
                $('#response').text('Success');
                $('#response').css('color', 'light-green');
                location.href = "/login";
            }
            else{
                $('#response').text('Error, There was an error during the process');
                $('#response').css('color', 'tomato');
            }
        }
    });
    
   });
</script>
@endsection
