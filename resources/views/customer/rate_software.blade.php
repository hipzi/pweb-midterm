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
            <h1 class="title">Rate {{$software->name}}</h1>
        </div>
        <div class="container" style="height: 50px;"></div>
        <div class="row">
            <p class="publisher">Publisher : {{$software->maker()->username}}</p>
            @if (!Auth::check())
                <a href="{{route('login')}}" class="btn btn-brown">Login First</a>
            @elseif(!Auth::user()->softwareBuyer($software->id))
                <div class="container">
                    <h3>You need to buy before you rate this product</h3>
                </div>
            @elseif(Auth::user()->softwareBuyer($software->id)->status()->status == "bought")
                @if (Auth::user()->softwareBuyer($software->id)->rating == 0)
                    <div class="container">
                        <form action="{{route('rate-product', ['id' => $software->id])}}" method="POST">
                            @csrf

                            <label for="software-rate"><h5>Rate</h5></label>
                            <div class="input-group mb-3">
                            <select class="custom-select" name="rating">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            </div>

                            <div class="input-group mb-0">
                                <label for="software-review"><h5>Review</h5></label>
                                </div>
                                <div class="input-group mb-3">
                                <textarea name="review" class="form-control" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                        <button class="btn btn-brown" style="margin-top: 10px;">Rate</button>
                        </form>
                    </div>
                @else
                    <div class="container">
                        <h3>You have rated this product</h3>
                    </div>
                @endif
            @else
                <a href="{{route('software-checkout', ['id' => $software->id])}}" class="btn btn-brown">Pending</a>
            @endif
        </div>
    </div>
</section>
@endsection