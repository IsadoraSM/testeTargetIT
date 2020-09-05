<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;

class ScheduleController extends Controller
{
    /**
     * Mostra uma lista com filtros para agendar um horário de reunião
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locals = Local::orderBy('name')
                        ->get();

        $rooms = null;

        return view('schedule.index', compact('rooms', 'locals'));
    }
}
