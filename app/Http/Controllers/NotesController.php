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
    public function index()
    {
        //
        return Inertia::render('Notes/index', [
            'notes' => Notes::latest()->get()
        ]);
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
        //
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
        return Inertia::render('Notes/Edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notes $notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $notes)
    {
        //
    }
}
