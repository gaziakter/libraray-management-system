<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;
    
    protected $table = 'books';

    static function getRecord(){
        return BookModel::latest()->get();
    }

    static function getSingle($id){
        
        return BookModel::find($id);
    }
}
