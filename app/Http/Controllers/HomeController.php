<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;

class HomeController extends Controller
{
    public function index()
    {
        return App\User::all();
    }

    public function attachUserRole($userId, $role)
    {
        $user = App\User::find($userId);
        $roleId = App\Role::where('name',$role)->first();
        $user->roles()->attach($roleId);
        return $user;
    }

    public function attachPermission(Request $request)
    {
        $parameters = $request->only('permission','role');
        $permissionParam = $parameters['permission'];
        $roleParam = $parameters['role'];
        $role = App\Role::where('name',$roleParam)->first();
        $permission = App\Permission::where('name',$permissionParam)->first();
        $role->attachPermission($permission);
        //return $role->permissions;
        return $this->response->created();
    }

    public function getUserRole($userId)
    {//http://localhost:8000/api/users/1/roles
        return App\User::find($userId)->roles;
    }//$api->get('users/{user_id}/roles', 'App\Http\Controllers\HomeController@getUserRole');

    public function getPermissions($roleParam)
    {//$api->get('roles/{role}/permissions', 'App\Http\Controllers\HomeController@getPermissions');
        $role = App\Role::where('name',$roleParam)->first();
        //return $role->perms;
        return $this->response->array($role->perms); //Dingo
    }//http://localhost:8000/api/roles/owner/permissions

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
