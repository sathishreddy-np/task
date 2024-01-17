<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBucketSuggestionRequest;
use App\Http\Requests\UpdateBucketSuggestionRequest;
use App\Models\Ball;
use App\Models\Bucket;
use App\Models\BucketSuggestion;
use Illuminate\Http\Request;

class BucketSuggestionController extends Controller
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
    public function store(Request $request)
    {
        try {
            $purchased_balls = $request->except('_token');
            $balls_volume = 0;
            foreach ($purchased_balls as $name => $number) {
                $ball = Ball::where('name', $name)->first();
                if ($ball) {
                    $balls_volume += $ball->volume * $number;
                }
            }
            // dump("balls volume" . $balls_volume);

            $buckets_volume = 0;

            $buckets = Bucket::all();
            foreach ($buckets as $bucket) {
                $buckets_volume += $bucket->volume;
            }
            // dump("bucket volume" . $buckets_volume);
            $more_space = 0;
            if ($buckets_volume < $balls_volume) {
                $more_space = $balls_volume - $buckets_volume;
            }

            // dump("more space" . $more_space);

            $left = [];

            if ($more_space > 0) {
                // dump("all balls cannot be filled in the buckets.");

                $purchased_balls = $request->except('_token');
                foreach ($purchased_balls as $name => $number) {
                    $ball = Ball::where('name', $name)->first();
                    if ($ball) {
                        $rem = $more_space % $ball->volume;
                        $balls_cannot_fit = $more_space / $ball->volume;
                        if($balls_cannot_fit > $number){
                            continue;
                        }
                        if ($rem >= 0) {
                            $more_space = $rem;
                            if($balls_cannot_fit > 0){
                                $left[$ball->name] =$balls_cannot_fit;
                            }
                            continue;
                        }
                    }
                }
                // dump("balls list");

                // dd($left);
            }

            if( $more_space == 0){
                // dump("all balls can be filled in the buckets.");
            }
            // dump($request->except('_token'));
            // dd($left);
            $bucket_suggestion = new BucketSuggestion();
            $bucket_suggestion->balls = json_encode($request->except('_token'));
            $bucket_suggestion->result = json_encode($left); // Cannot accomodate
            $bucket_suggestion->save();

            // dd($bucket_suggestion);

            return redirect()->back()->with('success_suggestion', json_encode($left));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_suggestion', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BucketSuggestion $bucketSuggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BucketSuggestion $bucketSuggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBucketSuggestionRequest $request, BucketSuggestion $bucketSuggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BucketSuggestion $bucketSuggestion)
    {
        //
    }
}
