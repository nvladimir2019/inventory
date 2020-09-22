@extends("template")

@section('title', 'Рабочие места |')

@section('style')
@endsection

@section('main')
    <div class="container">
        <h2 class="mt20">{{ $workplace->name }}</h2>
        <div class="row">
            <div class="col-md-12 mt20">
                Подразделение: {{ $workplace->department->namedept }}
            </div>
        </div>
        <div class="row mt20">
            <div class="col-md-3">Филиал: {{ $workplace->placement->floor->building->filial->name }}</div>
            <div class="col-md-3">Здание: {{ $workplace->placement->floor->building->name }}</div>
            <div class="col-md-3">Этаж: {{ $workplace->placement->floor->number }}</div>
            <div class="col-md-3">Комната: {{ $workplace->placement->placement }}</div>
        </div>
        <div class="row mt20">
            <div class="col-md-12 pull-right">
                <span class="float-right">
                    <input type="checkbox" id="with-inventory-numbers">
                    <label for="with-inventory-numbers"> С инвентарными номерами</label>
                </span>
            </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Тип</th>
                    <th scope="col">Производитель</th>
                    <th scope="col">Модель</th>
                    <th scope="col">Инвентарный номер</th>
                    <th scope="col">Подробнее</th>
                </tr>
                </thead>
                <tbody>
                @foreach($inventory as $inv)
                    <tr>
                        <td><a href="#">{{ $inv }}</a></td>
                        <td><a href="#">{{ $inv }}</a></td>
                        <td><a href="#">{{ $inv }}</a></td>
                        <td><a href="#">{{ $inv }}</a></td>
                        <td><a href="#">Подробнее</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
