<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200">
    <!------Navbar------->
    <nav class=" bg-white w-full flex relative justify-between items-center mx-auto px-8 h-20">
        <!-- logo -->
        <div class="inline-flex">
            <img src="{{ URL::to('img/itmind.png') }}" width="75" height="75" alt="" class="animate-pulse">
                <div class="block md:hidden">
                    <svg width="30" height="32" fill="currentcolor" style="display: block">
                        <path d="M29.24 22.68c-.16-.39-.31-.8-.47-1.15l-.74-1.67-.03-.03c-2.2-4.8-4.55-9.68-7.04-14.48l-.1-.2c-.25-.47-.5-.99-.76-1.47-.32-.57-.63-1.18-1.14-1.76a5.3 5.3 0 00-8.2 0c-.47.58-.82 1.19-1.14 1.76-.25.52-.5 1.03-.76 1.5l-.1.2c-2.45 4.8-4.84 9.68-7.04 14.48l-.06.06c-.22.52-.48 1.06-.73 1.64-.16.35-.32.73-.48 1.15a6.8 6.8 0 007.2 9.23 8.38 8.38 0 003.18-1.1c1.3-.73 2.55-1.79 3.95-3.32 1.4 1.53 2.68 2.59 3.95 3.33A8.38 8.38 0 0022.75 32a6.79 6.79 0 006.75-5.83 5.94 5.94 0 00-.26-3.5zm-14.36 1.66c-1.72-2.2-2.84-4.22-3.22-5.95a5.2 5.2 0 01-.1-1.96c.07-.51.26-.96.52-1.34.6-.87 1.65-1.41 2.8-1.41a3.3 3.3 0 012.8 1.4c.26.4.45.84.51 1.35.1.58.06 1.25-.1 1.96-.38 1.7-1.5 3.74-3.21 5.95zm12.74 1.48a4.76 4.76 0 01-2.9 3.75c-.76.32-1.6.41-2.42.32-.8-.1-1.6-.36-2.42-.84a15.64 15.64 0 01-3.63-3.1c2.1-2.6 3.37-4.97 3.85-7.08.23-1 .26-1.9.16-2.73a5.53 5.53 0 00-.86-2.2 5.36 5.36 0 00-4.49-2.28c-1.85 0-3.5.86-4.5 2.27a5.18 5.18 0 00-.85 2.21c-.13.84-.1 1.77.16 2.73.48 2.11 1.78 4.51 3.85 7.1a14.33 14.33 0 01-3.63 3.12c-.83.48-1.62.73-2.42.83a4.76 4.76 0 01-5.32-4.07c-.1-.8-.03-1.6.29-2.5.1-.32.25-.64.41-1.02.22-.52.48-1.06.73-1.6l.04-.07c2.16-4.77 4.52-9.64 6.97-14.41l.1-.2c.25-.48.5-.99.76-1.47.26-.51.54-1 .9-1.4a3.32 3.32 0 015.09 0c.35.4.64.89.9 1.4.25.48.5 1 .76 1.47l.1.2c2.44 4.77 4.8 9.64 7 14.41l.03.03c.26.52.48 1.1.73 1.6.16.39.32.7.42 1.03.19.9.29 1.7.19 2.5z"></path>
                    </svg>
            </div>
        </div>

        <!-- end logo -->

        <!-- search bar -->
        <div class="hidden sm:block flex-shrink flex-grow-0 justify-start px-2">
            <span class="text-2xl font-semibold text-blue-500">iTmind</span>
        </div>
        <!-- end search bar -->

        <!-- login -->
        <div class="flex-initial">
            <div class="flex justify-end items-center relative">
                <div class="flex mr-4 items-center">
                    <a class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full" href="{{route('register')}}">
                        <div class="flex items-center relative cursor-pointer whitespace-nowrap">Become a host</div>
                    </a>
                </div>

                <div class="block">
                    <div class="inline relative">
                        <a href="{{url ('login')}}">
                            <button type="button" class="inline-flex items-center relative px-2 border rounded-full hover:shadow-lg">   
                                @if (Auth::user()) 
                                    <p class="-mr-3 ml-1">{{Auth::user()->name}}</p>
                                @else
                                    <p>Login</p>
                                @endif 
                                    <div class="block flex-grow-0 flex-shrink-0 h-10 w-12 pl-5">
                                        <svg
                                            viewBox="0 0 32 32"
                                            xmlns="http://www.w3.org/2000/svg"
                                            aria-hidden="true"
                                            role="presentation"
                                            focusable="false"
                                            style="display: block; height: 100%; width: 100%; fill: currentcolor;"
                                            >
                                            <path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z"></path>
                                        </svg>
                                    </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end login -->
    </nav>
    <!-----End Navbar----->

    <!--------Branding---->
    <div class="bg-blue-100 h-12 flex items-center justify-center">
        <p class="text-center font-bold">
            <span class="text-blue-500">Uang Anda akan aman sampai pekerjaan disetujui</span>
            <span>Layanan aman dan bebas repot</span>
        </p>
    </div>
    <!-----End Branding---->

    <!--------Card------>   
    <div class="p-8 flex items-center justify-center gap-10">
        <div class="bg-white rounded-lg overflow-hidden shadow-2xl lg:md-1/4 md:w-1/4 sm:w-1/4 hover:scale-105 transition duration-300">
            <a href="{{url('form/rekomen/add')}}">
                <img class="h-48 w-full object-cover object-end" src="{{asset('img/card/konsul-free.jpg')}}" alt="Home in Countryside" />
                <div class="px-6 py-4">
                    <div class="flex items-baseline">
                        <span class="inline-block bg-teal-200 text-teal-800 py-1 px-4 text-xs rounded-full uppercase font-semibold tracking-wide">New</span>
                        <div class="ml-2 text-yellow-500 text-sm font-semibold tracking-wide">
                            Rekomendasi
                        </div>
                    </div>
                    <h4 class="mt-3 mb-2 font-semibold text-lg leading-tight uppercase truncate">Konsultasi Gratis</h4>
                    <span class="text-lg text-red-500 block">Rp. 0</span>
                    <span class="text-gray-700 text-xs line-through">Rp. 1.000.000</span>
                </div>
                <div class="flex items-center -mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 mb-1" width="20" height="20" viewBox="0 0 17 17"><path fill="#000" d="M5.5 7a2.5 2.5 0 1 0 0-5a2.5 2.5 0 0 0 0 5m8-2c0 .445-.145.856-.39 1.188a2.9 2.9 0 0 0-1.007.653l-.094.094A2.003 2.003 0 0 1 9.5 5a2 2 0 1 1 4 0m-6.226 6.67l2.225-2.225A1.5 1.5 0 0 0 8 8H3a1.5 1.5 0 0 0-1.5 1.5v.075s0 2.925 4 2.925c.462 0 .87-.039 1.232-.108q.218-.398.542-.722m.706.707l4.83-4.83a1.87 1.87 0 1 1 2.644 2.646l-4.83 4.829a2.2 2.2 0 0 1-1.02.578l-1.498.374a.89.89 0 0 1-1.079-1.078l.375-1.498a2.2 2.2 0 0 1 .578-1.02"/></svg>
                    <span class="ml-2 mb-2 text-gray-600 text-sm font-bold">{{$countForm_rekomen}} </span><span class="ml-1 mb-2 text-gray-600 text-sm">Pengguna</span>
                </div>
            </a>
        </div>
        
        <div class="bg-white rounded-lg overflow-hidden shadow-2xl lg:w-1/4 md:w-1/4 hover:scale-105 transition duration-300">
            <a href="{{url('produk')}}">
                <img class="h-48 w-full object-cover object-end" src="{{asset('img/card/konsul-pay.jpg')}}" alt="Home in Countryside" />
                <div class="px-6 py-4">
                    <div class="flex items-baseline">
                        <span class="inline-block bg-teal-200 text-teal-800 py-1 px-4 text-xs rounded-full uppercase font-semibold tracking-wide">New</span>
                        <div class="ml-2 text-yellow-500 text-sm font-semibold tracking-wide">
                            Bersama Ahli
                        </div>
                    </div>
                    <h4 class="mt-3 mb-2 font-semibold text-lg leading-tight uppercase truncate">Konsultasi Berbayar</h4>
                    <span class="text-lg text-red-500 block">Rp. 2.500.000</span>
                    <span class="text-gray-700 text-xs line-through">Rp. 5.000.000</span>
                </div>
                <div class="flex items-center -mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 mb-1.5 -mr-1" width="17" height="17" viewBox="0 0 48 48"><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24 20a7 7 0 1 0 0-14a7 7 0 0 0 0 14M6 40.8V42h36v-1.2c0-4.48 0-6.72-.872-8.432a8 8 0 0 0-3.496-3.496C35.92 28 33.68 28 29.2 28H18.8c-4.48 0-6.72 0-8.432.872a8 8 0 0 0-3.496 3.496C6 34.08 6 36.32 6 40.8"/></svg>
                    <span class="ml-2 mb-2 text-gray-600 text-sm font-bold">{{$countIdentitas}} </span><span class="ml-1 mb-2 text-gray-600 text-sm">Klien</span>
                </div>
            </a>
        </div>
    </div>
    <!--------End Card--->
</body>
</html>