<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';

    static function getRecord(){
        return SubCategoryModel::latest()->get();
    }

    static function getSingle($id){
        
        return SubCategoryModel::find($id);
    }
}
