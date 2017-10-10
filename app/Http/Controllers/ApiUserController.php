<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SlotParkir;
use App\Parkiran;
use App\Parkir;
use App\BookingLogs;
use Excel;

class ApiUserController extends Controller
{
    public function slot()
    {
        $data = SlotParkir::all();

        return response()->json($data);
    }

    public function booking(Request $request)
    {
        $data_user = User::where('nip', $request->user_id)->first();
    	$data = SlotParkir::where('name', $request->name)->first();
    	$data->status = "dipesan";
    	$data->save();

    	$c = Parkir::count();
 
    	$insert = new Parkir;
    	$insert->id = $c + 1;
    	$insert->user_id = $request->user_id;
    	$insert->parking_at = "FIT";
    	$insert->parking_slot = $request->name;
    	$insert->save();

        $c = BookingLogs::count();
        $logs = new BookingLogs;
        $logs->id = $c + 1;
        $logs->booking_slot = $request->name;
        $logs->nip = $request->user_id;
        $logs->username = $data_user->name;
        $logs->actions = "Booking";
        $logs->save();
		return response()->json($data);
    }

    public function deletebooking(Request $request)
    {

        $data_user = User::where('nip', $request->id)->first();
        $data_fetch_slot = Parkir::where('user_id', $request->id)->first();

        $c = BookingLogs::count();
        $logs = new BookingLogs;
        $logs->id = $c + 1;
        $logs->booking_slot = $data_fetch_slot->parking_slot;
        $logs->nip = $request->id;
        $logs->username = $data_user->name;
        $logs->actions = "canceled";
        $logs->save();
        
        $slot_update = SlotParkir::where('name', $data_fetch_slot->parking_slot)->first();
        $slot_update->name = $slot_update->name;
        $slot_update->status = "kosong";
        $slot_update->save();

        $data = Parkir::where('user_id', $request->id)->delete();
        return response()->json($data_fetch_slot);
    }

    public function logs(){
        return view('pages.member.logs');
    }

    public function logsview(Request $request) {
        $data = BookingLogs::where('nip', $request->id)->get();
        return response()->json(array('data'=>$data));
    }
}
