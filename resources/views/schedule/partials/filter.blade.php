<form id="filter-form" action="{{route('schedule.index')}}" method="GET" onsubmit= "return filterSubmit(event)">
    <input type="text" name="user_id" id="user_id" disabled value="{{Auth::user()->id}}" hidden>

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
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" 
                    min="{{ date('Y-m-d') }}" required onblur="inputDate()" value="{{old('date')}}">
            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="starting_time" class="form-label">Horário de início*</label>
            <input type="time" class="form-control @error('starting_time') is-invalid @enderror" name="starting_time" 
                    id="starting_time" required onblur="inputStartingTime()" value="{{old('starting_time')}}">
            @error('starting_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="ending_time" class="form-label">Horário de término*</label>
            <input type="time" class="form-control @error('ending_time') is-invalid @enderror" name="ending_time" 
                    id="ending_time" required value="{{old('ending_time')}}">
            @error('ending_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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