<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Linkterkait;
use RealRashid\SweetAlert\Facades\Alert;
class LinkTerkaitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $linkterkait = Linkterkait::paginate(10);
        return view('admin.linkterkait.index', compact('linkterkait'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.linkterkait.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'link' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Linkterkait::create($input);
        Alert::success('Berhasil', 'Berhasil Menambahkan Link Terkait!');
        return redirect('/admin/linkterkait');
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
