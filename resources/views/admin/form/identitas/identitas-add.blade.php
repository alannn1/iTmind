<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ url('style.css') }}">
    <title>User Konsultant</title>
</head>
<body>
@if ($errors -> any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="flex h-screen bg-gray-100">
    <div class="m-auto">
        <div class="mt-5 bg-white rounded-lg shadow px-5">
            <div class="flex-1 py-5 pl-5 overflow-hidden">
                <svg class="inline align-text-top" height="24px" viewBox="0 0 24 24" width="24px" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g>
                    <path d="m4.88889,2.07407l14.22222,0l0,20l-14.22222,0l0,-20z" fill="none" id="svg_1" stroke="null"></path>
                    <path d="m7.07935,0.05664c-3.87,0 -7,3.13 -7,7c0,5.25 7,13 7,13s7,-7.75 7,-13c0,-3.87 -3.13,-7 -7,-7zm-5,7c0,-2.76 2.24,-5 5,-5s5,2.24 5,5c0,2.88 -2.88,7.19 -5,9.88c-2.08,-2.67 -5,-7.03 -5,-9.88z" id="svg_2"></path>
                    <circle cx="7.04807" cy="6.97256" r="2.5" id="svg_3"></circle>
                    </g>
                </svg>
                <h1 class="inline text-2xl font-semibold leading-none">Identitas</h1>
            </div>
            <form action="{{ url('identitas/save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="" />
                <input type="hidden" name="is_update" value="{{ $is_update }}" />
                <div class="flex">
                    <div class="flex-grow w-1/6 pr-2"><input type="text" name="nama" id="nama" placeholder="Nama" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow"><input type="text" name="nama_usaha" id="nama_usaha" placeholder="Nama Usaha" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow w-1/2 pr-2">
                        <select name="jenis" class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                            @foreach ( $optjenis as $key => $value )
                                @if (old('jenis') == $key)
                                    <option value="{{ $key }}" selected>{{$value}}</option>
                                @else
                                    <option value="{{$key}}">{{$value}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="relative flex-grow">
                        <input name="tahun_berdiri" placeholder="Tahun Berdiri" class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                </div>
                <input name="produk_jasa" type="text" placeholder="Produk / Jasa" class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"> 
                <input name="website" type="text" placeholder="Website" class="flex text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                <div class="flex">
                    <div class="relative flex-grow mr-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 mt-2 pointer-events-none z-10">
                        <i class="fa-brands fa-instagram text-gray-500"></i>
                        </div>
                        <input type="text" name="ig" id="ig" value="{{ old('ig') }}" placeholder="Instagram" class="text-black placeholder-gray-600 w-full h-11 pl-9 pr-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                    <div class="relative flex-grow ml-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 mt-2 pointer-events-none z-10">
                        <i class="fa-brands fa-tiktok text-gray-500"></i>
                        </div>
                        <input type="text" name="tiktok" id="tiktok" value="{{ old('tiktok') }}" placeholder="TikTok" class="text-black placeholder-gray-600 w-full h-11 pl-9 pr-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                </div> 
                <div class="flex">
                    <div class="relative flex-grow mr-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 mt-2 pointer-events-none z-10">
                        <i class="fa-brands fa-facebook text-gray-500"></i>
                        </div>
                        <input type="text" name="fb" id="fb" value="{{ old('fb') }}" placeholder="Facebook" class="text-black placeholder-gray-600 w-full h-11 pl-9 pr-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                    <div class="relative flex-grow ml-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 mt-2 pointer-events-none z-10">
                        <i class="fa-solid fa-s text-gray-500"></i>
                        </div>
                        <input type="text" name="shopee" id="shopee" value="{{ old('shopee') }}" placeholder="Shopee" class="text-black placeholder-gray-600 w-full h-11 pl-9 pr-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                </div> 
                <div class="flex">
                    <div class="relative flex-grow mr-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 mt-2 pointer-events-none z-10">
                            <i class="fa-brands fa-trello text-gray-500"></i>
                        </div>
                        <input type="text" name="trello" id="trello" value="{{ old('trello') }}" placeholder="Trello" class="text-black placeholder-gray-600 w-full h-11 pl-9 pr-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                    <div class="relative flex-grow ml-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-1.5 mt-2 pointer-events-none z-10">
                            <img src="{{ url('assets/img/lynk.jpg') }}" alt="" class="w-6 text-gray-500" >
                        </div>
                        <input type="text" name="lynk_id" id="lynk_id" value="{{ old('lynk_id') }}" placeholder="Lynk ID" class="text-black placeholder-gray-600 w-full h-11 pl-9 pr-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                </div> 
                <div class="flex">
                    <div class="relative flex-grow mr-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 mt-2 pointer-events-none z-10">
                            <i class="fa-brands fa-square-whatsapp text-gray-500"></i>
                        </div>
                        <input type="text" name="wa_bisnis" id="wa_bisnis" value="{{ old('wa_bisnis') }}" placeholder="WA Bisnis" class="text-black placeholder-gray-600 w-full h-11 pl-9 pr-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                    <div class="relative flex-grow ml-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 mt-2 pointer-events-none z-10">
                            <i class="fa-solid fa-location-dot text-gray-500"></i>
                        </div>
                        <input type="text" name="maps" id="maps" value="{{ old('maps') }}" placeholder="Maps" class="text-black placeholder-gray-600 w-full h-11 pl-9 pr-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1 w-1/2">
                        <label for="logo" id="logo" class="relative left-2">Logo:</label>
                        <input type="file" name="logo" id="logo" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    </div>
                </div> 
                <div class="flex justify-between mt-6 pb-3">
                    <a href="{{url('/admin')}}" class="mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m7.49 12-3.75 3.75m0 0 3.75 3.75m-3.75-3.75h16.5V4.499" />
                        </svg>
                    </a>    
                    <input type="submit" name="btn_simpan" value="Submit" class="px-6 py-3 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600 cursor-pointer" />
                </div>
            </form>
        </div>
        <!--Show Identitas-->
        @if (session()->has('data'))
            <div class="container mx-auto px-4 max-w-full md:max-w-xl">
                <div class="mt-5 bg-white rounded-lg shadow px-5">
                    <h2 class="text-xl font-semibold mb-2">Hasil Inputan:</h2>
                    @php $data = session('data') @endphp
                    <ul>
                        <li>
                            <input type="checkbox" {{ !empty($data['logo']) ? 'checked' : '' }} disabled>
                            Logo: {{ $data['logo'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['nama']) ? 'checked' : '' }} disabled>
                            Nama: {{ $data['nama'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['nama_usaha']) ? 'checked' : '' }} disabled>
                            Nama Usaha: {{ $data['nama_usaha'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['jenis']) ? 'checked' : '' }} disabled>
                            Jenis: {{ $data['jenis'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['tahun_berdiri']) ? 'checked' : '' }} disabled>
                            Tahun Berdiri: {{ $data['tahun_berdiri'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['produk_jasa']) ? 'checked' : '' }} disabled>
                            Produk/Jasa: {{ $data['produk_jasa'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['website']) ? 'checked' : '' }} disabled>
                            Website: {{ $data['website'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['ig']) ? 'checked' : '' }} disabled>
                            Instagram: {{ $data['ig'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['tiktok']) ? 'checked' : '' }} disabled>
                            Tiktok: {{ $data['tiktok'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['fb']) ? 'checked' : '' }} disabled>
                            Facebook: {{ $data['fb'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['shopee']) ? 'checked' : '' }} disabled>
                            Shopee: {{ $data['shopee'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['trello']) ? 'checked' : '' }} disabled>
                            Trello: {{ $data['trello'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['lynk_id']) ? 'checked' : '' }} disabled>
                            Lynk Id: {{ $data['lynk_id'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['wa_bisnis']) ? 'checked' : '' }} disabled>
                            Whatsapp Bisnis: {{ $data['wa_bisnis'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['maps']) ? 'checked' : '' }} disabled>
                            Maps: {{ $data['maps'] }}
                        </li>
                    </ul>
                    <div id="percentageDisplay" class="py-3 bg-gray-100 px-2 py-2 rounded-lg pb-2" >
                        Persentase Identitas: <span class="lg text-red-500" id="percentageValue">0%</span>
                    </div>
                    <div class="py-3 bg-gray-100 px-2 py-2 rounded-lg pb-2 overflow-hidden break-words whitespace-normal">
                        <span class="mb-3 text-blue-500 font-semibold">Rekomendasi:</span>
                        <ul class="space-y-4 text-gray-500 list-disc list-inside">
                            @if(session('recommendations'))
                                @foreach(session('recommendations') as $rekomendasi)
                                    <li>{{$rekomendasi}}</li>
                                @endforeach
                            @endif
                        </ul>   
                    </div>
                    <div class="flex justify-between mt-6 pb-3">
                        <a href="{{ url('/admin') }}">
                            <button class="px-6 py-3 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                Kembali
                            </button>
                        </a>    
                        <a href="{{ url('/form/step2/add') }}">
                            <button class="px-6 py-3 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">   
                            Lanjut
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const percentageDisplay = document.getElementById('percentageValue');
        
        function hitungPersentase() {
            const totalCheckbox = checkboxes.length;
            let checkedCount = 0;
            
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    checkedCount++;
                }
            });
            
            let percentage = (checkedCount / totalCheckbox) * 100;
            percentage = Math.min(percentage, 100);
            
            percentageDisplay.textContent = `${percentage.toFixed(2)}%`;
            
            localStorage.setItem('dashboardPercentage', percentage.toFixed(2));
        }
        
        hitungPersentase();
        
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', hitungPersentase);
        });
    });
</script>
</body>
</html>