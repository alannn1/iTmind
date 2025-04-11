<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex justify-center items-center min-h-screen bg-white">
        <div class="px-5 pt-8 pb-5 bg-white rounded-lg shadow-lg w-[27rem]">
            <div class="flex justify-center h-[40px] mb-3">
                <img src="{{asset('img/itmind.png')}}" class="w-[70px] object-cover mr-2">
                <span class="text-3xl font-bold text-blue-500">iTmind</span>
            </div>
            <hr class="border-t-[2px] border-gray-100"/>
            <div class="flex justify-between mt-2">
                <h2 class="font-bold">INVOICE</h2>
                <div class="font-semibold text-gray-600">
                    <h2>Date: {{$checkout->created_at}}</h2>
                    <h2>Invoice #: {{$checkout->id}}</h2>
                </div>
            </div>
            <div>

            </div>
            <div class="mt-3">
                <h2 class="font-bold mb-3">Bill To:</h2>
                <div class="flex flex-col font-semibold text-gray-600 gap-0.5">
                    <span>{{$checkout->email}}</span>
                    <span>{{$checkout->alamat}}</span>
                </div>
            </div>
            <div class="mt-7 flex justify-between font-bold">
                <h2>Description</h2>
                <h2>Amount</h2>
            </div>
            <div class="flex justify-between text-gray-600 font-semibold mt-1">
                <h2>Kelas Bisnis</h2>
                <h2>Rp{{ number_format($checkout->total_price, 0, ',', '.') }}</h2>
            </div>
            <div class="flex justify-between font-bold mt-1">
                <h2>Total</h2>
                <div>
                    <h2>Rp{{ number_format($checkout->total_price, 0, ',', '.') }}</h2>
                    <h2 class="ml-9">{{$checkout->status}}</h2>
                </div>
            </div>
            <div class="mt-7">
                <h2>Thank you for your business!</h2>
                <h2>Please keep this invoice as proof to your payment!</h2>
            </div>
            <div class="flex justify-between mt-4">
                    <a class="hover:text-gray-500" href="{{url('/')}}">Kembali</a>   
                    <a class="hover:text-blue-400 text-blue-500" href="{{route('invoice.download', $checkout->id)}}">Download PDF</a>
            </div>
        </div>
    </div>
</body>
</html>
