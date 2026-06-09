<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Majors;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class StudentController extends Controller
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
        $students = Student::with('major')->orderByDesc('id')->get();
        // return $students;
        // dd($students)
        $title = 'Student Management';
        // $majors = Majors::get();
        return view("student.index", compact("students", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Student";
        $majors = Majors::get();
        return view("student.create", compact("title", 'majors'));
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
        Student::create($request->all());
        Alert::success("Success!!", "Create Role Success");
        return redirect()->to("student")->with("success", "Done booloooo");
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
        $title = "Edit Student";
        $edit = Student::find($id); //Response -> blank
        // $edit = User::findOrFail($id); //Response -> 404
        $majors = Majors::get();
        return view("student.edit", compact("title", 'edit', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =
            [
                'major_id' => $request->major_id,
                'name' => $request->name,
                'phone' => $request->phone,
            ];
        // Jika user memasukan password

        Student::find($id)->update($data);
        Alert::success("Success!!", "Update Student Success");
        return redirect()->to('student');

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
        Student::find($id)->delete();
        Alert::success('Done', 'Gacoorr bolooo!!!, wis hapus HAMA!');
        return redirect()->to('student')->with('success', '');
    }
}
