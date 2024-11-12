<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRoleModel extends Model
{
    use HasFactory;

    protected $table = 'role_permission';


    static public function getRolePermission($role_id){

        return PermissionRoleModel::where('role_id', '=', $role_id)->get();

    }

    static public function getPermission($slug, $role_id){

        return PermissionRoleModel::select('role_permission.id')
        ->join('permissions', 'permissions.id', '=', 'role_permission.permission_id')
        ->where('role_permission.role_id', '=', $role_id)
        ->where('permissions.slug', '=', $slug)
        ->count();

    }
}
