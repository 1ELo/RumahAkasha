@extends('master.layout')
@section('css')
<link rel="stylesheet" href="{{asset('css/homepage/navbar.css')}}">
@endsection
@section('konten')
    <head>
    <link rel="stylesheet" href="{{ asset('css/homepage/reserve.css') }}">
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        section#background-reserve {
            background-image: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.2) 40%, rgba(255, 255, 255, 0)),
            url('{{asset('/img/akasha/img3.jpg') }}');
            background-size: cover;
            background-position: center;
            position: relative;
            height: 730px;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <!--reservation landpage-->
    <section id="background-reserve" class="up-reserve">
        <div class="container-xxl py-5 hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                @if ($existingReservation)
                    <h1 class="reserve-title">Reserved</h1>
                    <p class="reserve-subtitle">See You at {{ \Carbon\Carbon::parse($existingReservation->tanggal)->format('j F Y') }}</p>
                @else
                    <h1 class="reserve-title">Reservation</h1>
                    <p class="reserve-subtitle">Booking Akasha now!</p>
                @endif
            </div>
        </div>
    </section>

    @if (!$existingReservation)
        <!--reservation form-->
        <section id="reservation-form">
            <div class="container">
                <h2 class="text-center mb-4 enjoy">Enjoy your time at Akasha!</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('reservasi.store') }}" method="POST" id="reservation-form">
                            @csrf
                            <input type="hidden" name="id_customer" value="{{ Auth::user()->id }}">

                            <div class="row g-3 justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="tempat" id="tempat" class="form-select" required>
                                            <option value="indoor">Indoor</option>
                                            <option value="outdoor">Outdoor</option>
                                        </select>
                                        <label for="tempat" class="form-label">Tempat</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control" required>
                                        <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="time" name="jam" id="jam" class="form-control" required>
                                        <label for="jam" class="form-label">Jam</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="note" id="note" class="form-control"></textarea>
                                        <label for="note" class="form-label">Catatan</label>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <label for="include-menu" class="form-check-label">Pesan Menu?</label>
                                        <input type="checkbox" id="include-menu" name="include_menu" class="form-check-input">
                                    </div>
                                </div>

                                <div id="menu-fields" style="display: none;" class="col-12">
                                    <div class="row">
                                        @foreach (['menu_coffee' => $menu_coffee, 'menu_noncoffee' => $menu_noncoffee, 'menu_signature' => $menu_signature, 'menu_food' => $menu_food] as $kategori => $menus)
                                            <div class="col-lg-3 col-md-6 mb-4">
                                                <h6>{{ ucfirst(str_replace('_', ' ', $kategori)) }}</h6>
                                                @foreach ($menus as $menu)
                                                    <div class="menu-card">
                                                        <div class="quantity-control">
                                                            <button type="button" class="btn btn-sm btn-outline-secondary minus-btn" onclick="decreaseQuantity({{ $menu->id_menu }})">-</button>
                                                            <span class="menu-quantity" id="quantity-{{ $menu->id_menu }}">0</span>
                                                            <button type="button" class="btn btn-sm btn-outline-secondary plus-btn" onclick="increaseQuantity({{ $menu->id_menu }})">+</button>
                                                        </div>
                                                        <img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$menu->image))) }}" alt="{{ $menu->name }}" class="img-fluid mb-2">
                                                        <div class="menu-card-title">{{ $menu->name }}</div>
                                                        <div class="menu-card-price"><p>Rp.{{ number_format($menu->price, 2) }}</p></div>
                                                        <input type="number" name="menu[{{ $menu->id_menu }}][jumlah_menu]" class="form-control mb-2" min="0" placeholder="Jumlah" id="input-quantity-{{ $menu->id_menu }}" value="0" hidden>
                                                        <input type="hidden" name="menu[{{ $menu->id_menu }}][id_menu]" value="{{ $menu->id_menu }}">
                                                        <input type="hidden" name="menu[{{ $menu->id_menu }}][nama_menu]" value="{{ $menu->name }}">
                                                        <input type="hidden" name="menu[{{ $menu->id_menu }}][harga_menu]" value="{{ $menu->price }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-3">Buat Reservasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="recent-grid">
            <div class="Reservasi">
                <div class="card">
                    <div class="card-header">
                        <h3>Reservation Information</h3>
                        <p>Name : {{ $existingReservation->name }}</p>
                        <p>Email : {{ $existingReservation->email }}</p>
                        <p>Jumlah orang : {{ $existingReservation->jumlah_orang }}</p>
                        <p>Tempat : {{ $existingReservation->tempat }}</p>
                        <p>Notes : {{ $existingReservation->note }}</p>
                        <p><b>Reservation dates : {{$existingReservation->tanggal}} at {{$existingReservation->jam}}</b></p>
                    </div>
                        <div class="card-body">
                            <h3>Orders</h3>
                            <div class="scroll-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Menu</th>
                                            <th>Pcs</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <ol>
                                                    @if($existingReservation->pesanan->isNotEmpty())
                                                        @foreach($existingReservation->pesanan as $pesan)
                                                            <li>{{ $pesan->nama_menu }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>No menu</li>
                                                    @endif
                                                </ol>
                                            </td>
                                            <td>
                                                <ol>
                                                    @if($existingReservation->pesanan->isNotEmpty())
                                                        @foreach($existingReservation->pesanan as $pesan)
                                                            <li>{{ $pesan->jumlah_menu }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>-</li>
                                                    @endif
                                                </ol>
                                            </td>
                                            <td>
                                                <ol>
                                                    @if($existingReservation->pesanan->isNotEmpty())
                                                        @foreach($existingReservation->pesanan as $pesan)
                                                            <li>Rp. {{ number_format($pesan->price) }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>No menu</li>
                                                    @endif
                                                </ol>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if ($existingReservation->pembayaran)
                            <h5>Total Payment : Rp. {{ number_format($existingReservation->pembayaran->total_harga) }}</h5>
                            {{-- @else
                                <h5>Total Payment : Rp. 0</h5> --}}
                            @endif

                            @if ($isPaymentPending)
                            <button id="pay-button" class="btn btn-primary btn-block">Pay Now</button>
                            @elseif ($paymentStatus === 'PAID')
                                <p class="card-text">Pembayaran sudah lunas.</p>
                            @endif
                        </div>
                </div>
            </div>
        </div>

        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
        <script>
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); console.log(result);
                },
                // Optional
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("waiting your payment!"); console.log(result);
                },
                // Optional
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        };
    </script>
@endif

    <script>
        $(document).ready(function() {
            $('#include-menu').change(function() {
                if ($(this).is(':checked')) {
                    $('#menu-fields').show();
                } else {
                    $('#menu-fields').hide();
                }
            });
        });

        function increaseQuantity(menuId) {
            var quantitySpan = $('#quantity-' + menuId);
            var currentQuantity = parseInt(quantitySpan.text());
            quantitySpan.text(currentQuantity + 1);
            $('#input-quantity-' + menuId).val(currentQuantity + 1);
        }

        function decreaseQuantity(menuId) {
            var quantitySpan = $('#quantity-' + menuId);
            var currentQuantity = parseInt(quantitySpan.text());
            if (currentQuantity > 0) {
                quantitySpan.text(currentQuantity - 1);
                $('#input-quantity-' + menuId).val(currentQuantity - 1);
            }
        }
    </script>
@endsection
