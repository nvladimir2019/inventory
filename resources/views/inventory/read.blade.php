@extends("template")

@section('title')
    {{ $inventory->name }} |
@endsection

@section('style')
@endsection

@section('javaScript')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/addInventory.js') }}"></script>
    <script src="{{ asset('assets/js/getInventory.js') }}"></script>
@endsection

@section('main')
    <div class="container">
        <h2 class="mt20">{{ $inventory->name }}</h2>
        <div class="row mt20">
            <div class="col-md-12">

            </div>
        </div>
 @endsection
