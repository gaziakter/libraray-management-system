<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = ['student_name'];

    protected $casts = [
        'date_of_birth' => 'date'
    ];

    static function getRecord(){
        return StudentModel::latest()->get();
    }

    public function blood(){
        return $this->belongsTo(BloodModel::class, 'blood_id', 'id');
    }

    public function bookIssues()
{
    return $this->hasMany(BookIssueModel::class);
}

}
