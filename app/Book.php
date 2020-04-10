<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = true;

    protected $fillable = [ 
        'title',
        'author_name',
        'category_id',
        'publisher',
        'edition',
    ];

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function accessNo(){
        return $this->belongsTo('App\Accessno');
    }
    public static function bookcount($category_id){
        $categoryCount = Book::where('category_id', $category_id)->count();
        return $categoryCount;
    }
}
