<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>   
    <div class="min-h-screen flex flex-1">
        <aside class="w-[45%] text-black h-full pt-20 pl-20">
            <div class="flex bg-blue-100 w-[12rem] h-9 rounded-lg">
                <img src="{{url('img/itmind.png')}}" class="w-10 relative ml-3 mr-1 object-cover"/>
                <span class="font-bold relative top-1">iTmind Services</span>
            </div>    
            <span class="font-inter text-3xl font-semibold">Konsultasi Bisnis Online</span>
            <img src="{{url ('img/card/img-checkout.jpg')}}" class="w-[90%] mt-3">
            <span class="font-bold mt-3 block">Start Form</span>
            <span class="mt-3 text-3xl font-semibold text-red-500">Rp. 2.500.000</span>
            <span class="block line-through text-gray-500">Rp. 5.000.000</span>
            <div class="flex mt-5">
                
                <!-----Pop Up Alpine Js--------->
                <div x-data="{ open: false }" class="container mx-auto">
                    <div class="flex space-x-7">
                        <a href="{{url('/')}}" class="bg-black flex items-center rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 1024 1024"><path fill="white" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64"/><path fill="white" d="m237.248 512l265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312z"/></svg>
                        </a>
                        @if (Auth::user())
                            <button @click="open = true" class="px-5 py-2 bg-blue-500 text-white rounded relative right-5">
                                Beli Sekarang
                            </button>
                        @else
                            <a href="{{url('login')}}">    
                                <button class="px-5 py-2 bg-blue-500 text-white rounded relative right-5">
                                    Beli Sekarang
                                </button>
                            </a>
                        @endif
                    </div>
                    <div x-show="open" x-cloak x-transition class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center z-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                            <h2 class="text-lg font-bold mb-4">Checkout</h2>
                            <!-- Form checkout -->
                            <form method="POST" action="{{ route('payment') }}">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                    <input type="text" name="alamat" class="border border-gray-300 rounded-lg w-full px-4 py-2" required>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" class="border border-gray-300 rounded-lg w-full px-4 py-2" value="{{Auth::check() ? Auth::user()->email : ''}}" readonly required>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Submit</button>
                                    <button type="button" @click="open = false" class="ml-2 bg-red-500 text-white px-4 py-2 rounded-lg">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
                <!--------End Pop Up Alpine JS----------->
            </div> 
        </aside>

        <main class="flex-1 h-full pt-20 pl-4 pr-20 mb-20">
            <div class="text-gray-500 leading-7">
                <span class="font-bold">Konsultasi Bisnis Online, </span><span class="text-gray-600">tim konsultan dari <span class="font-semibold">iTmind</span> akan memberikan pertanyaan seputar bisnis agar bisa menganalisis permasalahan bisnis klien.</span>
                <span class="block mt-7">Konsultasi akan melalui zoom, ketika anda sudah membayar akan kami kirim link zoom melalui email. Konsultasi Terbuka Online hadir sebagai solusi bagi para pelaku bisnis yang ingin memperoleh solusi dengan cepat, tepat, dan efisien tanpa perlu bertemu di suatu tempat yang telah ditentukan.</span>
                <span class="block mt-7">Anda masih bisa melakukan pertemuan langsung untuk berkonsultasi dengan datang langsung ke kantor, dan kami pun siap untuk mendengarkan masalah bisnis Anda serta memberikan solusi berdasarkan pengalaman dan keahlian yang kami miliki.</span>
                <span class="block mt-7">Tim Konsultan <span class="font-semibold">iTmind</span> akan memberi masukan berupa:</span>
            </div>
            <ul class="mt-4 leading-7 list-disc list-inside text-gray-600">
                <li>Sumber permasalahan.</li>
                <li>Apa solusi jangka pendeknya.</li>
                <li>Rekomendasi untuk bisnis anda.</li>
                <li>Analisis pesaing bisnis.</li>
                <li>Analisis bisnis anda.</li>
            </ul>
        </main>    
    </div> 

    <footer class="w-full h-100 bg-black text-white ">
        <div class="pl-[200px] py-10 pr-20 mt-20 grid grid-cols-3">
            <div>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1" width="1.4em" height="1.4em" viewBox="0 0 1024 1024"><path fill="white" d="M800 416a288 288 0 1 0-576 0c0 118.144 94.528 272.128 288 456.576C705.472 688.128 800 534.144 800 416M512 960C277.312 746.688 160 565.312 160 416a352 352 0 0 1 704 0c0 149.312-117.312 330.688-352 544"/><path fill="white" d="M512 512a96 96 0 1 0 0-192a96 96 0 0 0 0 192m0 64a160 160 0 1 1 0-320a160 160 0 0 1 0 320"/></svg>
                    <span class="text-xl ml-3 relative top-1 font-semibold">Operational Office</span><br/>
                </div>
                <div class="pl-8 mt-2">
                    <span class="">Jl. Empu Tantular No.2, Bandarharjo, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50175</span>
                </div>
            </div>

            <div class="pl-9">
                <span class="text-xl ml-3 relative top-1 font-semibold">Contact</span><br/>
                <div class="pl-4 mt-5 flex">
                    <a href="{{url('https://api.whatsapp.com/send/?phone=%2B6285736762892&text&type=phone_number&app_absent=0')}}" class="flex mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 256 258"><defs><linearGradient id="logosWhatsappIcon0" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#1faf38"/><stop offset="100%" stop-color="#60d669"/></linearGradient><linearGradient id="logosWhatsappIcon1" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#f9f9f9"/><stop offset="100%" stop-color="#fff"/></linearGradient></defs><path fill="url(#logosWhatsappIcon0)" d="M5.463 127.456c-.006 21.677 5.658 42.843 16.428 61.499L4.433 252.697l65.232-17.104a123 123 0 0 0 58.8 14.97h.054c67.815 0 123.018-55.183 123.047-123.01c.013-32.867-12.775-63.773-36.009-87.025c-23.23-23.25-54.125-36.061-87.043-36.076c-67.823 0-123.022 55.18-123.05 123.004"/><path fill="url(#logosWhatsappIcon1)" d="M1.07 127.416c-.007 22.457 5.86 44.38 17.014 63.704L0 257.147l67.571-17.717c18.618 10.151 39.58 15.503 60.91 15.511h.055c70.248 0 127.434-57.168 127.464-127.423c.012-34.048-13.236-66.065-37.3-90.15C194.633 13.286 162.633.014 128.536 0C58.276 0 1.099 57.16 1.071 127.416m40.24 60.376l-2.523-4.005c-10.606-16.864-16.204-36.352-16.196-56.363C22.614 69.029 70.138 21.52 128.576 21.52c28.3.012 54.896 11.044 74.9 31.06c20.003 20.018 31.01 46.628 31.003 74.93c-.026 58.395-47.551 105.91-105.943 105.91h-.042c-19.013-.01-37.66-5.116-53.922-14.765l-3.87-2.295l-40.098 10.513z"/><path fill="#fff" d="M96.678 74.148c-2.386-5.303-4.897-5.41-7.166-5.503c-1.858-.08-3.982-.074-6.104-.074c-2.124 0-5.575.799-8.492 3.984c-2.92 3.188-11.148 10.892-11.148 26.561s11.413 30.813 13.004 32.94c1.593 2.123 22.033 35.307 54.405 48.073c26.904 10.609 32.379 8.499 38.218 7.967c5.84-.53 18.844-7.702 21.497-15.139c2.655-7.436 2.655-13.81 1.859-15.142c-.796-1.327-2.92-2.124-6.105-3.716s-18.844-9.298-21.763-10.361c-2.92-1.062-5.043-1.592-7.167 1.597c-2.124 3.184-8.223 10.356-10.082 12.48c-1.857 2.129-3.716 2.394-6.9.801c-3.187-1.598-13.444-4.957-25.613-15.806c-9.468-8.442-15.86-18.867-17.718-22.056c-1.858-3.184-.199-4.91 1.398-6.497c1.431-1.427 3.186-3.719 4.78-5.578c1.588-1.86 2.118-3.187 3.18-5.311c1.063-2.126.531-3.986-.264-5.579c-.798-1.593-6.987-17.343-9.819-23.64"/></svg>
                        <span class="ml-1">Raihan</span>
                    </a>
                    <a href="{{url('https://api.whatsapp.com/send/?phone=%2B62082314063002&text&type=phone_number&app_absent=0')}}" class="flex">    
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 256 258"><defs><linearGradient id="logosWhatsappIcon0" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#1faf38"/><stop offset="100%" stop-color="#60d669"/></linearGradient><linearGradient id="logosWhatsappIcon1" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#f9f9f9"/><stop offset="100%" stop-color="#fff"/></linearGradient></defs><path fill="url(#logosWhatsappIcon0)" d="M5.463 127.456c-.006 21.677 5.658 42.843 16.428 61.499L4.433 252.697l65.232-17.104a123 123 0 0 0 58.8 14.97h.054c67.815 0 123.018-55.183 123.047-123.01c.013-32.867-12.775-63.773-36.009-87.025c-23.23-23.25-54.125-36.061-87.043-36.076c-67.823 0-123.022 55.18-123.05 123.004"/><path fill="url(#logosWhatsappIcon1)" d="M1.07 127.416c-.007 22.457 5.86 44.38 17.014 63.704L0 257.147l67.571-17.717c18.618 10.151 39.58 15.503 60.91 15.511h.055c70.248 0 127.434-57.168 127.464-127.423c.012-34.048-13.236-66.065-37.3-90.15C194.633 13.286 162.633.014 128.536 0C58.276 0 1.099 57.16 1.071 127.416m40.24 60.376l-2.523-4.005c-10.606-16.864-16.204-36.352-16.196-56.363C22.614 69.029 70.138 21.52 128.576 21.52c28.3.012 54.896 11.044 74.9 31.06c20.003 20.018 31.01 46.628 31.003 74.93c-.026 58.395-47.551 105.91-105.943 105.91h-.042c-19.013-.01-37.66-5.116-53.922-14.765l-3.87-2.295l-40.098 10.513z"/><path fill="#fff" d="M96.678 74.148c-2.386-5.303-4.897-5.41-7.166-5.503c-1.858-.08-3.982-.074-6.104-.074c-2.124 0-5.575.799-8.492 3.984c-2.92 3.188-11.148 10.892-11.148 26.561s11.413 30.813 13.004 32.94c1.593 2.123 22.033 35.307 54.405 48.073c26.904 10.609 32.379 8.499 38.218 7.967c5.84-.53 18.844-7.702 21.497-15.139c2.655-7.436 2.655-13.81 1.859-15.142c-.796-1.327-2.92-2.124-6.105-3.716s-18.844-9.298-21.763-10.361c-2.92-1.062-5.043-1.592-7.167 1.597c-2.124 3.184-8.223 10.356-10.082 12.48c-1.857 2.129-3.716 2.394-6.9.801c-3.187-1.598-13.444-4.957-25.613-15.806c-9.468-8.442-15.86-18.867-17.718-22.056c-1.858-3.184-.199-4.91 1.398-6.497c1.431-1.427 3.186-3.719 4.78-5.578c1.588-1.86 2.118-3.187 3.18-5.311c1.063-2.126.531-3.986-.264-5.579c-.798-1.593-6.987-17.343-9.819-23.64"/></svg>
                        <span class="ml-1">Alan</span>
                    </a>
                </div>
            </div>

            <div>
                <span class="text-xl ml-3 relative top-1 font-semibold">Connect</span><br/>
                <div class="pl-4 mt-5 flex">
                    <a href="https://maps.app.goo.gl/iy5dg3SaTdT4gBRKA">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 256 367"><path fill="#34a853" d="M70.585 271.865a371 371 0 0 1 28.911 42.642c7.374 13.982 10.448 23.463 15.837 40.31c3.305 9.308 6.292 12.086 12.714 12.086c6.998 0 10.173-4.726 12.626-12.035c5.094-15.91 9.091-28.052 15.397-39.525c12.374-22.15 27.75-41.833 42.858-60.75c4.09-5.354 30.534-36.545 42.439-61.156c0 0 14.632-27.035 14.632-64.792c0-35.318-14.43-59.813-14.43-59.813l-41.545 11.126l-25.23 66.451l-6.242 9.163l-1.248 1.66l-1.66 2.078l-2.914 3.319l-4.164 4.163l-22.467 18.304l-56.17 32.432z"/><path fill="#fbbc04" d="M12.612 188.892c13.709 31.313 40.145 58.839 58.031 82.995l95.001-112.534s-13.384 17.504-37.662 17.504c-27.043 0-48.89-21.595-48.89-48.825c0-18.673 11.234-31.501 11.234-31.501l-64.489 17.28z"/><path fill="#4285f4" d="M166.705 5.787c31.552 10.173 58.558 31.53 74.893 63.023l-75.925 90.478s11.234-13.06 11.234-31.617c0-27.864-23.463-48.68-48.81-48.68c-23.969 0-37.735 17.475-37.735 17.475v-57z"/><path fill="#1a73e8" d="M30.015 45.765C48.86 23.218 82.02 0 127.736 0c22.18 0 38.89 5.823 38.89 5.823L90.29 96.516H36.205z"/><path fill="#ea4335" d="M12.612 188.892S0 164.194 0 128.414c0-33.817 13.146-63.377 30.015-82.649l60.318 50.759z"/></svg>
                    </a>    
                    <a href="https://www.linkedin.com/company/ex-science/" class="mx-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 128 128"><path fill="#0076b2" d="M116 3H12a8.91 8.91 0 0 0-9 8.8v104.42a8.91 8.91 0 0 0 9 8.78h104a8.93 8.93 0 0 0 9-8.81V11.77A8.93 8.93 0 0 0 116 3"/><path fill="#fff" d="M21.06 48.73h18.11V107H21.06zm9.06-29a10.5 10.5 0 1 1-10.5 10.49a10.5 10.5 0 0 1 10.5-10.49m20.41 29h17.36v8h.24c2.42-4.58 8.32-9.41 17.13-9.41C103.6 47.28 107 59.35 107 75v32H88.89V78.65c0-6.75-.12-15.44-9.41-15.44s-10.87 7.36-10.87 15V107H50.53z"/></svg>
                    </a>
                </div>
            </div>
        </div>    
        <div class="px-10 pb-8">
            <span>Copyright © 2024</span>
            <span class="flex justify-end relative bottom-6 text-blue-200"><a href="https://andafconsulting.com/konsultasi-online/">Link referensi</a></span>
        </div>
    </footer>
    
</body>
</html>