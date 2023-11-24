@extends('layouts.default')
@section('content')
<style>
    .search-container {
        text-align: center;
        margin-top: 0px;
    }

    .search-box {
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 800px;
        margin-top: 100px;
        font-size: 20px;
    }

    .search-button {
        padding: 35px 60px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>


<div class="search-container">
    
    <input type="text" placeholder="Enter Transaction Code" name="search" id="search" class="search-box">
    <button type="button" id="btn-click" class="search-button">Search</button>
    
</div>

<div id="search-result" class="mt-4 m-4">
    
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $('#btn-click').click(function (e) { 
        e.preventDefault();
        let search_value = $('#search').val();
        
        $.ajax({
            type: "POST",
            url: "{{ route('admin.search.transaction') }}",
            data: {
                'search_value': search_value,
                '_token': "{{ csrf_token() }}"
            },
            success: function (response) {
                $('#search-result').html(response);
            }
        });
    });
</script>
      
@endsection
