<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AuthorResource::collection(Author::latest('id')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {   
        $author = $request->validated();
        $author['slug'] = Str::slug($request->input('name'));
        return new AuthorResource(Author::create($author));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->input('name'));
        return $author->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        return $author->delete();
    }
}
