<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBucketRequest;
use App\Http\Requests\UpdateBucketRequest;
use App\Models\Bucket;

class BucketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBucketRequest $request)
    {
        try {
            $bucket = new Bucket();
            $bucket->name = $request->name;
            $bucket->volume = $request->volume;
            $bucket->save();

            return redirect()->back()->with('success', "Bucket added Successfully.");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Bucket $bucket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bucket $bucket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBucketRequest $request, Bucket $bucket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bucket $bucket)
    {
        //
    }
}
