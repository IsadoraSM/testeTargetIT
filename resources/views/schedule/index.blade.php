@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">Agendamento de horário</div>
                    <div class="card-body">
                        @include('schedule.partials.filter')
                        @include('schedule.partials.error')
                        <div class="table-reponsive mt-4">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Local</th>
                                        <th scope="col">Sala</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Início</th>
                                        <th scope="col">Fim</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($rooms))
                                        @foreach ($rooms as $room)
                                            <tr>
                                                <td>{{$room->local->name}}</td>
                                                <td>{{$room->name}}</td>
                                                <td>{{date('d/m/Y', strtotime($date))}}</td>
                                                <td>{{$starting_time}}</td>
                                                <td>{{$ending_time}}</td>
                                                <td>
                                                    <button class="btn btn-success" onclick="scheduleButton(this);">
                                                        Agendar 
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" style="vertical-align : middle; text-align:center;">
                                                Preencha o filtro para carregar as salas disponíveis
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

@section('js')
    <script src="{{ asset('js/schedule.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
