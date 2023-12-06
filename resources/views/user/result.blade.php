<link rel="stylesheet" href="{{ asset('path/to/styles.css') }}">

<x-app-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('sweetalert::alert')
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4">ID</th>
                                <th scope="col" class="px-4 py-3">Name Kandidate</th>
                                <th scope="col" class="px-4 py-3">Total Value</th>
                                <th scope="col" class="px-4 py-3">Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $result->id }}</th>
                                    <td class="px-4 py-3">{{ $result->alternative->name }}</td>
                                    <td class="px-4 py-3">{{ $result->total_value }}</td>
                                    <td class="px-4 py-3">{{ $result->ranking }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->

    @extends('components.footer-tailwind')
    @section('contentnav')

    @endsection
</x-app-layout>
