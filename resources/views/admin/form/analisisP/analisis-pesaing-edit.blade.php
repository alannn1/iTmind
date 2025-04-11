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
                <h1 class="inline text-2xl font-semibold leading-none">Step 2</h1>
            </div>
            <form action="{{ route('pesaing/update', $pesaing->id_user) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $query->id ?? '' }}" />
                <input type="hidden" name="is_update" value="{{ $is_update ?? 0 }}" />
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="strenght" id="strenght" value="{{ old('strenght', $pesaing->strenght) }}" placeholder="Strenght" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="weakness" id="weakness" value="{{ old('weakness', $pesaing->weakness) }}" placeholder="Weakness" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="opportunity" id="opportunity" value="{{ old('opportunity', $pesaing->opportunity) }}" placeholder="Opportunity" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="threats" id="threats" value="{{ old('threats', $pesaing->threats) }}" placeholder="Threats" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="product" id="product" value="{{ old('product', $pesaing->product) }}" placeholder="Product" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="price" id="price" value="{{ old('price', $pesaing->price) }}" placeholder="Price" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="place" id="place" value="{{ old('place', $pesaing->place) }}" placeholder="Place" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="promotion" id="promotion" value="{{ old('promotion', $pesaing->promotion) }}" placeholder="Promotion" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="people" id="people" value="{{ old('people', $pesaing->people) }}" placeholder="People" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="process" id="process" value="{{ old('process', $pesaing->process) }}" placeholder="Process" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="physical_evidence" id="physical_evidence" value="{{ old('physical_evidence', $pesaing->physical_evidence) }}" placeholder="physical Evidence" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    <div class="flex-grow ml-1"><input type="text" name="performance" id="performance" value="{{ old('performance', $pesaing->performance) }}" placeholder="Performance" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                </div>
                <div class="flex">
                    <div class="flex-grow mr-1"><input type="text" name="partnership" id="partnership" value="{{ old('partnership', $pesaing->partnership) }}" placeholder="Partnership" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                    
                </div>
                <div class="flex justify-end mt-6 pb-3">
                    <input type="submit" name="btn_simpan" value="Submit" class="px-6 py-3 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600 cursor-pointer" />
                </div>
            </form>
        </div>
        <!--Show Identitas-->
        @if (session()->has('data'))
            <div class="container mx-auto px-4">
                <div class="mt-5 bg-white rounded-lg shadow px-5">
                    <h2 class="text-xl font-semibold mb-2">Hasil Inputan:</h2>
                    @php $data = session('data') @endphp
                    <ul>
                        <li>
                            <input type="checkbox" {{ !empty($data['strenght']) ? 'checked' : '' }} disabled>
                            Strenght: {{ $data['strenght'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['weakness']) ? 'checked' : '' }} disabled>
                            Weakness: {{ $data['weakness'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['opportunity']) ? 'checked' : '' }} disabled>
                            Opportunity: {{ $data['opportunity'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['threats']) ? 'checked' : '' }} disabled>
                            Threats: {{ $data['threats'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['product']) ? 'checked' : '' }} disabled>
                            Product: {{ $data['product'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['price']) ? 'checked' : '' }} disabled>
                            Price: {{ $data['price'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['place']) ? 'checked' : '' }} disabled>
                            Place: {{ $data['place'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['promotion']) ? 'checked' : '' }} disabled>
                            Promotion: {{ $data['promotion'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['people']) ? 'checked' : '' }} disabled>
                            People: {{ $data['people'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['process']) ? 'checked' : '' }} disabled>
                            Process: {{ $data['process'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['physical_evidence']) ? 'checked' : '' }} disabled>
                            Physical Evidence: {{ $data['physical_evidence'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['performance']) ? 'checked' : '' }} disabled>
                            Performance: {{ $data['performance'] }}
                        </li>
                        <li>
                            <input type="checkbox" {{ !empty($data['partnership']) ? 'checked' : '' }} disabled>
                            Partnership: {{ $data['partnership'] }}
                        </li>
                    </ul>
                    <div id="percentageDisplay" class="py-3 bg-gray-100 px-2 py-2 rounded-lg pb-2" >
                        Persentase Step 2 adalah: <span class="lg text-red-500" id="percentageValue">0%</span>
                    </div>
                    <div class="flex justify-end mt-6 px-2 gap-3">
                        <a href="{{ url('pesaing/show') }}">
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