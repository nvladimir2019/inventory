@extends("template")

@section('title', 'Сотрудники |')

@section('style')
@endsection

@section('javaScript')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/paginator.js') }}"></script>
@endsection

@section('main')
    <div class="container">
        <h2 class="mt20">Сотрудники</h2>
        <div class="mt20">
            <button class="btn btn-primary" id="btn-add-employee">✚ Добавить</button>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <form action="">
                    <div>
                        <label for="search">Поиск</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" id="search" placeholder="">
                        <input type="submit" class="btn btn-primary" value="Поиск"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
