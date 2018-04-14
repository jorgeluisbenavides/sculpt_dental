<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Occupation;

class Customer extends Model
{
	//salvar datos de maner masiva - formulario en forma de array
    protected $fillable =['id','folio','name','last_name','last_name_one','last_name_two','address','references','age','cell_phone','home_phone','sex','civil_state','img_name','occupation_id'];

    //un cliente tiene a una ocupacion
	public function occupation(){
		return $this->belongsTo(Occupation::class);
	}

	public function quotes(){
		return $this->hasMany(Quote::class);
	}
}
