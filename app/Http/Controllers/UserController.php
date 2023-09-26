<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('users.create', compact("permissions","roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input());
        try {
            $user =  User::create([
                "name" => $request->name,
                "password" => Hash::make($request->password),
                "email" => $request->email
            ]);
            $user->syncPermissions($request->permissions, []);
            $user->syncRoles($request->roles, []);
            return redirect()->route("users.index")->with("msg","user has been created");
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with("msg","user not registered");

        }
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
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit', compact("user","roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $user->syncRoles($request->roles);

            return redirect()->route("users.index")->with("msg", "User has been updated");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with("msg", "Update error");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
