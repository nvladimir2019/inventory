@extends("template")

@section('title', 'Сотрудники |')

@section('style')
@endsection

@section('javaScript')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/paginator.js') }}"></script>
    <script src="{{ asset('assets/js/addEmployee.js') }}"></script>
    <script src="{{ asset('assets/js/employee.js') }}"></script>
@endsection

@section('main')
    <div class="container">
        <h2 class="mt20">Сотрудники</h2>
        <div class="mt20">
            <button class="btn btn-primary" id="btn-add-employee">✚ Добавить</button>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <form>
                    <div>
                        <label for="search">Поиск</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" id="search-employee" placeholder="">
                        <input type="submit" class="btn btn-primary" value="Поиск" id="btn-search-employee"/>
                    </div>
                </form>
            </div>
            <div class="col-md-12 mt20">
                <form action="">
                    <div class="form-row">
                        <div class="col">
                            <select name="department" class="form-control" id="department">
                                <option value="-1">Выберите филиал</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->namedept }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="workplace" class="form-control" id="workplace" disabled>
                                <option value="-1">Выберите рабочее место</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 mt20">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ФИО</th>
                        <th scope="col">Редактировать</th>
                    </tr>
                    </thead>
                    <tbody id="employees">
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <nav>
                    <ul class="pagination justify-content-center" id="pagination"></ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="add-employee" id="add-employee">
        @include('employees.add')
    </div>
@endsection

