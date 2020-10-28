@extends('layouts.customer')

@section('title', 'Checkout Software')

@section('extra-header')
    <link href="{{ asset('css/checkout_software.css') }}" rel="stylesheet">
@endsection

@section('content')
<section>
    <div class="container" style="height: 80px;"></div>
    <div class="container mt-2">
        <div class="row">
            <h1>Checkout Software {{$software_buyer->software()->name}}</h1>
        </div>
        <div class="container" style="height: 50px;"></div>
        <div class="row">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{route('checkout', ['id' => $software_buyer->software()->id])}}" method="post" enctype='multipart/form-data'>
                @csrf
                <p class="price"><b>Price : $ {{$software_buyer->software()->price}}</b></p>
                @if ($software_buyer->software()->price > 0)
                    <label for="proof_of_payment" class="proof_of_payment">Proof Of Payment : </label>
                    <input type="file" name="proof_of_payment" id="proof_of_payment">
                @endif
                <input type="submit" value="Checkout" class="btn btn-brown">
            </form>
        </div>
        <div class="container" style="height: 200px;"></div>
    </div>
</section>
@endsection

@section('scripts')
@endsection