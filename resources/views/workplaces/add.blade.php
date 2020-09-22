@extends("template")

@section('title', 'Добавить рабочее место |')

@section('style')
@endsection

@section('javaScript')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/addWorkplace.js') }}"></script>
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt20">Добавить рабочее место</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('add-save-workplace') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя:</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="department">Подразделение:</label>
                        <select name="department" class="form-control" id="department">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->namedept }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filial">Филиал:</label>
                        <select class="form-control" id="filial">
                            <option value="-1">Выберите филиал</option>
                            @foreach($filials as $filial)
                                <option value="{{ $filial->id }}">{{ $filial->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="building">Здание:</label>
                        <select class="form-control" id="building" disabled>
                            <option value="-1">Выберите здание</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="floor">Этаж:</label>
                        <select class="form-control" id="floor" disabled>
                            <option value="-1">Выберите этаж</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room">Комната:</label>
                        <select name="room" class="form-control" id="room" disabled>
                            <option value="-1">Выберите комнату</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Добавить" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
