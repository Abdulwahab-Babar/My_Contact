<!-- resources/views/contacts/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Your Contacts</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($contacts->isEmpty())
            <p>No contacts found. 
                <a href="{{ route('contacts.create') }}" class="text-blue-500 underline">Add one</a>.
            </p>
        @else
            <ul class="space-y-3">
                @foreach($contacts as $contact)
                    <li class="p-4 border rounded shadow-sm">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-xl font-semibold">{{ $contact->name }}</h3>
                                <p>Email: {{ $contact->email }}</p>
                                <p>Phone: {{ $contact->phone }}</p>
                            </div>
                            <div class="space-x-2">
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="text-blue-500 underline">Edit</a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500 underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
