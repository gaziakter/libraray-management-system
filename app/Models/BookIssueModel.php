<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssueModel extends Model
{
    use HasFactory;

    protected $table = 'book_issues';

    protected $fillable = [
        'student_id',
        'book_id',
        'user_id',
        'issue_date',
        'return_date',
        'actual_return_date',
        'status',
    ];

    // Automatically cast date fields to Carbon instances
    protected $dates = ['issue_date', 'return_date', 'actual_return_date'];

    public function student()
    {
        return $this->belongsTo(StudentModel::class);
    }

    public function book()
    {
        return $this->belongsTo(BookModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
