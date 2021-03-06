@extends("template")

@section('title', 'Рабочие места |')

@section('style')
@endsection

@section('javaScript')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/paginator.js') }}"></script>
    <script src="{{ asset('assets/js/workplaces.js') }}"></script>
    <script src="{{ asset('assets/js/addWorkplace.js') }}"></script>
@endsection

@section('main')
    <div class="container">
        <h2 class="mt20">Рабочие места</h2>
        <div class="filters row mt20">
            <div class="col-md-12">
                <form action="" method="POST">
                    <div class="form-row" id="filters-workplace">
                        <div class="col">
                            <select name="filial" id="filial" class="form-control">
                                <option value="-1">Выберите филиал</option>
                                @foreach($filials as $filial)
                                    <option value="{{ $filial->id }}">{{ $filial->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="building" disabled id="building" class="form-control">
                                <option>Здание</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="floor" disabled id="floor" class="form-control">
                                <option>Этаж</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="room" disabled id="room" class="form-control">
                                <option>Комната</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="department" id="department" class="form-control">
                                <option>Подразделение</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->namedept }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" id="btn-add-workplace">✚ Добавить</button>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Имя</th>
                        <th scope="col">Редактировать</th>
                    </tr>
                    </thead>
                    <tbody id="workplaces">
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <nav>
                    <ul class="pagination justify-content-center" id="pagination"></ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="add-workplace" id="add-workplace">
        @include('workplaces.add')
    </div>
@endsection
