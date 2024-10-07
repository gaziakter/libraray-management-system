<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CagegoryModel extends Model
{
    use HasFactory;
    protected $table = 'categories';

    static function getRecord(){
        return PublisherModel::get();
    }

    static function getSingle($id){
        
        return PublisherModel::find($id);
    }
}
