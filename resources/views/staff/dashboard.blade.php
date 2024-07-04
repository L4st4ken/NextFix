<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('staff.movie') }}" class="ms-3">Movies</a>
                    <a href="{{ route('staff.booking') }}" class="ms-3">Bookings</a>
                    <a href="{{ route('staff.ticket') }}" class="ms-3">Tickets</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>