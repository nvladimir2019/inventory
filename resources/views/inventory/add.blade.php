<div class="row container-fluid">
    <div class="col-md-12">
        <h3>Добавить инвентарь</h3>
        <form action="{{route('add-inventory')}}" method="POST">
            @csrf
            <input type="hidden" name="workplace_id" value="{{$workplace->id}}">
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="buhcode">Бухкод</label>
                <input type="text" name="buhcode" id="buhcode" class="form-control">
            </div>
            <div class="form-group">
                <label for="model">Модель</label>
                <select name="model" id="model" class="form-control">
                    @foreach($models as $model)
                        <option value="{{$model->id}}">{{$model->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="provider">Поставщик</label>
                <select name="provider" id="provider" class="form-control">
                    @foreach($providers as $provider)
                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date_of_delivery">Дата поставки</label>
                <input type="date" name="date_of_delivery" class="form-control">
            </div>
            <div class="form-group">
                <label for="guarantee_period">
                    Гарантия
                </label>
                <input type="number" name="guarantee_period" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select name="status" id="status" class="form-control">
                    @foreach($status as $s)
                        <option value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Добавить" class="btn btn-primary">
                <button class="btn btn-dark" id="add-inventory-close">Закрыть</button>
            </div>
        </form>
    </div>
</div>
