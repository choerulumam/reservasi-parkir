<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{

	protected $table = "parkir";

    public function parkiran() {
    	return $this->belongsTo('App\Parkiran', 'parking_at', 'name');
    } 

    public function slotparkir() {
    	return $this->belongsTo('App\SlotParkir', 'parking_slot', 'name');
    }

    public function user() {
    	return $this->belongsTo('App\User', 'user_id', 'nip');
    }

}
