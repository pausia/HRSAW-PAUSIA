<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update product</h2>
            <form action="{{ route('bobot.edit', ['id' => $bobot_kriteria->id]) }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="criteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Criteria</label>
                        <input type="text" name="criteria" id="criteria" value="{{ $bobot_kriteria->criteria }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight</label>
                        <input type="number" name="weight" id="weight" value="{{ $bobot_kriteria->weight }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="attribute" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attribute</label>
                        <select name="attribute" id="attribute" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="benefit" {{ $bobot_kriteria->attribute === 'benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="cost" {{ $bobot_kriteria->attribute === 'cost' ? 'selected' : '' }} >Cost</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Update product
                    </button>
                    <!-- Add a cancel button or other actions as needed -->
                </div>
            </form>
            
        </div>
      </section>
        @extends('components.footer-tailwind')
        @section('contentnav')
    
        @endsection
</x-app-layout>
    