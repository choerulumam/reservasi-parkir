<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkiran extends Model
{
	protected $table = "parkiran";

	protected $fillable = [
		'capacity',
		'name',
		'descriptions'
	];

	public function parkir() {
        return $this->hasMany('App\Parkir', 'name', 'parking_at');
    }
}
