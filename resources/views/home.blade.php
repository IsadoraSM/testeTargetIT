@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Próximas reuniões agendadas</div>

                <div class="card-body">
                    <div class="table-reponsive mt-4">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Local</th>
                                    <th scope="col">Sala</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Início</th>
                                    <th scope="col">Fim</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($schedules) > 0 )
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td>{{$schedule->room->local->name}}</td>
                                            <td>{{$schedule->room->name}}</td>
                                            <td>{{date('d/m/Y', strtotime($schedule->date))}}</td>
                                            <td>{{date('H:i', strtotime($schedule->starting_time))}}</td>
                                            <td>{{date('H:i', strtotime($schedule->ending_time))}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="vertical-align : middle; text-align:center;">
                                            Você não possui reuniões agendadas
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
