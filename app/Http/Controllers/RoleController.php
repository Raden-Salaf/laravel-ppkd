<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Alert;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dibawah ini singkatan dari query (select * from users)
        // latest : desc
        //  oldest :asc
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::latest()->get();
        // $users = User::orderByDesc('id')->get();=> ini mengurutkan dari bawah

        // $users = User::all();
        $roles = Role::orderBy("id", "asc")->get();
        $title = 'Role Management';
        return view("role.index", compact("roles", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Role";
        return view("role.create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert into user() values()
        $validate = $request->validate([
            "name" => "required",
            "is_active" => "required",
        ]);
        Role::create($request->all());
        Alert::success("Success!!", "Create Role Success");
        return redirect()->to("role")->with("success", "Done booloooo");
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
        $title = "Edit User";
        $edit = Role::find($id); //Response -> blank
        // $edit = User::findOrFail($id); //Response -> 404
        return view("role.edit", compact("title", 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =
            [
                'name' => $request->name,
                'is_active' => $request->is_active,
            ];
        // Jika user memasukan password

        Role::find($id)->update($data);
        return redirect()->to('role');

        // dibawa ini code opsi 1
        // if (User::find($id)->update($request->all())) {
        //     return redirect()->to('user')->with('success', '');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete();
        Alert::success('Done', 'Role User Has Been Destroy');
        return redirect()->to('role')->with('success', '');
    }
}
