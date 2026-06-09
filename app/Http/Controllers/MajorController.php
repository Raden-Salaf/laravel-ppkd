<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class MajorController extends Controller
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
        $majors = Majors::orderBy("id", "asc")->get();
        $title = 'Major Management';
        return view("major.index", compact("majors", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Major";
        return view("major.create", compact("title"));
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
        Majors::create($request->all());
        Alert::success("Success!!", "Create Major Success");
        return redirect()->to("major")->with("success", "Done booloooo");
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
        $title = "Edit Major";
        $edit = Majors::find($id); //Response -> blank
        // $edit = User::findOrFail($id); //Response -> 404
        return view("major.edit", compact("title", 'edit'));
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

        Majors::find($id)->update($data);
        Alert::success('Success', 'Key Has Been Update');
        return redirect()->to('major');

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
        Majors::find($id)->delete();
        Alert::success('Done', 'Major Has Been Destroy');
        return redirect()->to('role')->with('success', '');
    }
}
