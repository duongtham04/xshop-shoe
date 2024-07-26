<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'category_id', 'img'];
    public static function productHot($limit = 8)
    {
        return self::orderBy('sold', 'desc')->take($limit)->get();
    }

    public static function productNew($limit = 8)
    {
        return self::orderBy('id', 'desc')->take($limit)->get();
    }
    
    public static function productView($limit = 8)
    {
        return self::orderBy('view', 'desc')->take($limit)->get();
    }

    public static function productAlladmin(){
        return self:: orderBy('id', 'desc') -> paginate(20);
    }

    public static function productAll(){
        return self:: orderBy('id', 'desc')->paginate(20);
    }

    public static function product_page($category_id){
        return self::where('category_id', $category_id) -> paginate(20);
    }
    
    public static function productId($id){
        return self::find($id);
    }

    public static function searchProduct($query){
        return self::where('name', 'LIKE', "%{$query}%")->paginate(12)->appends(['query' => $query]);
    }
}
