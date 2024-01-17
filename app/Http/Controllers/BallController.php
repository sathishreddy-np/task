<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBallRequest;
use App\Http\Requests\UpdateBallRequest;
use App\Models\Ball;

class BallController extends Controller
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
    public function store(StoreBallRequest $request)
    {
        try {
            $ball = new Ball();
            $ball->name = $request->name;
            $ball->volume = $request->volume;
            $ball->save();

            return redirect()->back()->with('success', "Ball added Successfully.");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Ball $ball)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ball $ball)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBallRequest $request, Ball $ball)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ball $ball)
    {
        //
    }
}
