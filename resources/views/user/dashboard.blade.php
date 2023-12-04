<x-app-layout>
{{-- ---------------------------SECTION 1--------------------------------- --}}
<main class="bg-white">
    <section class="bg-white">
        <div class="grid max-w-screen-xl px-4 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
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

{{-- ---------------------------SECTION 2--------------------------------- --}}
    
    <section class="text-gray-100 body-font">
        <div  class="container px-5 py-24 mx-auto">
            <div class="container mx-auto md:p-14 justify-between p-5 bg-indigo-700 rounded-3xl">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="sm:text-5xl font-sans text-2xl font-medium title-font mb-4 text-white">Procedures for Filling Out the Form</h1>
                    <p class="lg:w-2/3 mx-auto font-sans leading-relaxed text-base">Filling out the UI/UX Design candidate determination form using the SAW method involves evaluating and ranking based on specific criteria in a systematic manner.</p>
                </div>
                
                <div class="flex flex-wrap -mx-4 -my-8">
                    <div class="py-8 px-4 lg:w-1/3">
                      <div class="h-full flex items-start">
                        <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                            <img alt="blog" src="{{ asset('assets/src/one.svg') }}">
                        </div>
                        <div class="flex-grow pl-6">
                          <h1 class="title-font text-2xl font-medium text-gray-50 mb-3">Determining Selection Criteria</h1>
                          <p class="leading-relaxed mb-5">Identifying key factors to assess UI/UX Design candidates, establishing essential evaluation parameters.</p>
                        </div>
                      </div>
                    </div>
                    <div class="py-8 px-4 lg:w-1/3">
                        <div class="h-full flex items-start">
                          <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                              <img alt="blog" src="{{ asset('assets/src/two.svg') }}">
                          </div>
                          <div class="flex-grow pl-6">
                            <h1 class="title-font text-2xl font-medium text-gray-50 mb-3">Criteria Weighting</h1>
                            <p class="leading-relaxed mb-5">Weighting criteria is the process of assigning importance levels to each selection criterion. This step prioritizes the significance of different factors.</p>
                          </div>
                        </div>
                      </div>
                      <div class="py-8 px-4 lg:w-1/3">
                        <div class="h-full flex items-start">
                          <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                              <img alt="blog" src="{{ asset('assets/src/tree.svg') }}">
                          </div>
                          <div class="flex-grow pl-6">
                            <h1 class="title-font text-2xl font-medium text-gray-50 mb-3">Candidate Data Collection</h1>
                            <p class="leading-relaxed mb-5">Collecting comprehensive, relevant data on UI/UX Design applicants systematically based on established, prioritized, and weighted criteria.</p>
                          </div>
                        </div>
                      </div>

                  </div>

            </div>
        </div>
      </section>

{{-- ---------------------------SECTION 2--------------------------------- --}}

    {{-- <section class="text-gray-600 body-font">
        <div  class="container px-5 py-12 mx-auto">
            <div class="container mx-auto md:p-14 justify-between p-5 bg-indigo-700 rounded-3xl">
                <div class="flex flex-wrap -m-4 items-center">
                  <div class="p-4 lg:w-4/6">
                    <h1 class="title-font sm:text-5xl leading-10 text-2xl font-bold text-white">Congratulations to <span class="text-orange-400 leading-10"> Yulia Citra </span></h1>
                    <p class="max-w-2xl mt-6 font-light text-gray-100 leading-relaxed lg:mb-6 md:text-lg lg:text-xl dark:text-gray-400">Through calculations that we have conducted, the candidate is deemed the best in calculations using the Simple Additive Weighting (SAW) method. This decision is based on a comprehensive evaluation compared to other candidates.</p>
                  </div>
                  <div class="p-4 lg:w-2/6">
                    <div class="lg:max-w-lg mt-10 lg:w-full lg:mt-0 lg:col-span-5 lg:flex">
                        <img src="{{ asset('assets/src/celebration.svg') }}" alt="mockup">
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </section> --}}

 </main>
    @extends('components.footer-tailwind')
    @section('contentnavuser')

    @endsection
</x-app-layout>
