@extends('master.layout')
@section('css')
<link rel="stylesheet" href="{{asset('css/homepage/navbar.css')}}">
@endsection
@section('konten')
<head>
<link rel="stylesheet" href="{{asset('css/homepage/profile.css')}}">
</head>
@section('konten')
    <section>
        <h1 class="header">Our History</h1>
        <div class="cerita">
            <div class="cerita-img">
                <img src="/img/pokeball.png" alt="">
            </div>
            <div class="cerita-content">
                <h4>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta suscipit enim quisquam accusamus inventore, alias architecto illo doloremque omnis similique dolorum reiciendis consectetur dolorem facere beatae. Reiciendis dolorem ut numquam!
                    Provident harum, consectetur debitis eum sapiente fugit praesentium? Dignissimos, hic? Molestiae consequatur doloribus ab sequi rem, sunt sit consectetur earum veritatis commodi doloremque labore iusto repellendus ex fugiat saepe nostrum?
                </h4>
            </div>
        </div>
    </section>

    <section>
        <h1 class="header">About Rumah Akasha</h1>
        <div class="cerita">
            <div class="cerita-content">
                <h4>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta suscipit enim quisquam accusamus inventore, alias architecto illo doloremque omnis similique dolorum reiciendis consectetur dolorem facere beatae. Reiciendis dolorem ut numquam!
                    Provident harum, consectetur debitis eum sapiente fugit praesentium? Dignissimos, hic? Molestiae consequatur doloribus ab sequi rem, sunt sit consectetur earum veritatis commodi doloremque labore iusto repellendus ex fugiat saepe nostrum?
                </h4>
            </div>

            <div class="cerita-img">
                <img src="/img/pokeball.png" alt="">
            </div>
        </div>
    </section>

    <section>
<<<<<<< HEAD
        <h1 class="header our-barista">Our Family</h1>
        <div class="bar">
        {{-- <h4 class="strip">---------------------------------------------------------------------</h4> --}}
        </div>
        <div class="grid-container">
            @foreach ($barista as $baristas)
                <div class="card">
                    <img src="{{ asset(str_replace('../public', '', $baristas->foto_barista)) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-text">
                            <div class="barista">
                                <h2><b>{{$baristas->nama_barista}}</b></h2>
                            </div>
                            <div class="jobdesk">
                                <h1>{{$baristas->job_desk}} | {{$baristas->tahun_kerja}}</h1>
                            </div>
                            {{-- <hr> --}}
                            <br>
                            <div class="deskripsi">
                                <h1><i><q>{{$baristas->deskripsi}}</q></i></h1>
                            </div>
                            {{-- <div class="tahun_kerja">
                                <h1>{{$baristas->tahun_kerja}}</h1>
                            </div> --}}
                        </div>
                    </div>
=======
        <h1 class="header our-barista">Our Barista</h1>
        <div class="grid-container">
            <div class="card">
                <img src="/img/6.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul></p>
>>>>>>> parent of c7d7ae7 (registrasi_event_done)
                </div>
            </div>
            <div class="card">
                <img src="/img/6.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul></p>
                </div>
            </div>
            <div class="card">
                <img src="/img/6.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul></p>
                </div>
            </div>

            <div class="card">
                <img src="/img/6.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul></p>
                </div>
            </div>
            <div class="card">
                <img src="/img/6.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul></p>
                </div>
            </div>
            <div class="card">
                <img src="/img/6.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul></p>
                </div>
            </div>
        </div>
    </section>
@endsection
