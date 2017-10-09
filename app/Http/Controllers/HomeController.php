<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SlotParkir;
use App\Parkir;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_slot = SlotParkir::all();
        $free_slot = SlotParkir::count();
        $reserved_slot = SlotParkir::where('status', 'dipesan')->count();
        $filled_slot = SlotParkir::where('status', 'terisi')->count();
        $empty_slot = SlotParkir::where('status', 'kosong')->count();
        return view('pages.member.home', compact('data_slot', 'free_slot', 'reserved_slot', 'filled_slot', 'empty_slot'));
    }

    public function slot()
    {
        $data_slot = SlotParkir::all();
        $free_slot = SlotParkir::count();
        $reserved_slot = SlotParkir::where('status', 'dipesan')->count();
        $filled_slot = SlotParkir::where('status', 'terisi')->count();
        $empty_slot = SlotParkir::where('status', 'kosong')->count();
        $parking_list = Parkir::all();

        return view('pages.member.slot', compact('data_slot', 'free_slot', 'reserved_slot', 'filled_slot', 'empty_slot', 'parkir_list'));
    }

    public function slotuser(Request $activated) 
    {
        $data = Parkir::where(function ($query) use ($activated) {
            $query->where('user_id', '=', $activated->id);
        })->get();

        return $data->toJson();
    }

    public function monitoring() {
        return view('pages.member.monitoring');
    }
    
}
