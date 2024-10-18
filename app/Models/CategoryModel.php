<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'categories';

    static function getRecord(){
        return CategoryModel::latest()->get();
    }

    static function getSingle($id){
        
        return CategoryModel::find($id);
    }

    public function books()
    {
        return $this->belongsToMany(BookModel::class, 'book_category');
    }
    
    public function subcategories()
    {
        return $this->hasMany(SubCategoryModel::class, 'id');
    }
}
