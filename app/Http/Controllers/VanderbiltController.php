<?php

namespace App\Http\Controllers;

use App\Models\Vanderbilt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VanderbiltController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $vanderbilt = Vanderbilt::orderBy('id', 'asc')
               ->take(30)
               ->get();
               
        
        return view('vanderbilt.index', [
            'phpProjects' => $vanderbilt,
        ]);


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
        //Removes old records
        Vanderbilt::truncate();
        $phpProjects = Http::withHeaders([
            'Authorization' => config('services.github'),
            'Accept' => 'application/vnd.github+json'
        ])->get('https://api.github.com/search/repositories?q=php+language:php&sort=stars&order=desc')->json();

        foreach ($phpProjects['items'] as $phprepo) {
            $input = [
                'name' => $phprepo['full_name'],
                'description' => $phprepo['description'],
                'number_stars' => $phprepo['stargazers_count'],
                'url' => $phprepo['html_url'],
                'ghproject_id' => $phprepo['id']
            ];
            Vanderbilt::create($input);
        }

        return redirect(route('vanderbilt.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vanderbilt  $vanderbilt
     * @return \Illuminate\Http\Response
     */
    public function show(Vanderbilt $vanderbilt)
    {

            return view('vanderbilt.project', [
                'phpProjects' => Vanderbilt::find($vanderbilt)
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vanderbilt  $vanderbilt
     * @return \Illuminate\Http\Response
     */
    public function edit(Vanderbilt $vanderbilt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vanderbilt  $vanderbilt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vanderbilt $vanderbilt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vanderbilt  $vanderbilt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vanderbilt $vanderbilt)
    {
        //
    }
}
