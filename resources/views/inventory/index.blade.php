@extends("template")

@section('title', 'Инвентарь |')

@section('style')
@endsection

@section('javaScript')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/paginator.js') }}"></script>
@endsection

@section('main')
    <div class="container">
        <h2 class="mt20">Инвентарь</h2>
    </div>
@endsection
