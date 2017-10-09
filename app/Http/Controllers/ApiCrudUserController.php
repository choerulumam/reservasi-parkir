<?php

namespace App\Http\Controllers;

use App\User;
use Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiCrudUserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = User::all();
        return view('pages.admin.user.view-user')->with('data', $data);
    }

    public function update(Request $request)
    {
    	$data = User::find($request->id);
        $data->id_tags = $request->id_tags;
        $data->nip = $request->nip;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mac_address = $request->mac_address;
        $data->save();
        return response()->json($data);
    }

    public function delete(Request $request)
    {
    	User::find($request->id)->delete();
    	return response()->json();
    }

    public function create(Request $request)
    {
    	$data = new User();
    	$data->id = $request->id;
    	$data->id_tags = $request->id_tags;
        $data->nip = $request->nip;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mac_address = $request->mac_address;
        $data->name = $request->name;
        $data->password = Hash::make($request->password);
        $data->save();
        return response ()->json($data);
    }

    public function export()
    {
    	$users = User::select('id', 'id_tags', 'nip', 'name', 'email', 'mac_address', 'created_at')->get();
    	Excel::create('users', function($excel) use($users) {
    		$excel->sheet('Sheet 1', function($sheet) use($users) {
    			$sheet->fromArray($users);
    		});
    	})->export('xls');
    }

}
