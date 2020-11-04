<div class="row container-fluid">
    <div class="close btn-close">✖</div>
    <div class="col-md-12">
        <h2 class="mt20">Переместить инвентарь</h2>
    </div>
    <div class="col-md-12">
        <form action="{{ route('move-inventory') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $inventory->id }}">
            <input type="submit" value="Сохранить" class="btn btn-primary">
            <button class="btn btn-dark" id="btn-close">Закрыть</button>
        </form>
    </div>
</div>
