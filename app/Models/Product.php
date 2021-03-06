<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function category() {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user() {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

	/*public function product_image() {
    	return $this->hasMany(ProductImage::class, 'product_id', 'id')->where('status', ACTIVE_STATUS);
    }

    public function images() {
    	return $this->belongsTo(ProductImage::class, 'product_id', 'id')->where('status', ACTIVE_STATUS);
    }

    public static function getLatestProducts($request) {
    	$query = Product::with('category:id,name', 'images:id,product_id,file,file_type')->where('status', PUBLISHED);

    	return $query->orderBy('id', 'DESC')->paginate($request->limit);
    }

    public static function getProducts($request) {
    	$query = Product::with('category:id,name',
    						 'images:id,product_id,file,file_type',
    						 'user:id,first_name')
    						->where('status', PUBLISHED);
    	if($request->searchproduct) {
    		$query->where(function($q) use ($request) {
    			$q->where('name', 'LIKE', "%{$request->searchproduct}%")
                ->orWhere('name', 'LIKE', "%{$request->searchproduct}%"); 
    		});
    	}

		if($request->category) {
			$query->where('category_id', $request->category);
		}

        if($request->brand) {
            $query->where('brand', $request->brand);
        }

        if($request->tag) {
            $query->where('tags', $request->tag);
        }

        if($request->price) {
            $explode = explode('-', $request->price);
            
            $from = $explode[0];
            $to = isset($explode[1]) ? $explode[1] : NULL;
            
            if(empty($to))
            {
                $query->where('price', '>', $from);
            }
            else
            {
                $query->whereBetween('price', [$from, $to]);
            }
        }

		if($request->orderBy) {
			$query->orderBy('id', $request->orderBy);
		}
    	return $query->orderBy('id', 'DESC')->paginate($request->limit);
    }*/
}
