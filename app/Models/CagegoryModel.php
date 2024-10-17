<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CagegoryModel extends Model
{
    use HasFactory;
    protected $table = 'categories';

    static function getRecord(){
        return CagegoryModel::latest()->get();
    }

    static function getSingle($id){
        
        return CagegoryModel::find($id);
    }

    public function books()
    {
        return $this->belongsToMany(BookModel::class, 'book_category');
    }
    
    public function subcategories()
    {
        return $this->hasMany(SubCategoryModel::class);
    }
}
