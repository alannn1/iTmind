<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10 my-5">
        <table class="w-full table-fixed">
            <thead>
                <tr class="bg-gray-100">
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">ID</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Nama</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Nama Usaha</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Action</th>
                </tr>
            </thead>  
            <tbody class="bg-white">
                @php
                    $no = 0;
                    $no++;
                @endphp
                @forelse ($identitas as $Identitas)
                <tr>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $no }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $Identitas->nama }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $Identitas->nama_usaha }}</td>
                    <td class="flex gap-1 py-4 px-6 border-b border-gray-200">
                        <a href="{{ url('form/identitas/edit/'.$Identitas['id_user']) }}">
                            <span class="bg-blue-500 text-white py-1 px-2 rounded-full text-xs">Edit</span>
                        </a>  
                        <form action="{{ route('identitas/delete', $Identitas['id_user']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="alert('Yakin delete?')">
                                <span class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Delete</span>
                            </button>
                        </form>  
                    </td>
                </tr>
                @empty
                    <p>Data Konsultasi Belum Tersedia</p>
                @endforelse
            </tbody>
        </table>
    </div>  
    <div>
        <a href="{{url("/admin")}}">
            <button class="bg-gray-700 px-3 py-2 text-white rounded-lg absolute bottom-3 right-3">
                Kembali
            </button>
        </a>
    </div>
</body>
</html>