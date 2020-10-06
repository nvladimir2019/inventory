@extends("template")

@section('title')
    Рабочее место '{{ $workplace->name }}' |
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
        <h2 class="mt20">{{ $workplace->name }}</h2>
        <div class="row mt20">
            <div class="col-md-12">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">Подразделение: {{ $workplace->department->namedept }}</li>
                    <li class="list-group-item">Филиал: {{ $workplace->placement->floor->building->filial->name }}</li>
                    <li class="list-group-item">Здание: {{ $workplace->placement->floor->building->name }}</li>
                    <li class="list-group-item">Этаж: {{ $workplace->placement->floor->number }}</li>
                    <li class="list-group-item">Комната: {{ $workplace->placement->placement }}</li>
                </ul>
            </div>
        </div>
        <div class="mt20">
            <button class="btn btn-primary" id="btn-add-inventory">✚ Добавить инвентарь</button>
        </div>
        <div class="row">
            <div class="col-md-12 pull-right">
                <span class="float-right">
                    <input type="checkbox" id="with-inventory-numbers">
                    <label for="with-inventory-numbers"> С инвентарными номерами</label>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
                <tbody id="table-inventory">
                @foreach($inventory as $inv)
                    <tr>
                        <td>{{ $inv->model->type->name }}</td>
                        <td>{{ $inv->model->manufacturer->name }}</td>
                        <td>{{ $inv->model->name }}</td>
                        <td>{{ $inv->buhcode }}</td>
                        <td><a href="{{ route('read-inventory', $inv->id) }}">Подробнее</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
<div class="add-inventory" id="add-inventory">
    @include('inventory.add')
</div>
