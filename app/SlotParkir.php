<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotParkir extends Model
{
	protected $fillable = [
		'name','status'
	];

	protected $table = "slot_parkir";
    
    public function parkir() {
         return $this->hasMany('App\Parkir', 'name', 'parking_slot');
    }

}
