<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    
    use SoftDeletes;

	protected $fillable = ['status',];


	

	protected $dates = ['deleted_at'];
}
