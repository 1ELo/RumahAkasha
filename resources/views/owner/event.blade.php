@extends('master.layout-owner')

@section('konten')
    <link rel="stylesheet" href="{{ asset('css/owner/event.css') }}">
    <div class="main-content-wrapper">
        <div class="main-content">
            <div class="recent-grid">
                <div class="event">
                    <div class="card">
                        <div class="card-header">
                            <h3>Akasha Event</h3>
                            <a class="add-btn" href="{{url('/owner/create-event')}}">+ Add</a>
                        </div>
                            <div class="scroll-container">
                                <div class="card-body">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Fee</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($events as $event)
                                            <tr>
                                                <td>{{$event->title}}</td>
                                                <td>{{$event->date}}</td>
                                                <td>{{$event->time}}</td>
                                                <td><img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$event->image))) }}" width="60px" height="60px" alt="Barista Image"></td>
                                                <td>{{$event->description}}</td>
                                                <td>Rp {{$event->fee}}</td>
                                                <td>
                                                    <span class="status
                                                        @if ($event->status == 'done') green
                                                        @elseif ($event->status == 'Pending') orange
                                                        @elseif ($event->status == 'in_progress') pink
                                                        @else ''
                                                        @endif">
                                                    </span>
                                                    {{$event->status}}
                                                </td>
                                                <td>
                                                    <form action="{{ route('destroy.event', $event->id) }}" method="POST">
                                                        <a href="{{url('/api/edit-event/{{$event->id}}')}}" class="action-btn" title="Edit"><span class="las la-edit"></span></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn" title="Delete" onclick="confirmDelete('{{$event->id}}', '{{$event->title}}')"><span class="las la-trash-alt"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(eventID, eventName) {
            if (confirm("Yakin hapus event: " + eventName + "?")) {
                document.getElementById('delete-form-' + eventID).submit();
            }
        }
    </script>
@endsection
