<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Type;
use App\Business;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $businesses = Business::all();
        $types = Type::all();
        return view('businesses.index', compact('businesses', 'types', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $types = Type::all();
        return view('businesses.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        // $data = $request->all();

        $data = $request->all();
        // dd($data);

        $businesses = new Business();
        $businesses->fill($data);
        $businesses->save();
        $businesses->types()->attach($data['type']);
        // dd($data['type']);

        $typeUsedName = [];
        $types = Type::all();
        foreach ($types as $type) {
            if (in_array($type->id, $data['type'])) {
                $typeUsedName[] = $type->name; // salvo l'oggetto invece che l'array
            }
        }
        // dd($typeUsedName);

        // $tagsMail = new TagsUsed($tagsUsedTitle);
        // Mail::to('lollable@example.mail')->send($tagsMail);
        // // dd($tagsMail);

        // // Mail::to('lollable@example.mail')->send(new PostCreated($post)); // dipendenza passata
        // $mailableObj = new PostCreated($post);
        // Mail::to('lollable@example.mail')->send($mailableObj);

        return redirect()->route('businesses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $business = Business::find($id);
        return view('businesses.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    // ajax - get
    public function ajaxcall(Request $request){

        $businesses = Business::all();
        $types = Type::all();

        // foreach($businesses as $business){

        // }

        return response()->json([
            'businesses' => Business::all()
        ]);
    }
}
