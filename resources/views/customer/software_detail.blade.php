@extends('layouts.customer')

@section('title', $software->name)

@section('extra-header')
    <link href="{{ asset('css/software_detail.css') }}" rel="stylesheet">
@endsection

@section('content')
<section>
    <div class="container" style="height: 80px;"></div>
    <div class="container mt-2">
        <div class="row">
            <h1 class="title">{{$software->name}}</h1>
        </div>
        <div class="container" style="height: 50px;"></div>
        <div class="row">
            <div class="col-6">
                <img src="{{$software->picture}}" width="100%"/>
            </div>
            <div class="col-6">
                <p class="description">{{$software->description}}</p>
                <p class="price"><b>Price : {{$software->price}}</b></p>
                <p class="publisher">Publisher : {{$software->maker()->username}}</p>
                @if (!Auth::check())
                    <a href="{{route('login')}}" class="btn btn-brown">Login First</a>
                @elseif(!Auth::user()->checkSoftwareStatus($software->id))
                    <a href="#" class="btn btn-brown">Buy</a>
                @elseif(Auth::user()->checkSoftwareStatus($software->id)->status()->status == "bought")
                    <p class="bought">Bought</p>
                @else
                    <a href="#" class="btn btn-brown">Pending</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
$('#customerhnyCarousel').carousel({
    interval: 5000
});
</script>
@endsection
