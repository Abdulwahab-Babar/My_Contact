@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Edit Contact</h2>

    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name', $contact->name) }}" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $contact->email) }}" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Address</label>
            <input type="text" name="address" value="{{ old('address', $contact->address) }}" required class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
