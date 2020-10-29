@extends('layouts.seller')

@section('content')
<div class="right_col booking" role="main">
    <h2>Register Software</h2>
    <br>

    <label for="software-title"><h4>Software Name</h4></label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Software Name" aria-label="Software Name" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">@example.com</span>
    </div>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">$</span>
    </div>
    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
    <div class="input-group-append">
        <span class="input-group-text">.00</span>
    </div>
    </div>

    <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">With textarea</span>
    </div>
    <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>
</div>
@endsection