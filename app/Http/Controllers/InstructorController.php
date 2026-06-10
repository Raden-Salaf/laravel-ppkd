<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;



class InstructorController extends Controller
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
        $instructors = Instructor::with('major', 'user')->orderByDesc('id')->get();
        // return $instructors;
        // dd($instructors)
        $title = 'Instructor Management';
        // $majors = Majors::get();
        return view("instructor.index", compact("instructors", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Instructor";
        $majors = Majors::get();
        return view("instructor.create", compact("title", 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert into user() values()
        $validate = $request->validate([
            'major_id' => 'required',
            "name" => "required",
            "phone" => "required",
        ]);

        DB::beginTransaction();
        try {
            //code...
            // Inseert User
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
            ]);
            // Insert Instructor
            Instructor::create([
                'name' => $request->name,
                'user_id' => $user->id,
                'major_id' => $request->major_id,
                'phone' => $request->phone,
            ]);
            DB::commit();
            Alert::success("Success!!", "Create Role Success");
            return redirect()->to("instructor")->with("success", "Done booloooo");
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return $th->getMessage();
            Alert::error('Fail!!', $th->getMessage());
            return back()->withInput();
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
        $title = "Edit Instructor";
        $edit = Instructor::with('user')->find($id); //Response -> blank
        // $edit = User::findOrFail($id); //Response -> 404
        $majors = Majors::get();
        return view("instructor.edit", compact("title", 'edit', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        DB::beginTransaction();

        try {

            $dataUser = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            // Jika user ingin mengganti password
            $user = $instructor->user;
            if ($request->filled("password")) {
                $dataUser["password"] = bcrypt($request->password);
                // $dataUser["password"] = $request->password;
            }

            $user->update($dataUser);

            $data =
                [
                    'major_id' => $request->major_id,
                    'name' => $request->name,
                    'phone' => $request->phone,
                ];

            $instructor->update($data);
            DB::commit();
            Alert::success('Success!!', 'Update Instructor Complete');
            return redirect()->to('instructor')->with('success', 'Complete');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Fail!!!', $th->getMessage());
            return back();
        }
        // Jika user memasukan password

        // dibawa ini code opsi 1
        // if (User::find($id)->update($request->all())) {
        //     return redirect()->to('user')->with('success', '');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        // tanpa root model bynding
        try {
            $instructor->user->delete();
            Alert::success('Done', 'Gacoorr bolooo!!!, wis hapus HAMA!');
            return redirect()->to('instructor')->with('success', '');
            //code...
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Fail!!!', $th->getMessage());
            return back();
        }
    }
}
