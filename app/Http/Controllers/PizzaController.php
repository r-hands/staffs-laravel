<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pizza.index', [
            'pizza' => Pizza::with('user')->latest()->get(),
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->pizza()->create($validated);
 
        return redirect(route('pizza.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pizza $pizza): View
    {
        Gate::authorize('update', $pizza);
 
        return view('pizza.edit', [
            'pizza' => $pizza,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pizza $pizza): RedirectResponse

    {
        Gate::authorize('update', $pizza);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $pizza->update($validated);
 
        return redirect(route('pizza.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza): RedirectResponse
    {
        Gate::authorize('delete', $pizza);
 
        $pizza->delete();
 
        return redirect(route('pizza.index'));
    }
}
