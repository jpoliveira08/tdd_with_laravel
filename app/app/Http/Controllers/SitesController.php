<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Site;

class SitesController extends Controller
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
    public function store(StoreSiteRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'url' => ['required', 'string']
        ]);

        $site = auth()->user()->sites()->create([
            'name' => request('name'),
            'url' => request('url')
        ]);

        return redirect()->route('sites.show', $site);
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        /**
         * Compacts basically turns a variable into an array, ['site' => $site]
         */
        return view('sites.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiteRequest $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }
}
