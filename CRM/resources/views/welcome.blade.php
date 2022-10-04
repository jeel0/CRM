<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <div class="font-sansantialiased h-screen">
        <!-- <div class="bg-gradient-to-r from-blue-400 via-cyan-200 to-indigo-400 py-6 sm:py-8 lg:py-12 h-full ">
            <div class="max-w-screen-md p-4 md:px-8 mx-auto">
                <div class="bg-white lg:py-12 rounded-md lg:mt-12 drop-shadow-lg">
                    <div class="flex max-w-screen-2xl px-4 md:px-8 mx-auto">
                        <a href="/" class="inline-flex items-center" aria-label="logo">
                            <div class="flex justify-center items-end">
                                <img class="w-auto h-20" src="{{ asset('img/LogoTest.png') }}"></img>
                                <p class="text-5xl text-[#7c4b8f] font-bold font-mono">Quad</p>
                            </div>
                        </a>
                        <div class="max-w-xl flex flex-col items-center text-center mx-auto gap-6">
                            <p class="text-[#7c4b8f] text-4xl font-extrabold mb-4 md:mb-6 uppercase">Welcome</p>

                            <h2 class="text-gray-700 text-3xl font-semibold mb-12">Please login to continue</h2>

                            <div class="w-full flex flex-col sm:flex-row sm:justify-center gap-2.5">
                                <a href="{{ url('/dashboard') }}" class="w-full text-center justify-center bg-cyan-600 hover:bg-cyan-700 active:bg-cyan-700 focus-visible:ring ring-blue-500 text-white text-sm md:text-base font-semibold rounded-md outline-none transition duration-100 px-8 py-3">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="bg-gradient-to-r from-blue-400 via-cyan-200 to-indigo-400 py-6 sm:py-8 lg:py-12 h-full ">
            <div class="max-w-screen-lg px-4 md:px-8 mx-auto">
                <div class="md:h-80 flex flex-col sm:flex-row bg-gray-200 rounded-lg overflow-hidden">
                    <!-- image - start -->
                    <div class="w-full sm:w-1/2 lg:w-2/5 h-48 sm:h-auto order-first sm:order-none bg-white">
                        <a href="/" class="h-full flex justify-center items-center" aria-label="logo">
                            <div class="flex justify-center items-end">
                                <img class="w-auto h-24" src="{{ asset('img/LogoTest.png') }}"></img>
                                <p class="text-6xl text-[#7c4b8f] font-bold font-mono">Quad</p>
                            </div>
                        </a>
                    </div>
                    <!-- image - end -->
                    <!-- content - start -->
                    <div class="w-full sm:w-1/2 lg:w-3/5 flex flex-col p-4 sm:p-8">
                        <h2 class="text-gray-800 text-xl md:text-2xl lg:text-4xl font-bold mb-4">Welcome,</h2>
                        <p class="max-w-md text-gray-600 mb-8 text-lg">Please Login to continue to the CRM.</p>
                        <div class="mt-auto">
                            <a href="{{ url('/dashboard') }}" class="w-full text-center justify-center bg-cyan-600 hover:bg-cyan-700 active:bg-cyan-700 focus-visible:ring ring-blue-500 text-white text-sm md:text-base font-semibold rounded-md outline-none transition duration-100 px-8 py-3">Login</a>
                        </div>
                    </div>
                    <!-- content - end -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>