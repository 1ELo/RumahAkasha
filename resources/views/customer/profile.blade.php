@extends('master.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/homepage/navbar.css') }}">
@endsection
@section('konten')
<head>
<link rel="stylesheet" href="{{ asset('css/homepage/profile.css') }}">
</head>
<section>
    <h1 class="header">Our History</h1>
    <div class="cerita">
        <div class="cerita-img">
            <img src="{{asset('img/akasha/img3.jpg')}}" alt="">
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
            <img src="{{asset('img/akasha/img8.JPG')}}" alt="">
        </div>
    </div>
</section>

<section>
    <h1 class="header our-barista">Our Family</h1>
    <div class="grid-container">
        @foreach ($barista as $baristas)
            <div class="card">
                <img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$barista->foto_barista)))}}" class="card-img-top">
                <div class="card-body">
                    <div class="card-text">
                        <div class="barista">
                            <h2><b>{{ $baristas->nama_barista }}</b></h2>
                        </div>
                        <div class="jobdesk">
                            <h1>{{ $baristas->job_desk }} | {{ $baristas->tahun_kerja }}</h1>
                        </div>
                        <br>
                        <div class="deskripsi">
                            <h1><i><q>{{ $baristas->deskripsi }}</q></i></h1>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
