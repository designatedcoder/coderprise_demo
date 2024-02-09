<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">
            {{ $vehicle->year }}
            {{ $vehicle->make }}
            {{ $vehicle->model }}
        </h2>
    </x-slot>

    <div class="flex flex-col sm:flex-row">
        <!-- Page Content -->
        <main class="w-full">
            <div class="sm:py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @session('success')
                        <div class="text-center text-2xl bg-green-400 text-green-800 mb-4 py-6 rounded italic">
                            {{ $value }}
                        </div>
                    @endsession
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="border border-gray-300 rounded">
                                <div class="h-128 relative">
                                    <img src="{{ $vehicle->customImage }}" alt="" class="w-full h-full object-cover">

                                    <p class="text-2xl text-gray-200 absolute bottom-6 left-4">
                                        {{ $vehicle->year }}
                                        {{ $vehicle->make }}
                                        {{ $vehicle->model }}
                                    </p>
                                </div>
                                <div class="flex flex-col space-y-4 px-4 py-4">
                                    <div class="flex justify-between">
                                        <p>${{ $vehicle->calculatedPrice }} per day</p>
                                        <p>Listed by: Lorem, ipsum.</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="flex space-x-6">
                                            <a href="#" class="text-gray-50 bg-orange-300 px-4 py-2 rounded uppercase tracking-widest hover:bg-orange-200">edit</a>
                                            <form>
                                                <button type="submit" class="text-gray-50 bg-red-600 px-4 py-2 rounded uppercase tracking-widest hover:bg-red-500">Delete</button>
                                            </form>
                                        </div>
                                        <a href="{{ route('vehicles.index') }}" class="text-gray-50 bg-blue-600 px-4 py-2 rounded uppercase tracking-widest hover:bg-blue-500">Back to vehicles</a>
                                    </div>
                                    <div>
                                        <p>
                                            {{ $vehicle->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
