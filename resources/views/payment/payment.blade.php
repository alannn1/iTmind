<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="antialiased text-gray-900">
        <div class="bg-gray-200 min-h-screen p-8 flex items-center justify-center gap-10">
            <div class="bg-white rounded max-w-full shadow-2xl">
                <img class="h-48 w-full object-cover object-end" src="{{asset('img/card/konsul-pay.jpg')}}" alt="Home in Countryside" />
                <div class="py-2 px-3">
                    <span class="text-xl font-semibold">Detail Pesanan</span>
                    <table class="mt-2">
                        <tr>
                            <td>Alamat</td>
                            <td>: {{$checkout->alamat}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{$checkout->email}}</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>: Rp. {{$checkout->total_price}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{$checkout->status}}</td>
                        </tr>
                    </table>
                    <div class="flex">
                    <form action="{{ route('cancel', $checkout->id) }}" method="POST" class="mr-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 px-5 py-2 rounded-lg hover:shadow-lg mt-3 text-white" onclick="alert('Batalkan Pesanan?')">
                            Cancel
                        </button>
                    </form>
                        <button class="bg-black px-5 py-2 rounded-lg hover:shadow-lg mt-3 text-white" id="pay-button">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result){
                /* You may add your own implementation here */
                window.location.href = '/invoice/{{$checkout->id}}'
                alert("payment success!"); console.log(result);
            },
            onPending: function(result){
                /* You may add your own implementation here */
                alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
                /* You may add your own implementation here */
                alert("payment failed!"); console.log(result);
            },
            onClose: function(){
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
            })
        });
    </script>
</body>
</html>