<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriterModel extends Model
{
    use HasFactory;
    protected $table = 'writers';

    static function getRecord(){
        return WriterModel::latest()->get();
    }

    static function getSingle($id){
        
        return WriterModel::find($id);
    }
}
