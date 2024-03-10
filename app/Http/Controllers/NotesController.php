<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        return Inertia::render('Notes/index', [
            'notes' => Notes::latest()
            ->where('excerpt', 'LIKE', "%$request->q%")
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Notes/Create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
                //dd($request);
                $request->validate([
                    'excerpt' => 'required',
                    'content' => 'required',
                ]);
        
                $note = Notes::create($request->all());
                //Esta es mas rapido
                return redirect()->route('notes.edit', $note->id)->with('status', '🔥 Nota Creada');;


    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $note)
    {
        //
        //dd($note);
        return Inertia::render('Notes/Show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $note)
    {
        //
        //dd($note);
        return Inertia::render('Notes/Edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notes $note)
    {
        //
        //dd($note);
        $request->validate([
            'excerpt' => 'required',
            'content' => 'required',
        ]);

        $note->update($request->all());
        //Esta es mas rapido
        return redirect()->route('notes.index')->with('status', '🔥 Nota Actualizada');;
        //Que esta
        //return Inertia::location('/inertia/public/notes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $note)
    {
        //
        $note->delete();

        return redirect()->route('notes.index')->with('status', '🔥 Nota Eliminada');
    }
}
