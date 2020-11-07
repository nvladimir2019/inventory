<div class="row container-fluid">
    <div class="close btn-close">✖</div>
    <div class="col-md-12">
        <h2 class="mt20">Добавить сотрудника</h2>
    </div>
    <div class="col-md-12">
        <form action="{{ route('add-save-employee') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="surename">Фамилия:</label>
                <input type="text" name="surename" class="form-control" id="surename">
            </div>
            <div class="form-group">
                <label for="first_name">Имя:</label>
                <input type="text" name="first_name" class="form-control" id="first_name">
            </div>
            <div class="form-group">
                <label for="middle_name">Отчество:</label>
                <input type="text" name="middle_name" class="form-control" id="middle_name">
            </div>
            <div class="form-group">
                <label for="department">Подразделение:</label>
                <select name="department_id" class="form-control" id="add-employee-department">
                    <option value="-1">Выберите подразделение</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->namedept }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="add-employee-workplace">Рабочее место:</label>
                <select name="workplace_id" class="form-control" id="add-employee-workplace" disabled>
                    <option value="-1">Выберите рабочее место</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Добавить" class="btn btn-primary">
                <button class="btn btn-dark btn-close" id="btn-close">Закрыть</button>
            </div>
        </form>
    </div>
</div>
