<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;

    protected $fillable = ['category_name', 'description', 'is_active','image',];
    

	public static function image($fileName, $category){
		if (request()->hasfile($fileName))
		{
			$file = request()->file($fileName);
			$extension = $file->getClientOriginalExtension();
			$filename = time().'.'.$extension;
			$file->move('image/categories/', $filename);
			$category->image = $filename;

		}
		
	}
	protected $dates = ['deleted_at'];

// ------------------products join with category---------------
	public function products(){
		return $this->hasMany("App\Model\Product");
	}
}
