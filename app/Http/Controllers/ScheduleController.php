<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;
use App\Models\Room;

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

        if($request->_token){
            $local = $request->local;
            $date = $request->date;
            $starting_time = $request->starting_time;
            $ending_time = $request->ending_time;

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

        $locals = Local::orderBy('name')
                        ->get();

        return view('schedule.index', compact('rooms', 'locals', 'local', 'date', 'starting_time', 'ending_time'));
    }
}
