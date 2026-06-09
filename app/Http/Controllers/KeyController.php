<?php

namespace App\Http\Controllers;

use App\Models\Keys;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class KeyController extends Controller
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
        $keys = Keys::orderBy("id", "asc")->get();
        $title = 'Key Management';
        return view("key.index", compact("keys", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Major";
        return view("key.create", compact("title"));
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
        Keys::create($request->all());
        Alert::success("Success!!", "Create New Key Success");
        return redirect()->to("key")->with("success", "Done booloooo");
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
        $title = "Edit Key";
        $edit = Keys::find($id); //Response -> blank
        // $edit = User::findOrFail($id); //Response -> 404
        return view("key.edit", compact("title", 'edit'));
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

        Keys::find($id)->update($data);
        Alert::success('Success', 'Key Has Been Update');
        return redirect()->to('key');

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
        Keys::find($id)->delete();
        Alert::success('Done', 'Key  Has Been Destroy');
        return redirect()->to('key')->with('success', 'gasken bolooooo');
    }
}
