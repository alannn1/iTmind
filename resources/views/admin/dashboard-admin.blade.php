<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hidden { display: none; }
        .active { background-color: #e7eefa; color:black; border-radius: 0.5rem; font-weight: bold; } /* Warna biru gelap untuk elemen aktif */
    </style>
</head>
<body class="h-screen bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-[47vh] bg-white text-black ml-5 mb-3 sticky top-2 rounded-lg" style="height: 96vh; overflow-y: auto;">
            <div class="p-4 text-lg font-bold flex justify-start">
                <img src="{{asset('img/itmind.png')}}" class="object-cover w-12 h-8 ml-3">
                iTmind
            </div>
            <ul class="mt-6 px-2">
                <li id="nav-home">
                    <a href="#" onclick="showContent('home')" class="block pl-5 py-5 text-sm rounded-xl flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 size-5 text-purple-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class=" text-customGray">Home</p>
                    </a>
                </li>
                <li id="nav-konsul">
                    <a href="#" onclick="showContent('konsul')" class="block pl-5 py-5 text-sm rounded-xl flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 size-5 text-orange-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <p class=" text-customGray">Konsul</p>
                    </a>
                </li>
                <li id="nav-riwayat">
                    <a href="#" onclick="showContent('riwayat')" class="block pl-5 py-5 text-sm rounded-xl flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 size-5 text-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                        <p class=" text-customGray">Riwayat</p>
                    </a>
                </li>
                <li id="nav-payment">
                    <a href="#" onclick="showContent('payment')" class="block pl-5 py-5 text-sm rounded-xl flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 size-5 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>
                        <p class="text-customGray">Payment</p>
                    </a>
                </li>
                <li>
                    <p class="text-sm font-bold pl-5 pt-2 text-gray-500">ACCOUNT PAGES</p>
                </li>
                <li>
                    <a href="{{route('profile.admin')}}" onclick="showContent('payment')" class="block pl-5 py-5 text-sm rounded-xl flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-gray-600">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-customGray">Profile</p>
                    </a>
                </li>
                <li class="block pl-1 w-full text-sm rounded-xl flex items-center gap-3 cursor-pointer">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="flex hover:bg-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-red-500 mr-3">
                                <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <div class="p-6">
                
            <!-- Home Page -->
                <div id="home" class="content">
                    <div class="mb-7">
                        <span class="font-semibold text-gray-400 text-sm">Page</span> / <span class="font-semibold text-sm">Home</span>
                        <p class="text-md font-bold">Dashboard</p>
                    </div>
                    <div class="flex gap-5 justify-center mb-3">
                        <div class="w-[35vh] h-[35vh] bg-white rounded-md shadow-lg flex justify-center items-center relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3" width="20" height="20" viewBox="0 0 32 32"><path fill="" d="M6.001 7.5a4.5 4.5 0 0 1 4.5-4.5h15a4.5 4.5 0 0 1 4.5 4.5v10a4.5 4.5 0 0 1-4.5 4.5h-6.309c-.6-1.316-1.876-2.17-3.192-2.422V18a3 3 0 0 1 3-3h5a3 3 0 0 1 3 3v1.5a2.5 2.5 0 0 0 1.001-2v-10a2.5 2.5 0 0 0-2.5-2.5h-15a2.5 2.5 0 0 0-2.5 2.5v.314a6.5 6.5 0 0 0-2 1.062zm9.19 13.5a3 3 0 0 1 2.224 1h-.001a2.55 2.55 0 0 1 .627 1.873c-.135 2.074-.918 3.68-2.403 4.728C14.205 29.612 12.26 30 9.999 30c-2.248 0-4.156-.384-5.566-1.386c-1.458-1.037-2.228-2.619-2.417-4.65C1.853 22.218 3.35 21 4.872 21zm6.309-7a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7M15 14a5 5 0 1 1-10 0a5 5 0 0 1 10 0"/></svg>
                            <p class="text-[4rem] font-normal relative bottom-4 text-blue-600">{{$countIdentitas}}</p>
                            <div class="absolute bottom-10 text-md">
                                Identitas
                            </div>
                        </div>
                        <div class="w-[35vh] h-[35vh] bg-white rounded-md shadow-lg  flex justify-center items-center relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3" width="20" height="20" viewBox="0 0 48 48"><g fill="" stroke="" stroke-linejoin="round" stroke-width="4"><path d="M19 20a7 7 0 1 0 0-14a7 7 0 0 0 0 14Z"/><path stroke-linecap="round" d="M27 28h-8.2c-4.48 0-6.72 0-8.432.872a8 8 0 0 0-3.496 3.496C6 34.08 6 36.32 6 40.8V42h21m13-1l-3.172-3.171M38 35a4 4 0 0 1-1.172 2.828A4 4 0 1 1 38 35"/></g></svg>
                            <p class="text-[4rem] font-normal relative bottom-4 text-blue-600">{{$countStep2}}</p>
                            <div class="absolute bottom-10 text-md">
                                Step2
                            </div>
                        </div>
                        <div class="w-[35vh] h-[35vh] bg-white rounded-md shadow-lg  flex justify-center items-center relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3" width="20" height="20" viewBox="0 0 32 32"><path fill="" d="M10.5 6a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7M5 9.5a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0M23 9a2 2 0 1 0 0 4a2 2 0 0 0 0-4m-4 2a4 4 0 1 1 8 0a4 4 0 0 1-8 0M5 17a3 3 0 0 0-3 3v.226l.003.067q.004.081.018.212c.019.173.056.408.128.686a5.55 5.55 0 0 0 1 2.017C4.319 24.71 6.52 26 10.5 26c2.593 0 4.431-.547 5.72-1.344l2.054-2.071a5.5 5.5 0 0 0 .577-1.394a5 5 0 0 0 .146-.898l.003-.067V20a3 3 0 0 0-3-3zm-1 3.19V20a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v.19q0 .026-.009.094c-.01.09-.031.23-.076.404c-.09.348-.273.818-.641 1.291C15.569 22.883 14.02 24 10.5 24s-5.07-1.117-5.774-2.02a3.6 3.6 0 0 1-.64-1.292A3 3 0 0 1 4 20.19m25.644 1.234l-8.61 8.543a2.8 2.8 0 0 1-1.269.721l-3.02.778a1 1 0 0 1-1.216-1.22l.79-3.05a2.66 2.66 0 0 1 .686-1.206l8.567-8.64a2.88 2.88 0 0 1 4.144.057a2.88 2.88 0 0 1-.072 4.017"/></svg>
                            <p class="text-[4rem] font-normal relative bottom-4 text-blue-600">{{$countPesaing}}</p>
                            <div class="absolute bottom-10 text-md">
                                Analisis Pesaing
                            </div>
                        </div>
                        <div class="w-[35vh] h-[35vh] bg-white rounded-md shadow-lg  flex justify-center items-center relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3" width="20" height="20" viewBox="0 0 20 20"><g fill="" fill-rule="evenodd" clip-rule="evenodd"><path d="M5 9a2 2 0 1 0 0-4a2 2 0 0 0 0 4m0 1a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/><path d="M3.854 8.896a.5.5 0 0 1 0 .708l-.338.337A3.47 3.47 0 0 0 2.5 12.394v1.856a.5.5 0 1 1-1 0v-1.856a4.47 4.47 0 0 1 1.309-3.16l.337-.338a.5.5 0 0 1 .708 0m11.792-.3a.5.5 0 0 0 0 .708l.338.337A3.47 3.47 0 0 1 17 12.094v2.156a.5.5 0 0 0 1 0v-2.156a4.47 4.47 0 0 0-1.309-3.16l-.337-.338a.5.5 0 0 0-.708 0"/><path d="M14 9a2 2 0 1 1 0-4a2 2 0 0 1 0 4m0 1a3 3 0 1 1 0-6a3 3 0 0 1 0 6m-4.5 3.25a2.5 2.5 0 0 0-2.5 2.5v1.3a.5.5 0 0 1-1 0v-1.3a3.5 3.5 0 0 1 7 0v1.3a.5.5 0 1 1-1 0v-1.3a2.5 2.5 0 0 0-2.5-2.5"/><path d="M9.5 11.75a2 2 0 1 0 0-4a2 2 0 0 0 0 4m0 1a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></g></svg>
                            <p class="text-[4rem] font-normal relative bottom-4 text-blue-600">{{$countTarget}}</p>
                            <div class="absolute bottom-10 text-md">
                                Target Audience
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2">    
                        @include('admin/grafik/grafik-pendapatan')
                        @include('admin/grafik/grafik-user')
                    </div>
                </div>
            <!-- End Home Page -->

            <!-- Konsul Page -->
                <div id="konsul" class="content hidden">
                    <div>
                        <div class="">
                            <span class="font-semibold text-gray-400 text-sm">Page</span> / <span class="font-semibold text-sm">Konsul</span>
                            <p class="text-md font-bold">Form Pencatatan</p>
                        </div>
                        <div class="flex justify-between max-w-full mt-7">
                            <a href="{{route('form/identitas/add')}}" class="transform transition-transform duration-300 hover:scale-105">
                                <div class="w-[42vh] h-[27vh] bg-white rounded-lg text-black p-2">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="font-semibold text-gray-500 text-lg ml-3 mt-2">FORM</p>
                                            <p class="text-lg ml-3 font-bold">IDENTITAS</p>
                                        </div>   
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="size-12 p-3 mt-2 mr-2 bg-blue-500 rounded-full text-white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                                        </svg>
                                    </div>    
                                    <p class="text-xs ml-3 mt-3 text-gray-500 font-semibold">Form pencatatan konsultasi tentang <span class="text-blue-500">identitas</span> bisnis klien</p>    
                                </div>
                            </a>
                            <a href="{{route('form/step2/add')}}" class="transform transition-transform duration-300 hover:scale-105">
                                <div class="w-[42vh] h-[27vh] bg-white rounded-lg text-black p-2">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="font-semibold text-gray-500 text-lg ml-3 mt-2">FORM</p>
                                            <p class="text-lg ml-3 font-bold">STEP 2</p>
                                        </div>   
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-12 p-3 mt-2 mr-2 bg-red-500 rounded-full text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </div>    
                                    <p class="text-xs ml-3 mt-3 text-gray-500 font-semibold">Form pencatatan konsultasi tentang <span class="text-blue-500">analisis bisnis</span> klien</p>    
                                </div>
                            </a>
                            <a href="{{route('form/pesaing/add')}}" class="transform transition-transform duration-300 hover:scale-105">
                                <div class="w-[42vh] h-[27vh] bg-white rounded-lg text-black p-2">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="font-semibold text-gray-500 text-lg ml-3 mt-2">FORM</p>
                                            <p class="text-sm ml-3 mt-1.5 font-bold">ANALISIS PESAING</p>
                                        </div>   
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-12 p-3 mt-2 mr-2 bg-green-500 rounded-full text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>    
                                    <p class="text-xs ml-3 mt-4 text-gray-500 font-semibold">Form pencatatan konsultasi tentang <span class="text-blue-500">analisis bisnis pesaing</span> </p>    
                                </div>
                            </a>
                            <a href="{{route('form/target/add')}}" class="transform transition-transform duration-300 hover:scale-105">
                                <div class="w-[42vh] h-[27vh] bg-white rounded-lg text-black p-2">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="font-semibold text-gray-500 text-lg ml-3 mt-2">FORM</p>
                                            <p class="text-sm ml-3 mt-1.5 font-bold">TARGET AUDIENCE</p>
                                        </div>   
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-12 p-3 mt-2 mr-2 bg-purple-500 rounded-full text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                        </svg>
                                    </div>    
                                    <p class="text-xs ml-3 mt-2 text-gray-500 font-semibold">Form pencatatan konsultasi tentang <span class="text-blue-500">target audience</span>bisnis klien</p>    
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <!-- End Konsul Page -->

            <!-- Riwayat Page -->
                <div id="riwayat" class="content hidden">
                    <div>
                        <span class="font-semibold text-gray-400 text-sm">Page</span> / <span class="font-semibold text-sm">Riwayat</span>
                        <p class="text-md font-bold">Riwayat Pencatatan</p>
                    </div>
                    <div class="max-h-screen mt-8 flex space-x-2">
                    <!-- identitas -->
                        <a href="{{route('identitas/show')}}">
                            <div class="bg-white w-[42vh] h-36 p-2 rounded shadow border border-gray-300 hover:border-0 hover:scale-104 duration-700 hover:shadow-xl transform transition-transform cursor-pointer">   
                                <div class="flex justify-between items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="size-7 m-3 text-green-500" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                                    </svg>
                                    <p class="text-xs bg-green-500 font-semibold p-2 rounded-full text-white mr-2">IDENTITAS</p>
                                </div>   
                                <div class="mx-3 mt-2">
                                    <p class="text-3xl font-bold">{{$countIdentitas}}</p>
                                    <p class="text-sm text-gray-500">Jumlah Data Identitas</p>
                                </div> 
                            </div>
                        </a>    
                        <!-- End Identitas -->
                        
                        <!-- Step2 -->
                        <a href="{{route('form/step2/show')}}">
                            <div class="bg-white w-[42vh] h-36 p-2 rounded shadow border border-gray-300 hover:border-0 hover:scale-104 duration-700 hover:shadow-xl transform transition-transform cursor-pointer">   
                                <div class="flex justify-between items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7 m-3 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                    <p class="text-xs bg-blue-500 font-semibold p-2 rounded-full text-white mr-2">STEP2</p>
                                </div>   
                                <div class="mx-3 mt-2">
                                    <p class="text-3xl font-bold">{{$countStep2}}</p>
                                    <p class="text-sm text-gray-500">Jumlah Data Step2</p>
                                </div> 
                            </div>
                        </a>    
                        <!-- End Step2 -->

                        <!-- Analisis Pesaing -->
                        <a href="{{route('form/pesaing/show')}}">
                            <div class="bg-white w-[42vh] h-36 p-2 rounded shadow border border-gray-300 hover:border-0 hover:scale-104 duration-700 hover:shadow-xl transform transition-transform cursor-pointer overflow-hidden">   
                                <div class="flex justify-between items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7 m-3 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                    <p class="text-xs bg-red-500 font-semibold p-2 rounded-full text-white mr-2">ANALISIS PESAING</p>
                                </div>   
                                <div class="mx-3 mt-2">
                                    <p class="text-3xl font-bold">{{$countPesaing}}</p>
                                    <p class="text-sm text-gray-500">Jumlah Data Analisis Pesaing</p>
                                </div> 
                            </div>
                        </a>    
                        <!-- End Analisis Pesaing -->

                        <!-- Target Audience -->
                        <a href="{{route('form/pesaing/show')}}">
                            <div class="bg-white w-[42vh] h-36 p-2 rounded shadow border border-gray-300 hover:border-0 hover:scale-104 duration-700 hover:shadow-xl transform transition-transform cursor-pointer overflow-hidden">   
                                <div class="flex justify-between items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7 m-3 text-orange-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                    <p class="text-xs bg-orange-500 font-semibold p-2 rounded-full text-white mr-2">TARGET AUDIENCE</p>
                                </div>   
                                <div class="mx-3 mt-2">
                                    <p class="text-3xl font-bold">{{$countTarget}}</p>
                                    <p class="text-sm text-gray-500">Jumlah Data Target Audience</p>
                                </div> 
                            </div>
                        </a>   
                        <!-- End Target Audience  -->
                    </div>
                </div>
            <!-- End Riwayat Page -->

            <!-- Payment Page -->
                <div id="payment" class="content hidden">
                    <div>
                        <span class="font-semibold text-gray-400 text-sm">Page</span> / <span class="font-semibold text-sm">Payment</span>
                        <p class="text-md font-bold">Riwayat Pembelian</p>
                    </div>
                    <div class="h-auto">
                        <div class="shadow-lg rounded-lg overflow-hidden mt-7">
                            <!-- Search dan Filter -->
                            <form method="GET" action="{{ route('admin') }}" class="mb-4 flex items-center space-x-4">
                                <!-- Search -->
                                <input 
                                    type="text" 
                                    name="search" 
                                    value="{{ request('search') }}" 
                                    placeholder="Cari email atau alamat..." 
                                    class="border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500">
                                <!-- Filter -->
                                    <select 
                                        name="status" 
                                        class="border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500">
                                        <option value="">Status</option>
                                        <option value="Paid" {{ request('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="Unpaid" {{ request('status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                    </select>
                                <button 
                                    type="submit" 
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Cari
                                </button>
                            </form>
                            <!-- End Search dan Filter -->
                            <table class="w-full table-fixed">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">ID</th>
                                        <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Alamat</th>
                                        <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Email</th>
                                        <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Amount</th>
                                        <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Status</th>
                                    </tr>
                                </thead>  
                                <tbody class="bg-white">
                                    @forelse ($checkout as $Checkout)
                                    <tr>
                                        <td class="py-4 px-6 border-b border-gray-200">{{ $Checkout->id }}</td>
                                        <td class="py-4 px-6 border-b border-gray-200">{{ $Checkout->alamat }}</td>
                                        <td class="py-4 px-6 border-b border-gray-200">{{ $Checkout->email }}</td>
                                        <td class="py-4 px-6 border-b border-gray-200">Rp {{ number_format($Checkout->total_price, 0, ',', '.') }}</td>
                                        <td class="py-4 px-6 border-b border-gray-200">{{ $Checkout->status }}</td>
                                    </tr>
                                    @empty
                                    <p>Data Konsultasi Tidak Ditemukan</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            <!-- End Payment Page -->

            </div>
        </div>
    </div>
    <script type="text/javascript">
        function showContent(section) {
            // Simpan bagian yang dipilih ke localStorage
            localStorage.setItem('activeSection', section);

            // Sembunyikan semua konten
            document.querySelectorAll('.content').forEach(content => content.classList.add('hidden'));

            // Tampilkan konten yang dipilih
            document.getElementById(section).classList.remove('hidden');

            // Hapus kelas aktif dari semua elemen navigasi
            document.querySelectorAll('li').forEach(nav => nav.classList.remove('active'));

            // Tambahkan kelas aktif pada elemen yang dipilih
            document.getElementById('nav-' + section).classList.add('active');
        }

        // Memuat konten terakhir yang dipilih
        window.onload = function() {
            const activeSection = localStorage.getItem('activeSection');
            if (activeSection) {
                showContent(activeSection);
            } else {
                showContent('home'); // Default
            }
        }
    </script>
</body>
</html>
