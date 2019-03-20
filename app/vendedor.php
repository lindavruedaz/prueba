<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendedor extends Model
{
	public $table = "vendedor" ; 
	protected $primaryKey = 'id';
	public $timestamps = false;
    protected $fillable = ['nombre', 'direccion', 'ci','telf'];
}
