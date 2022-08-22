<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Branch;

class BranchController extends Controller
{
    /**
     * Display a add branch page.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
        return view('backend.pages.branch.add');
    }

    /**
         * Display a add branch page.
         *
         * @return \Illuminate\Http\Response
         */
        public function manage(){
            $branches = Branch::all();

            return view('backend.pages.branch.manage', compact('branches'));
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required',
        'manager' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'status' => 'required'
        ]);


        $branch = new Branch;

        $branch->name = $request->name;
        $branch->manager = $request->manager;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->status = $request->status;

        $branch->save();

        // Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);


        return redirect()->route('branch.manage')->with('message', 'Branch added successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);

        return view('backend.pages.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);

        $branch->name = $request->name;
        $branch->manager = $request->manager;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->status = $request->status;

        $branch->update();

        return redirect()->route('branch.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();

        return back();
    }
}
