@extends('components.userfooternav-tailwind')
@section('contentnav')
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 text-center md:text-start py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl font-sans mb-4 lg:mb-12 text-4xl font-bold leading-relaxed md:text-5xl xl:text-6xl dark:text-white">Build decisions to select the best candidates</h1>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-full bg-gray-900 hover:bg-primary-800 focus:ring-4 focus:ring-gray-500 dark:focus:ring-indigo-700">
                Start Counting Now
            </a>
        </div>
        <div class="lg:max-w-lg lg:w-full lg:mt-0 lg:col-span-5 lg:flex">
            <img src="{{ asset('assets/src/welcome.svg') }}" alt="mockup">
        </div>                
    </div>
</section>

@endsection