<?php

namespace App\Http\Controllers;

use App\Models\Notepad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotepadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Notepad::all();
        return view('view', ['notepads' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $notes = $request->validate([
            'notename' => 'nullable|string',
            'description'=> 'string|nullable',
            'content' => 'string|nullable|max:10000'
        ]);

        Notepad::create($notes);
        return redirect(route('notepads.view'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Notepad $notepad)
    {
        return view('show', ['notepad'=> $notepad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notepad $notepad)
    {
        return view('edit', ['notepad' => $notepad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notepad $notepad)
    {
        $notes = $request->validate([
            'notename' => 'nullable|string',
            'description'=> 'string|nullable',
            'content' => 'string|nullable|max:10000'
        ]);

        $notepad->update($notes);
        return redirect(route('notepads.view'))->with('success', 'Notes updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notepad $notepad)
    {
        $notepad->delete();

        $notes = Notepad::orderBy('id')->get();
        $id = 1;
        foreach ($notes as $note) {
            $note->id = $id;
            $note->save();
            $id++;
        }

        DB::statement('ALTER TABLE notepads AUTO_INCREMENT = ' . ($id));
        return redirect()->back()->with('success', 'Deleted');
    }

}