<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Blogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V2\BloggerResource;
use App\Http\Resources\Api\V2\BloggerCollection;
use App\Http\Requests\Api\V2\StoreBloggerRequest;
use App\Http\Filters\Api\V2\Classes\BloggerFilter;
use App\Http\Requests\Api\V2\UpdateBloggerRequest;

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
     * Store New Blogger
     *
     * @param StoreBloggerRequest $request
     * @return void
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
        if ( request()->query('includePosts') ) {
            $blogger = $blogger->loadMissing('posts');
        }

        return new BloggerResource($blogger);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloggerRequest $request, Blogger $blogger)
    {  
        return ( $blogger->update($request->all()) ) 
        ? response([
            'message' => 'Updated Successfully'
        ], 202) 
        : response([
            'message' => 'An Errror Occurred In Updating Blogger Information'
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Blogger $blogger)
    {
        return $blogger->delete();
    }
}
