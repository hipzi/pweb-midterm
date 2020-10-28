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
                <p class="publisher">Rating : {{$software->rating()[0] . " From " . $software->rating()[1] . " Users"}}</p>
                <p class="publisher">Publisher : {{$software->maker()->username}}</p>
                @if (!Auth::check())
                    <a href="{{route('login')}}" class="btn btn-brown">Login First</a>
                @elseif(!Auth::user()->softwareBuyer($software->id))
                    <a href="{{route('software-checkout', ['id' => $software->id])}}" class="btn btn-brown">Buy</a>
                @elseif(Auth::user()->softwareBuyer($software->id)->status()->status == "bought")
                    <a href="#" class="btn btn-brown">Download</a>
                    @if (Auth::user()->softwareBuyer($software->id)->rating == 0)
                        <a href="#" class="btn btn-brown" style="margin-top: 10px;">Rate</a>
                    @endif
                @else
                    <a href="{{route('software-checkout', ['id' => $software->id])}}" class="btn btn-brown">Pending</a>
                @endif
            </div>
        </div>
        <div class="row">
            <h2>Reviews</h2>
            <ul>
                @foreach ($software->software_buyers() as $sb)
                    <li>{{$sb->user()->username . " : " . $sb->review}}</li>
                @endforeach
            </ul>
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
