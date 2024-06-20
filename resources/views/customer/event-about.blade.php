@extends('master.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('css/homepage/navbar.css')}}">
@endsection
@section('konten')
    <head>
        <link rel="stylesheet" href="{{ asset('css/homepage/event-about.css') }}">
    </head>
    <div class="join-us">
        <h1>{{ $event->title }}</h1>
    </div>
    <section id="background-event" class="up-event">
    </section>

    <section class="event-container">
        <div class="event_image">
            <img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$event->image))) }}" alt="image_event">
        </div>

        <div class="event-details">
            <div class="description">
                <div class="title-event">
                    <h1>Grab Your Seat !</h1>
                    <h3>Event will be held on <b>{{ $event->date }}</b> at <b>{{ $event->time }}</b></h3>
                </div>

                <div class="sub-topic">
                    <h2>Event Description:</h2>
                    <p>{{ $event->description }}</p>
                </div>
            </div>

            @if($event->status == 'in_progress')
                <div class="registration">
                    @if($isRegistered)
                        <button class="button-submit" disabled>Registered</button>
                        <h4>Registration ID : {{$registrasiEventdata->id_registrasievent}}</h4>
                    @else
                        <form action="{{ route('register.event', $event->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_event" value="{{ $event->id }}">
                            <input type="hidden" name="id_customer" value="{{ auth()->user()->id }}">
                            <button type="submit" class="button-submit">Register Here!</button>
                        </form>
                    @endif

                    <div class="fee">
                        <h5>Fee: Rp. {{$event->fee}}</h5>
                    </div>
                    <p class="reminder"><i>*please go to the cashier to claim your event registration</i></p>
                </div>
            @else
                <div class="fee">
                    <h5>This event is no longer available for registration.</h5>
                </div>
            @endif
        </div>
    </section>

    @if(session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Registration Successful</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>

@endsection
