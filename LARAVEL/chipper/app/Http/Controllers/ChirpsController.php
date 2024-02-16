<?php

namespace App\Http\Controllers;

use App\Models\Chirps;
use Illuminate\Http\Request;
use Illuminate\View\View; 
use Illuminate\Http\RedirectResponse;


class ChirpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('chirps.index', [
            'chirps' => Chirps::with('user')->latest()->get(), // en la variable chirps guarda todos ordenados por fecha descendente y damelos
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
    public function store(Request $request):  RedirectResponse 
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            ]);
            $request->user()->chirps()->create($validated);
            return redirect(route('chirps.index')); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirps $chirps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirps $chirp): View
    {
    //
    // $this->authorize('update', $chirp);
    return view('chirps.edit', [
    'chirp' => $chirp,
    ]);
    }
    public function update(Request $request, Chirps $chirp): RedirectResponse
    {
    //
    // $this->authorize('update', $chirp);
    $validated = $request->validate([
    'message' => 'required|string|max:255',
    ]);
    $chirp->update($validated);
    return redirect(route('chirps.index'));
    } 
    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirps $chirp): RedirectResponse
        {
        // $this->authorize('delete', $chirp); BORRA LA CHIRP Y REDIRIGE
        $chirp->delete();
        return redirect(route('chirps.index'));
        }
}
