<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">
            Create a Vehicle
        </h2>
    </x-slot>

    <div class="flex flex-col sm:flex-row">
        <!-- Page Content -->
        <main class="w-full">
            <div class="sm:py-12">
                <div class="max-w-2xl bg-white dark:bg-gray-800 mx-auto mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg sm:px-6 lg:px-8">
                    <form method="POST" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Make, Model -->
                        <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-3 md:space-x-6">
                            <div class="sm:w-1/2">
                                <x-input-label for="make" :value="__('Make')" />
                                <x-text-input id="make" type="text" name="make" autofocus autocomplete="make" class="block mt-1 w-full" value="{{ old('make') }}" />
                                <x-input-error :messages="$errors->get('make')" />
                            </div>
                            <div class="sm:w-1/2">
                                <x-input-label for="model" :value="__('Model')" />
                                <x-text-input id="model" type="text" name="model" autofocus autocomplete="model" class="block mt-1 w-full" value="{{ old('model') }}"/>
                                <x-input-error :messages="$errors->get('model')" />
                            </div>
                        </div>
                        <!-- Price, Year -->
                        <div class="flex flex-col space-y-3 mt-3 sm:flex-row sm:space-y-0 sm:space-x-3 md:space-x-6">
                            <div class="sm:w-1/2">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" type="number" name="price" autofocus autocomplete="price" class="block mt-1 w-full" value="{{ old('price') }}"/>
                                <x-input-error :messages="$errors->get('price')" />
                            </div>
                            <div class="sm:w-1/2">
                                <x-input-label for="year" :value="__('Year')" />
                                <x-text-input id="year" type="number" name="year" autofocus autocomplete="year" class="block mt-1 w-full" value="{{ old('year') }}"/>
                                <x-input-error :messages="$errors->get('year')" />
                            </div>
                        </div>
                        <!-- Image -->
                        <div class="flex flex-col mt-3 space-y-3 sm:flex-row sm:space-y-0 sm:space-x-3 md:space-x-6 dark:text-gray-50" x-data="{
                            imgSrc: `{{ $vehicle->customImage }}`,
                            previewFile() {
                                const file = this.$refs.imgFile.files[0];
                                const reader = new FileReader();
                                reader.onload = (e) => this.imgSrc = e.target.result;
                                reader.readAsDataURL(file);
                            }
                        }">
                            <div class="sm:w-1/2">
                                <x-input-label for="image" :value="__('Image')" />
                                <x-custom.file-input name="image" id="image" value="{{ old('image') }}" accept="image/*" x-ref="imgFile" @change="previewFile" class="w-full" />
                                <x-input-error :messages="$errors->get('image')" />
                            </div>
                            <div class="sm:w-1/2">
                                <div class="w-full h-72">
                                    <img x-bind:src="imgSrc" alt="" class="w-full h-full object-cover rounded">
                                </div>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="mt-3">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-custom.text-area-input name="description" id="description" cols="30" rows="5" class="block mt-1 w-full">{{ old('description') }}</x-custom.text-area-input>
                            <x-input-error :messages="$errors->get('description')" />
                        </div>

                        <div class="flex justify-between mt-6">
                            <a href="{{ route('vehicles.index') }}" class="text-gray-50 bg-red-600 px-4 py-2 rounded uppercase tracking-widest hover:bg-red-500">Cancel</a>

                            <button type="submit" class="text-gray-50 bg-blue-600 px-4 py-2 rounded uppercase tracking-widest hover:bg-blue-500 disabled:opacity-50">
                                Create a Vehicle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
