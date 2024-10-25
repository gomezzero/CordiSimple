@extends('layouts.personal')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Editar el evento</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <form action="{{ route('events.update', $event->id) }}" method="POST" class="px-8 py-8">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">nombre del evento:</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('name', $event->name) }}" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-bold mb-2">nombre:</label>
                    <textarea name="name" id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('name', $event->name) }}</textarea>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Descripcion:</label>
                    <textarea name="description" id="description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('description', $event->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="date" class="block text-gray-700 font-bold mb-2">Dia:</label>
                    <textarea name="date" id="date"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('date', $event->date) }}</textarea>
                    @error('date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="time" class="block text-gray-700 font-bold mb-2">Hora:</label>
                    <textarea name="time" id="time"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('time', $event->time) }}</textarea>
                    @error('time')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="location" class="block text-gray-700 font-bold mb-2">Lugar:</label>
                    <textarea name="location" id="location"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('location', $event->location) }}</textarea>
                    @error('location')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="max_capacity" class="block text-gray-700 font-bold mb-2">Capacidad maxima:</label>
                    <textarea name="max_capacity" id="max_capacity"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('max_capacity', $event->max_capacity) }}</textarea>
                    @error('max_capacity')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="availableSports" class="block text-gray-700 font-bold mb-2">Lugares disponibles:</label>
                    <textarea name="availableSports" id="availableSports"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('availableSports', $event->availableSports) }}</textarea>
                    @error('availableSports')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
                    <textarea name="status" id="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('status', $event->status) }}</textarea>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('events.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancelar</a>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar evento</button>
                </div>
            </form>
        </div>
    </div>
@endsection
