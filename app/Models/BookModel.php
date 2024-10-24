<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;
    
    protected $table = 'books';



    public function publisher(){
        return $this->belongsTo(PublisherModel::class, 'publisher_id', 'id');
    }

    public function author(){
        return $this->belongsTo(AuthorModel::class, 'author_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(CategoryModel::class, 'book_category', 'book_id', 'category_id');
    }
    
    public function subcategories()
    {
        return $this->belongsToMany(SubCategoryModel::class, 'book_subcategory', 'book_id', 'subcategory_id');
    }
}