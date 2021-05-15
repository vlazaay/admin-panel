<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\DB;

class PositionController extends Controller
{
    public function index()
    {
        //$data = DB::table('position')->get();
        $positions = Position::all();
        return view('position', compact('positions'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $admin_id = Auth::id();
        //dd($admin_id);
        $request->request->add(['admin_created_id' => $admin_id, 'admin_updated_id' => $admin_id]);
        Position::create($request->only('name', 'admin_created_id', 'admin_updated_id'));
        return redirect()->route('positions.index');
    }

    public function edit(Position $position)
    {
        return view('form', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $admin_id = Auth::id();
        $request->request->add(['admin_updated_id' => $admin_id]);
        $position->update($request->only('name', 'admin_updated_id'));
        return redirect()->route('positions.index');

    }
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index');
    }
}
