@extends('layouts.seller')

@section('content')
<link href="{{ asset('css/register-software.css') }}" rel="stylesheet">

<div class="right_col booking" role="main">
    <h2>Register Software</h2>
    <br>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{route('software.register.post')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="software-name"><h5>Name</h5></label>
        <div class="input-group mb-3">
        <input type="text" name="name" class="form-control" placeholder="Software Name" aria-label="Software Name" aria-describedby="basic-addon1">
        </div>

        <label for="software-type"><h5>Type</h5></label>
        <div class="input-group mb-3">
        <select class="custom-select" name="type">
            <option selected value="1">Desktop</option>
            <option value="2">Website</option>
            <option value="3">Mobil</option>
        </select>
        </div>

        <label for="software-description"><h5>Description</h5></label>
        <div class="input-group mb-3">
        <textarea name="description" class="form-control" aria-label="With textarea"></textarea>
        </div>

        <label for="software-price"><h5>Price</h5></label>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">$</span>
        </div>
        <input name="price" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
        </div>

        <label for="picture-up"><h5>Picture Upload</h5></label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input id="picture-up" type="file" class="form-control" name="picture" accept="image/*">
                <label id="picture-label" for="picture-up" class="custom-file-label text-truncate">Choose file...</label>
            </div>
        </div>
        
        <label for="file-up"><h5>File Upload</h5></label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input id="file-up" type="file" class="form-control" name="file">
                <label id="file-label" for="file-up" class="custom-file-label text-truncate">Choose file...</label>
            </div>
        </div>

        <button class="btn btn-primary" id="register_btn">Register</button>
    </form>
</div>
@endsection

@section('scripts')
<script>

$('#file-up').on('change', function() {
   let fileName = $(this).val().split('\\').pop(); 
   $(this).next('#file-label').addClass("selected").html(fileName); 
});

</script>
@endsection