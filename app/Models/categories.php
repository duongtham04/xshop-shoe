<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primary_key = 'id';
    protected $fillable = ['name'];
    
    public static function categoriesAll(){
        return self::orderBy('id', 'desc')->get();
    }
    public static function categoriesAlladmin(){
        return self:: orderBy('id', 'desc') -> paginate(10);
    }
}
