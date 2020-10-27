@extends('layouts.customer')

@section('title', 'Buy Software')

@section('extra-header')
    <link href="{{ asset('css/buy_software.css') }}" rel="stylesheet">
@endsection

@section('content')
<section>
    <div class="container" style="height: 80px;"></div>
    <div class="container mt-2">
        <div class="row">
            <h1>{{ucfirst($type)}} Software</h1>
        </div>
        <div class="container" style="height: 50px;"></div>
        <div class="row">
            @foreach ($softwares as $software)
                <div class="col-4 card-margin">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{$software->picture}}" height="200px" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$software->name}}</h5>
                                <p class="card-text">{{$software->description}}</p>
                                <p class="card-text"><b>Price : {{($software->price > 0)?$software->price : "Free"}}</b></p>
                                <a href="{{route('software-detail', ['id' => $software->id])}}" class="btn detail-button">Detail</a>
                            </div>
                    </div>
                </div>
            @endforeach
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