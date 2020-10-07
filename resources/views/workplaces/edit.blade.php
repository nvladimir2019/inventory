@extends("template")

@section('title')
    {{ $workplace->name }} |
@endsection

@section('style')
@endsection

@section('javaScript')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/callHttpClient.js') }}"></script>
    <script src="{{ asset('assets/js/addWorkplace.js') }}"></script>
@endsection

@section('main')
    <div class="container">
        <h2 class="mt20">Редактировать "{{ $workplace->name }}"</h2>
        <div class="row mt20">
            <div class="col-md-12">
                <form action="{{ route('save-edit-workplace') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $workplace->id }}">
                    <div class="form-group">
                        <label for="name">Имя:</label>
                        <input type="text" name="name" value="{{ $workplace->name }}" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="department">Подразделение:</label>
                        <select name="department" class="form-control" id="department">
                            <option value="-1">Выберите подразделение</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}"
                                    @if($department->id === $workplace->department_id)
                                        selected
                                    @endif
                                >
                                    {{ $department->namedept }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add-workplace-filial">Филиал:</label>
                        <select class="form-control" id="add-workplace-filial">
                            <option value="-1">Выберите филиал</option>
                            @foreach($filials as $filial)
                                <option value="{{ $filial->id }}"
                                    @if($filial->id === $workplace->placement->floor->building->filial->id)
                                        selected
                                    @endif
                                >
                                    {{ $filial->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add-workplace-building">Здание:</label>
                        <select class="form-control" id="add-workplace-building">
                            <option value="-1">Выберите здание</option>
                            @foreach($workplace->placement->floor->building->filial->buildings as $building)
                                <option value="{{ $building->id }}"
                                    @if($building->id === $workplace->placement->floor->building->id)
                                        selected
                                    @endif
                                >
                                    {{ $building->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add-workplace-floor">Этаж:</label>
                        <select class="form-control" id="add-workplace-floor">
                            <option value="-1">Выберите этаж</option>
                            @foreach($workplace->placement->floor->building->floors as $floor)
                                <option value="{{ $floor->id }}"
                                    @if($floor->id === $workplace->placement->floor->id)
                                        selected
                                    @endif
                                >
                                    {{ $floor->number }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add-workplace-room">Комната:</label>
                        <select name="placement" class="form-control" id="add-workplace-room">
                            <option value="-1">Выберите комнату</option>
                            @foreach($workplace->placement->floor->placements as $placement)
                                <option value="{{ $placement->id }}"
                                    @if($placement->id === $workplace->placement->id)
                                        selected
                                    @endif
                                >
                                    {{ $placement->placement }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Сохранить" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
