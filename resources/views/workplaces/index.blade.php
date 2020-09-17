@extends("template")

@section('title', 'Рабочие места')

@section('style')
    <link rel="stylesheet" href="css/main.css">
@endsection

@section('main')
    <div class="container">
        <div class="row filters">
        <form action="" method="POST">
            <div class="form-row" id="filters-workplace">
                <div class="col">
                    <select name="filial" id="filial">
                        <option value="-1">Выберите филиал</option>
                        @foreach($filials as $filial)
                            <option value="{{ $filial->id }}">{{ $filial->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="building" disabled id="building">
                        <option>Здание</option>
                    </select>
                </div>
                <div class="col">
                    <select name="floor" disabled id="floor">
                        <option>Этаж</option>
                    </select>
                </div>
                <div class="col">
                    <select name="room" disabled id="room">
                        <option>Комната</option>
                    </select>
                </div>
                <div class="col">
                    <select name="department" id="department">
                        <option>Подразделение</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->namedept }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        </div>
        <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($workplaces as $workplace)
                <tr>
                    <th scope="row"><a href="#">{{ $workplace->name }}</a></th>
                    <td><a href="#">Редактировать</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
