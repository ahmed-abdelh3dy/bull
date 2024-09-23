<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    //      function __construct()
    // {

    // $this->middleware('permission:عرض صلاحية', ['only' => ['index']]);
    // $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
    // $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
    // $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);

    // }


    public function index()
    {
        $roles = Role::orderby('id', 'desc')->paginate();
        // dd($roles);
        return view('roles.roles');
    }


    public function createRolesAndPermissions()
    {
        // إنشاء تصريح
        $permission = Permission::create(['name' => ' articles']);

        // إنشاء دور
        $role = Role::create(['name' => 'booker']);

        // إسناد تصريح إلى دور
        $role->givePermissionTo($permission);

        // إسناد دور إلى مستخدم
        $user = User::find(1);
        $user->assignRole('booker');

        return "Roles and permissions created successfully.";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
