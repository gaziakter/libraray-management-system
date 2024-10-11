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

    public function publisher(){
        return $this->belongsTo(PublisherModel::class, 'publisher_id', 'id');
    }

    public function category(){
        return $this->belongsTo(CagegoryModel::class, 'category_id', 'id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategoryModel::class, 'sub_category_id', 'id');
    }

    public function writer(){
        return $this->belongsTo(WriterModel::class, 'writer_id', 'id');
    }
}
