@extends('layouts.seller')
@section('title', 'Software List')

@section('content')
<link href="{{ asset('css/published_software.css') }}" rel="stylesheet">
<div class="right_col booking" role="main">
<h2>Published Software</h2>
<br>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
<table class="table" id="listSoftware" data-ajaxurl="{{ route('seller.software.list.data') }}">
    <thead class="thead-custom-dark">
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Type</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/jquery-3.5.1.min.js') }}" type="text/javascript" defer></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css" defer>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js" defer></script>
<script src="{{asset('js/datatables/datatablesPlugin.js') }}" defer></script>
<script src="{{asset('js/seller/software_list.js') }}" defer></script>
@endsection