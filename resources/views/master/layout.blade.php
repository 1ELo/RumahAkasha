<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Akasha</title>
    <link rel="stylesheet" href="{{asset('css/homepage/navbar.css')}}">
    @yield('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a href="{{url('/home')}}">RUMAH AKASHA</a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="{{url('/profile')}}">About us</a></li>
                    <li><a href="{{url('/menu')}}">Menu</a></li>
                    {{-- <li><a href="#">Akasha Project</a></li> --}}
                    <li><a href="{{url('/event')}}">Event</a></li>
                    <li><a href="{{url('/reservasi/create')}}">Reserve</a></li>
                    <li>|</li>
                    <li class="profile">
                        <a href="" class="drop-menu">
                            @if (Auth::check() && Auth::user()->role == 'customer')
                                {{ Auth::user()->name }}
                            @else
                                Join Us
                            @endif
                        </a>
                        <ul class= "dropdown">
                            @if (!Auth::check())
                                <li><a href="{{url('/login')}}">Login</a></li>
                            @endif

                            @if (Auth::check() && Auth::user()->role == 'customer')
                                {{-- <li><a href="#">Invoice</a></li> --}}
                                <li><a href="{{url('/logout')}}">Log Out</a></li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('konten')

    <footer>
        <div class="footer-content">
            <div class="column left-align"> <!-- Tambahkan class left-align -->
                <div class="logo">
                    <img src="{{asset('/img/akasha/logo.png')}}" alt="">
                </div>
            </div>
            <div class="column right-align"> <!-- Tambahkan class right-align -->
                <div class="sosial">
                    <h4>Sosial Media</h4>
                    <div class="fot-content">
                        <p>
                            <a href="https://www.instagram.com/rumah.akasha/?hl=id">
                                <img src="{{asset('/img/instagram.png')}}" alt="#">
                                rumah.akasha
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="column right-align"> <!-- Tambahkan class right-align -->
                <div class="contact">
                    <h4>Kontak</h4>
                    <div class="fot-content">
                        <p>+62812912399 | Nobel</p>
                    </div>
                </div>
            </div>

            <div class="column right-align"> <!-- Tambahkan class right-align -->
                <div class="alamat">
                    <h4>Alamat</h4>
                    <div class="fot-content">
                        <p>Jl. Hasanudin No.35f, Samaan, Kec. Klojen, Kota Malang, Jawa Timur 65112</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
