<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeeks(2);
        return view('reservations.step-one', compact('reservation', 'min_date', 'max_date'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'tel_number' => ['required', 'numeric'],
            'user_id' => ['required'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
        ]);
        
        
        if(empty($request->session()->get('reservation'))){
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }
        return to_route('reservations.step.two');
    }

    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $res_tables_ids = Reservation::orderBy('res_date')->get()->filter(function ($value) use ($reservation){
            return $value->res_date->format('Y-m-d H') == $reservation->res_date->format('Y-m-d H');
        })->pluck('table_id');

        $Availtables = Table::where('status', TableStatus::Available)->get();
        $tables = $Availtables->reject(function ($table) use ($res_tables_ids) {
            return in_array($table->id, $res_tables_ids->toArray());
        });

        return view('reservations.step-two', compact('reservation', 'tables'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required'],
            'guest_number' => ['required', 'numeric'],
        ]);
        $tables = Table::findOrFail($request->table_id);
        if($request->guest_number > $tables->capacity){
            return back()->with('warning', 'Too many guest for current table');
        }

            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $reservation->save();
            $request->session()->forget('reservation');
        
            return to_route('landing')->with('success', 'Your Reservation has been Added');
    }
}
