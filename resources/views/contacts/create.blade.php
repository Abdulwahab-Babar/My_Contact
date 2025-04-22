@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6">Add New Contact</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 border rounded" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="phone" class="block font-medium">Phone</label>
            <input type="text" name="phone" id="phone" class="w-full p-2 border rounded" value="{{ old('phone') }}" required>
        </div>

        <div>
            <label for="address" class="block font-medium">Address</label>
            <input type="text" name="address" id="address" class="w-full p-2 border rounded" value="{{ old('address') }}" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Contact</button>
    </form>
</div>
@endsection
