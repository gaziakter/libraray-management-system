<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorModel extends Model
{
    use HasFactory;
    protected $table = 'authors';

    static function getRecord(){
        return AuthorModel::latest()->get();
    }

    static function getSingle($id){
        
        return AuthorModel::find($id);
    }
}
