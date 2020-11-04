@extends("template")

@section('title')
    {{ $inventory->name }} |
@endsection

@section('style')
@endsection

@section('javaScript')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/callHttpClient.js') }}"></script>
    <script src="{{ asset('assets/js/moveInventory.js') }}"></script>
@endsection

@section('main')
    <div class="container">
        <h2 class="mt20">{{ $inventory->name }}</h2>
        <div class="mt20">
            <button class="btn btn-primary" id="btn-add-inventory">✚ Добавить комплектующие</button>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <table class="table">
                    @if(!empty($inventory->parrent_id))
                        <tr>
                            <td>
                                Комплектующее инвентаря:
                            </td>
                            <td>
                                <a href="{{ route('read-inventory', $inventory->parent->id) }}">{{ $inventory->parent->name }}</a>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td>Тип:</td>
                        <td>{{ $inventory->model->type->name }}</td>
                    </tr>
                    <tr>
                        <td>Производитель:</td>
                        <td>{{ $inventory->model->manufacturer->name }}</td>
                    </tr>
                    <tr>
                        <td>Модель:</td>
                        <td>{{ $inventory->model->name }}</td>
                    </tr>
                    <tr>
                        <td>Инвентарный номер:</td>
                        <td>{{ $inventory->buhcode }}</td>
                    </tr>
                    <tr>
                        <td>Дата поставки:</td>
                        <td>{{ $inventory->date_of_delivery }}</td>
                    </tr>
                    <tr>
                        <td>Гарантия:</td>
                        <td>{{ $inventory->guarantee_period }}</td>
                    </tr>
                    <tr>
                        <td>Статус:</td>
                        <td>{{ $inventory->status->name }}</td>
                    </tr>
                    <tr>
                        <td>Рабочее место:</td>
                        <td>
                            <a href="{{ route('read-workplace', $inventory->workplace->id) }}">
                                {{ $inventory->workplace->name }}
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-primary" id="btn-move">Переместить</button>
                        </td>
                    </tr>
                    @if(!empty($inventory->accessories->toArray()))
                        <tr>
                            <td rowspan="{{ $inventory->accessories->count() }}">Комплектующие:</td>
                            <td>
                                <a href="{{ route('read-inventory', $inventory->accessories[0]->id) }}">
                                    1. {{ $inventory->accessories[0]->name }}
                                </a>
                            </td>
                        </tr>
                        @for ($i = 1; $i < $inventory->accessories->count(); $i++)
                        <tr>
                            <td>
                                <a href="{{ route('read-inventory', $inventory->accessories[$i]->id) }}">
                                    {{ $i+1 }}. {{ $inventory->accessories[$i]->name }}
                                </a>
                            </td>
                        </tr>
                        @endfor
                    @endif
                </table>
            </div>
        </div>
        <div class="row mt20">
            <h3>Характеристики</h3>
            <div class="col-md-12">
                <table class="table">
                    <tbody>
                        @foreach($inventory->model->typeAttrib as $attrib)
                            <tr>
                                <td>{{ $attrib->name }}:</td>
                                <td>{{ $attrib->attribute[0]->values }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="move" id="move">
        @include('inventory.move')
    </div>
 @endsection
