<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['category_id', 'product_code', 'product_name','qty','price','is_active','description','image',];
    

	public static function image($fileName, $product){
		if (request()->hasfile($fileName))
		{
			$file = request()->file($fileName);
			$extension = $file->getClientOriginalExtension();
			$filename = time().'.'.$extension;
			$file->move('image/products/', $filename);
			$product->image = $filename;

		}
		
	}
	protected $dates = ['deleted_at'];

	

	public function category(){

		return $this->belongsTo(Category::class, 'category_id', 'id');
	}
}
