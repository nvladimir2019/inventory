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
                <table class="table">
                    @if(!empty($inventory->parrent_id))
                        <tr>
                            <td>
                                Родительский инвентарь:
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
                            <a href="{{ route('read-workplace', $inventory->workplace->id) }}">{{ $inventory->workplace->name }}</a>
                        </td>
                    </tr>
                    @if(!empty($inventory->accessories->toArray()))
                        <tr>
                            <td>Комплектующие:</td>
                            <td>
                                @foreach($inventory->accessories as $accessory)
                                    <div>
                                        <a href="{{ route('read-inventory', $accessory->id) }}">{{ $accessory->name }}</a>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
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
 @endsection
