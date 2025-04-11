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
                <svg class="inline alplacen-text-top" heplaceht="24px" viewBox="0 0 24 24" width="24px" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g>
                    <path d="m4.88889,2.07407l14.22222,0l0,20l-14.22222,0l0,-20z" fill="none" id="svg_1" stroke="null"></path>
                    <path d="m7.07935,0.05664c-3.87,0 -7,3.13 -7,7c0,5.25 7,13 7,13s7,-7.75 7,-13c0,-3.87 -3.13,-7 -7,-7zm-5,7c0,-2.76 2.24,-5 5,-5s5,2.24 5,5c0,2.88 -2.88,7.19 -5,9.88c-2.08,-2.67 -5,-7.03 -5,-9.88z" id="svg_2"></path>
                    <circle cx="7.04807" cy="6.97256" r="2.5" id="svg_3"></circle>
                    </g>
                </svg>
                <h1 class="inline text-2xl problem-semibold leading-none">Target Audience</h1>
            </div>
            <form action="{{ url('form/target/save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="" />
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="jk" id="jk" placeholder="jenis kelamin" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="umur" id="umur" placeholder="umur" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="lokasi" id="lokasi" placeholder="lokasi" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="edukasi" id="edukasi" placeholder="edukasi" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="penghasilan" id="penghasilan" placeholder="penghasilan" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="pekerjaan" id="pekerjaan" placeholder="pekerjaan" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="kegiatan" id="kegiatan" placeholder="kegiatan ketika gabut" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="brand_fav" id="brand_fav" placeholder="brand favorit anda" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex-grow ml-1"><input type="text" name="problem" id="problem" placeholder="apa permasalahan terbesar anda" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                <div class="flex justify-between mt-6 pb-3">
                    <a href="{{url('/admin')}}" class="mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m7.49 12-3.75 3.75m0 0 3.75 3.75m-3.75-3.75h16.5V4.499" />
                        </svg>
                    </a>   
                    <input type="submit" name="btn_simpan" value="Submit" class="px-6 py-3 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600" />
                </div>
            </form>
        </div>
        <!--Show Identitas-->
        @if (session()->has('data'))
            <div class="container mx-auto px-4">
                <div class="mt-5 bg-white rounded-lg shadow px-5">
                    <h2 class="text-xl problem-semibold mb-2">Hasil Inputan:</h2>
                    @php $data = session('data') @endphp
                    <ul>
                        <li>
                            <input type="checkbox" {{ !empty($data['jk']) ? 'checked' : '' }} disabled>
                            jk: {{ $data['jk'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['umur']) ? 'checked' : '' }} disabled>
                            umur: {{ $data['umur'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['lokasi']) ? 'checked' : '' }} disabled>
                            lokasi: {{ $data['lokasi'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['edukasi']) ? 'checked' : '' }} disabled>
                            edukasi: {{ $data['edukasi'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['penghasilan']) ? 'checked' : '' }} disabled>
                            penghasilan: {{ $data['penghasilan'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['pekerjaan']) ? 'checked' : '' }} disabled>
                            pekerjaan: {{ $data['pekerjaan'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['kegiatan']) ? 'checked' : '' }} disabled>
                            Kegiatan: {{ $data['kegiatan'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['brand_fav']) ? 'checked' : '' }} disabled>
                            Brand Favorit: {{ $data['brand_fav'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['problem']) ? 'checked' : '' }} disabled>
                            problem: {{ $data['problem'] }}
                        </li>
                    </ul>
                    <div id="percentageDisplay" class="py-3 bg-gray-100 px-2 py-2 rounded-lg pb-2" >
                        Persentase Target Audience: <span class="lg text-red-500" id="percentageValue">0%</span>
                    </div>
                    <div class="flex justify-between mt-6">
                        <a href="{{ url('/form/brand/add') }}">
                            <button class="px-6 py-3 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                Brand Story
                            </button>
                        </a>
                        <a href="{{ url('/') }}">
                            <button class="px-6 py-3 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                Kembali
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
            
            // Perbarui nilai persentase di halaman utama (dashboard)
            updateDashboardPercentage(percentage.toFixed(2));
        }
        
        // Panggil hitungPersentase() saat halaman dimuat
        hitungPersentase();
        
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', hitungPersentase);
        });
    });
    function updateDashboardPercentage(percentage) {
    const percentageDisplay = document.getElementById('percentageValue');
    if (percentageDisplay) {
        percentageDisplay.textContent = `${percentage}%`;
    }
    }

// Panggil fungsi updateDashboardPercentage() saat halaman utama dimuat
    document.addEventListener('DOMContentLoaded', function() {
        const storedPercentage = localStorage.getItem('dashboardPercentage');
        if (storedPercentage) {
            updateDashboardPercentage(storedPercentage);
        }
    });
</script>
</body>
</html> 