<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lockers = locker::orderBy("id", "asc")->get();
        $title = trans("Locker Management");
        return view("locker.index", compact("lockers", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("locker.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "locker_name" => "required|unique:lockers,locker_name",
            "batch" => "required|in:1,2,3,4",
            "major" => "required|in:Web Programming,Content Creator,App Developer",
            "status" => "required|in:Available,Unavailable,Damaged,Missing",
        ]);
        Locker::create([
            "locker_name" => $request->get("locker_name"),
            "batch" => $request->batch,
            "major" => $request->major,
            "status" => $request->status
        ]);
        Alert::success("Succes", "Pengajuan Berhasil");
        return redirect()->to("locker")->with("success", "Done Boloo"); // <- Ini pemakaian "to" agar mengambil url (route) di web.php
        // return redirect()->route("locker.index")->with("success","Done Bolooo");
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
        $locker = Locker::find($id);
        $title = "Edit Loker";
        return view("locker.edit", compact("locker", "title"));
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
