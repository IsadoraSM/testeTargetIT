<form id="filter-form" action="{{route('schedule.index')}}" method="GET" onsubmit= "return filterSubmit(event)">
    <div class="row">
        <div class="col-md-2">
            <label for="local" class="form-label">Local da reunião</label>
            <select id="local" name="local" class="form-control">
                <option value="" selected>
                    Todos
                </option>
                @foreach($locals as $local)
                    <option value="{{$local->id}}">
                        {{$local->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="date" class="form-label">Data da reunião*</label>
            <input type="date" class="form-control" id="date" name="date" min="{{ date('Y-m-d') }}" required>
        </div>
        <div class="col-md-3">
            <label for="ending_time" class="form-label">Horário de início*</label>
            <input type="time" class="form-control" name="starting_time" id="starting_time" required>
        </div>
        <div class="col-md-3">
            <label for="ending_time" class="form-label">Horário de término*</label>
            <input type="time" class="form-control" name="ending_time" id="ending_time" required>
        </div>
        <div class="col-md-1 d-flex align-items-center">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>

    *Campos obrigatórios

    @csrf
</form>