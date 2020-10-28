@extends('layouts.seller')

@section('title', 'History Software')

@section('content')
<div class="right_col booking" role="main">
    <div class="container" style="padding-top:100px">
        <div class="col-md-12 col-sm-12">
            <h2 class="table-title">History Software</h2>
            <table id="historySoftware" class="table table-bordered table-striped table-bordered table-hover dataTable"
                data-ajaxurl="{{ route('history.data') }}">
                <thead class="thead-custom-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Type</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Review</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/jquery-3.5.1.min.js') }}" type="text/javascript" defer></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css" defer>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js" defer></script>
<script src="{{asset('js/datatables/datatablesPlugin.js') }}" defer></script>
<script src="{{asset('js/seller/history_software.js') }}" defer></script>
@endsection