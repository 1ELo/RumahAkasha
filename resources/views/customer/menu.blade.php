@extends('master.layout')
@section('css')
<link rel="stylesheet" href="{{asset('css/homepage/navbar.css')}}">
@endsection
@section('konten')
<head>
    <link rel="stylesheet" href="{{ asset('css/homepage/menu.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<div class="container">
    <div class="section-title">
        <h2>Our Menu</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis in reprehenderit repudiandae ipsum culpa cupiditate tempora maiores autem nisi maxime, aliquam rem facilis, deleniti fugit cum vitae molestiae, hic consequuntur!</p>
    </div>
    <div class="best-seller">
        <h3>Monthly Best Seller</h3>
        <div class="best-seller-wrapper">
            @foreach ($bestSellerMenus as $menu)
                <div class="card best-seller-card">
                    <div class="card-img">
                        <img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$menu->image))) }}" alt="{{ $menu->name }}">

                    </div>
                    <div class="menu-name">
                        <h5>{{ $menu->name }}</h5>
                        <span>Rp.{{ number_format($menu->price, 0, ',', '.') }}</span>
                        <br>
                        <span class="badge">Best Seller</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="menu-wrapper">
        <div class="menus">
            <div class="menu-column">
                <h4>Coffee</h4>
                @foreach ($menu_coffee as $men_cof)
                    <div class="single-menu">
                        <div class="menu-content">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$men_cof->image)))}}" alt="{{ $men_cof->name }}">
                                </div>
                                <div class="menu-name">
                                    <h5>{{ $men_cof->name }}</h5>
                                    <span>Rp.{{ number_format($men_cof->price, 0, ',', '.') }}</span>
                                </div>
                                <hr>
                                <div class="menu-desc">
                                    <p><q>{{ $men_cof->description }}</q></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="menu-column">
                <h4>Non Coffee</h4>
                @foreach ($menu_noncoffee as $men_noncoff)
                    <div class="single-menu">
                        <div class="menu-content">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$men_noncoff->image))) }}" alt="{{ $men_noncoff->name }}">
                                </div>
                                <div class="menu-name">
                                    <h5>{{ $men_noncoff->name }}</h5>
                                    <span>Rp.{{ number_format($men_noncoff->price, 0, ',', '.') }}</span>
                                </div>
                                <hr>
                                <div class="menu-desc">
                                    <p><q>{{ $men_noncoff->description }}</q></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="menu-column">
                <h4>Signature</h4>
                @foreach ($menu_signature as $men_sig)
                <div class="single-menu">
                    <div class="menu-content">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$men_sig->image))) }}" alt="{{ $men_sig->name }}">
                            </div>
                            <div class="menu-name">
                                <h5>{{ $men_sig->name }}</h5>
                                <span>Rp.{{ number_format($men_sig->price, 0, ',', '.') }}</span>
                            </div>
                            <hr>
                            <div class="menu-desc">
                                <p><q>{{ $men_sig->description }}</q></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="menu-column">
                <h4>Food</h4>
                @foreach ($menu_food as $men_food)
                    <div class="single-menu">
                        <div class="menu-content">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$men_food->image))) }}" alt="{{ $men_food->name }}">
                                </div>
                                <div class="menu-name">
                                    <h5>{{ $men_food->name }}</h5>
                                    <span>Rp.{{ number_format($men_food->price, 0, ',', '.') }}</span>
                                </div>
                                <hr>
                                <div class="menu-desc">
                                    <p><q>{{ $men_food->description }}</q></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
