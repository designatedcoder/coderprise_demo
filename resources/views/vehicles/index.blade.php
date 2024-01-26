@php
    $hasVehicles = $vehicles->count();
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="flex font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Vehicles:
                    <p class="ml-3">
                        {{ $vehicleCount }}
                    </p>
                </h2>
                <a href="#" class="text-gray-50 bg-blue-600 px-4 py-2 rounded uppercase tracking-widest hover:bg-blue-500">
                    Create a Vehicle
                </a>
            </div>
        </div>
    </x-slot>

    <div class="flex flex-col sm:flex-row">
        <!-- Page Content -->
        <main class="w-full">
            <div class="sm:py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @session('success')
                        <div class="text-center text-2xl bg-green-400 text-green-800 mb-4 py-6 rounded italic">
                            success message
                        </div>
                    @endsession
                    <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                @class([
                                    'space-y-6 md:grid md:grid-cols-2 md:gap-6 md:space-y-0 lg:grid-cols-3' => $hasVehicles,
                                    'text-center text-2xl italics' => !$hasVehicles
                                ])
                            >
                                @forelse ($vehicles as $vehicle)
                                    <div class="border border-gray-300 rounded">
                                        <div class="h-80 relative">
                                            <img src="http://images.unsplash.com/photo-{{ $vehicle->image }}" alt="" class="h-full w-full object-cover">
                                            <p class="text-2xl text-gray-200 absolute bottom-6 left-4">{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</p>
                                        </div>
                                        <div class="flex flex-col space-y-4 px-4 py-4">
                                            <div class="flex justify-between">
                                                <p>${{ $vehicle->calculatedPrice }} per day</p>
                                                <p>Listed by: Lorem, ipsum.</p>
                                            </div>
                                            <div class="flex justify-between">
                                                <a href="#" class="text-gray-50 bg-orange-300 px-4 py-2 rounded uppercase tracking-widest hover:bg-orange-200">edit</a>
                                                <a href="#" class="text-gray-50 bg-blue-600 px-4 py-2 rounded uppercase tracking-widest hover:bg-blue-500">explore</a>
                                            </div>
                                            <div>
                                                <p>{{ $vehicle->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="flex justify-center space-x-6">
                                        <img src="{{ asset('/storage/images/defaults/car-158795_1280.png') }}" class="h-9 w-auto">
                                        <p>
                                            No vehicles yet!
                                        </p>
                                        <img src="{{ asset('/storage/images/defaults/car-158795_1280.png') }}" class="h-9 w-auto">
                                    </div>

                                @endforelse
                            </div>

                            @if ($vehicles->count())
                                <div class="mt-6">
                                    {{ $vehicles->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
