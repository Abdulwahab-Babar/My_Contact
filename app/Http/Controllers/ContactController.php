<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // Get all contacts for the logged-in user
        $contacts = Contact::where('user_id', auth()->id())->get();
        return view('contacts.index', compact('contacts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
    ]);

    // Create contact for authenticated user
    auth()->user()->contacts()->create($validated);

    return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
{
    // Ensure only the owner can edit
    if ($contact->user_id !== auth()->id()) {
        abort(403);
    }

    return view('contacts.edit', compact('contact'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
{
    if ($contact->user_id !== auth()->id()) {
        abort(403);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
    ]);

    $contact->update($validated);

    return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            abort(403);
        }
    
        $contact->delete();
    
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
    

}
