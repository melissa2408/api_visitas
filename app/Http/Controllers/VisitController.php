<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
    }

    public function index() {
        return Visit::all()->load('user');
    }

    public function store(Request $request) {

        $user = auth()->user();

        $visit = new Visit([
            'name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
            'persons' => $request->persons,
            'user_id' => $user->id
        ]);

        $visit->save();

        return response()->json($visit, 201);
    }

    public function show(Visit $visit) {
        
        return $visit;
    }

    public function update(Request $request, Visit $visit) {

        $user = auth()->user();

        $visit->update([
            'name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
            'persons' => $request->persons,
            'user_id' => $user->id
        ]);

        return response()->json($visit);
    }

    public function destroy(Visit $visit) {

        $visit->delete();

        return response()->json(null, 204);
    }
}
