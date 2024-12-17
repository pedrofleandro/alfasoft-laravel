<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']); 
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:6',
            'contact' => 'required|digits:9|unique:contacts,contact',
            'email' => 'required|email|unique:contacts,email',
        ]);

        Contact::create([
            'name' => $validated['name'],
            'contact' => $validated['contact'],
            'email' => $validated['email'],
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contato adicionado com sucesso!');
    }
    
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:6',
            'contact' => 'required|digits:9|unique:contacts,contact,' . $id,
            'email' => 'required|email|unique:contacts,email,' . $id,
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validated);

        return redirect()->route('contacts.show', $contact->id)->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contato excluído com sucesso!');
    }
}
