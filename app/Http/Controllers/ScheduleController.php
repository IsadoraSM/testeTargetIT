<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;
use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * Mostra uma lista com filtros para agendar um horário de reunião
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = null;

        $local = null;
        $date = null;
        $starting_time = null;
        $ending_time = null;

        $error = null;

        if($request->_token){

            $local = $request->local;
            $date = $request->date;
            $starting_time = $request->starting_time;
            $ending_time = $request->ending_time;

            //verifica se a data informada é igual a data de hoje
            if($date == date('Y-m-d')){
                $rulesStartingTime = 'required|date_format:H:i|after_or_equal:'.date('H:i');
            }else{
                $rulesStartingTime = 'required|date_format:H:i';
            }

            //calcula o horário máximo de término da reunião
            $timestamp = strtotime($starting_time) + 60*60;
            $ruleEndingTimeMax = date('H:i', $timestamp);
            $teste = 'required|date_format:H:i|after:starting_time|before_or_equal:'. $ruleEndingTimeMax;

            $rules = [
                'date' => 'required|after_or_equal: today|date_format:Y-m-d',
                'starting_time' => $rulesStartingTime,
                'ending_time' => 'required|date_format:H:i|after:starting_time|before_or_equal:'. date('H:i', $timestamp),
            ];

            $messages = [
                'required' => 'Campo obrigatório.',
                'date.after_or_equal' => 'A data informada deve ser igual ou posterior a data atual.',
                'ending_time.before_or_equal' => 'A duração da reunião não pode ser superior a uma hora.',
                'ending_time.after' => 'O horário de termino da reunião deve ser uma hora posterior a hora de início.'
            ];

            $validator = Validator::make($request->all(), $rules, $messages)->validate();

            $checkDate = Schedule::where('user_id', Auth::user()->id)
                                    ->where('date', $date)
                                    ->get();
            
            $formatDate = date('d/m/Y', strtotime($date));

            //Verifica se o usuário já possui uma sala de reunião reservada na data informada
            if(count($checkDate)>0){
                $error = "Você já possui uma sala de reunião agendada no dia informado ($formatDate)!";
            }else{
                //query que retorna todas as salas disponíveis para agendamento
                $rooms = Room::whereNotExists(function($query) use($date, $starting_time, $ending_time) {
                    $query->select('*')
                    ->from('schedules')
                    ->whereRaw('schedules.room_id = rooms.id')
                    ->where('schedules.date', $date)
                    ->where(function ($query) use ($starting_time, $ending_time) {
                        $query->whereBetween('schedules.starting_time', [$starting_time, $ending_time])
                        ->orWhereBetween('schedules.ending_time', [$starting_time, $ending_time]);
                    });
                })->where(function ($query) use ($local) {
                    if($local){
                        $query->where('local_id', $local);
                    }
                })->get();
            }
        }

        $locals = Local::orderBy('name')
                        ->get();

        return view('schedule.index', compact('rooms', 'locals', 'local', 'date', 'starting_time', 'ending_time', 'error'));
    }

    /**
     * Registra um novo agendamento no banco
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $local = Local::where('name', $request->local)->first();

        $room = Room::where('name', $request->room)
                        ->where('local_id', $local->id)
                        ->first();

        Schedule::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'starting_time' => $request->starting_time,
            'ending_time' => $request->ending_time,
            'room_id' => $room->id,
        ]);

        return;
    }
}
