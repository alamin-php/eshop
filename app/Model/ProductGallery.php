<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'gallery_image',];
    
	protected $dates = ['deleted_at'];

	public static function imageGallery($fileName, $product_id){
		if (request()->hasfile($fileName))
		{

			foreach (request()->$fileName as $file) {
				$filename = rand().'.'.$file->getClientOriginalExtension();
				$newFile = new ProductGallery();
				$newFile->product_id = $product_id;
				$newFile->gallery_image = $filename;
				if ($newFile->save()) {
					$file->move('image/galleris/', $filename);
				}
			}

		}
		
	}
}
