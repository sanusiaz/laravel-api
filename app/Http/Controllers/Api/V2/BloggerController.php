<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Blogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V2\BloggerResource;
use App\Http\Resources\Api\V2\BloggerCollection;
use App\Http\Requests\Api\V2\StoreBloggerRequest;
use App\Http\Filters\Api\V2\Classes\BloggerFilter;

class BloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filteredResults = new BloggerFilter();
        $filteredResults = $filteredResults->transform($request);
        $blogger = Blogger::where($filteredResults);
        if ( $request->query('includePosts') ) {
            $blogger = $blogger->with('posts');
        }

        return new BloggerCollection ($blogger->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloggerRequest $request)
    {
        return new BloggerResource (Blogger::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blogger $blogger)
    {
        return new BloggerResource($blogger->loadMissing('posts'));
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
