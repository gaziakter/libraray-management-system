<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationModel extends Model
{
    use HasFactory;
    protected $table = 'publication';

    static function getRecord(){
        return PublicationModel::get();
    }
}
