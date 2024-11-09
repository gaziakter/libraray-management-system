<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = ['name', 'slug', 'group_by'];

    static function getRecord(){
        return PermissionModel::latest()->get();
    }

    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, 'role_permission')->withTimestamps();
    }
}
