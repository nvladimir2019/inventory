<div class="row container-fluid">
    <div class="close btn-close">✖</div>
    <div class="col-md-12">
        <h2 class="mt20">Добавить инвентарь</h2>
    </div>
    <div class="col-md-12">
        <form action="{{route('add-inventory')}}" method="POST">
            @csrf
            <input type="hidden" name="workplace" value="{{$workplace->id}}" id="workplace-id">
            <div class="form-group">
                <input type="checkbox" id="accessory">
                <label for="accessory">Комплектующее</label>
            </div>
            <div class="form-group" id="select-inventory"></div>
            <div class="form-group">
                <label for="name">Имя:*</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="buhcode">Бухкод:</label>
                <input type="text" name="buhcode" id="buhcode" class="form-control">
            </div>
            <div class="form-group">
                <label for="type">Тип:</label>
                <select name="type" id="type" class="form-control">
                    <option value="-1">Выберите тип</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Производитель:</label>
                <select name="type" id="manufacturer" class="form-control">
                    <option value="-1">Производитель</option>
                    @foreach($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="model">Модель:*</label>
                <select name="model" id="model" class="form-control">
                    <option value="-1">Выберите модель</option>
                    @foreach($models as $model)
                        <option value="{{$model->id}}">{{$model->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="provider">Поставщик:*</label>
                <select name="provider" id="provider" class="form-control">
                    <option value="-1">Выберите поставщика</option>
                    @foreach($providers as $provider)
                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date_of_delivery">Дата поставки:*</label>
                <input type="date" name="date_of_delivery" class="form-control">
            </div>
            <div class="form-group">
                <label for="guarantee_period">
                    Гарантия
                </label>
                <input type="number" name="guarantee_period" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Статус:*</label>
                <select name="status" id="status" class="form-control">
                    @foreach($status as $s)
                        <option value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Добавить" class="btn btn-primary">
                <button class="btn btn-dark btn-close" id="add-inventory-close">Закрыть</button>
            </div>
        </form>
    </div>
</div>
