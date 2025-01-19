<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamCollection;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Team::class);

        // $page = $request->has('page') ? $request->query('page') : 1;

        // $teams = Cache::remember("teams_$page", 60 * 60 * 24, function () {
        //     return Team::with('creator')->select('id','name', 'created_by', 'status', 'created_at')->paginate(8);
        // });

        $teams = Team::with('creator')->paginate(8);

        return view('pages.company.teams.teams', ['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Team::class);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Team::class);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        Gate::authorize('view', $team);
        $team = $team->with(['creator', 'members', 'projects'])->first(['id', 'name', 'created_by', 'status', 'created_at']);
        return view('pages.company.teams.team', ['team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        Gate::authorize('update', $team);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        Gate::authorize('update', $team);
        $team->status = $request->has('status') ? 1 : 0;
        $team->name = $request->has('name') ? $request->name : $team->name;
        $team->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        Gate::authorize('delete', $team);
        //
    }
}
