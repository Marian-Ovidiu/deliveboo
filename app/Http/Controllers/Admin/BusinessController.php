<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return redirect()->route('public-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('businesses.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* $data = $request->all();

        $business = new Business();
        $business->fill($data);
        $business->save();

        return redirect()->route('products.create'); */

        $data = $request->all();
        // dd($data);

        $post = new Post();
        $post->fill($data);
        $post->save();
        $post->tag()->attach($data['tags']);
        // dd($data['tags']);

        // $tagsUsedId = [];
        // foreach ($data['tags'] as $usedTagId) {
        //     $tagsUsedId[] = $usedTagId;
        // }
        // // dd($tagsUsedId);

        // $tagsUsedTitle = [];
        // $tags = Tag::all();
        // foreach ($tags as $tag) {
        //     if (in_array($tag->id, $data['tags'])) {
        //         $tagsUsedTitle[] = $tag->title;
        //     }
        // }
        // // dd($tagsUsedTitle);

        $tagsUsedTitle = [];
        $tags = Tag::all();
        foreach ($tags as $tag) {
            if (in_array($tag->id, $data['tags'])) {
                $tagsUsedTitle[] = $tag; // salvo l'oggetto invece che l'array
            }
        }
        // dd($tagsUsedTitle);

        $tagsMail = new TagsUsed($tagsUsedTitle);
        Mail::to('lollable@example.mail')->send($tagsMail);
        // dd($tagsMail);

        // Mail::to('lollable@example.mail')->send(new PostCreated($post)); // dipendenza passata
        $mailableObj = new PostCreated($post);
        Mail::to('lollable@example.mail')->send($mailableObj);

        return redirect()->route('posts.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
