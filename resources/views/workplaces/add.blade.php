<div class="row container-fluid">
    <div class="close btn-close">✖</div>
        <div class="col-md-12">
            <h2 class="mt20">Добавить рабочее место</h2>
        </div>
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
                    <label for="add-workplace-filial">Филиал:</label>
                    <select class="form-control" id="add-workplace-filial">
                        <option value="-1">Выберите филиал</option>
                        @foreach($filials as $filial)
                            <option value="{{ $filial->id }}">{{ $filial->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="add-workplace-building">Здание:</label>
                    <select class="form-control" id="add-workplace-building" disabled>
                        <option value="-1">Выберите здание</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="add-workplace-floor">Этаж:</label>
                    <select class="form-control" id="add-workplace-floor" disabled>
                        <option value="-1">Выберите этаж</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="add-workplace-room">Комната:</label>
                    <select name="room" class="form-control" id="add-workplace-room" disabled>
                        <option value="-1">Выберите комнату</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Добавить" class="btn btn-primary">
                    <button class="btn btn-dark btn-close" id="btn-close">Закрыть</button>
                </div>
            </form>
        </div>
</div>
