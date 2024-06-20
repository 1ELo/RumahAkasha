@extends('master.layout-owner')

@section('konten')
    <link rel="stylesheet" href="{{ asset('css/owner/event.css') }}">
    <div class="main-content-wrapper">
        <div class="main-content">
            <div class="recent-grid">
                <div class="event">
                    <div class="card">
                        <div class="card-header">
                            <h3>Menu Non Coffee</h3>
                            <a class="add-btn" href="{{url('/owner/add-noncoffee')}}">+ Add</a>
                        </div>
                            <div class="scroll-container">
                                <div class="card-body">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($menu)
                                                @foreach ($menu as $item)
                                                <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td><img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$item->image))) }}" width="60px" height="60px" alt="Barista Image"></td>

                                                    <td>Rp{{$item->price}}</td>
                                                    <td>{{$item->description}}</td>
                                                    {{-- <td>{{$item->category}}</td> --}}
                                                    <td>
                                                        <form action="{{ route('destroy.noncoffee', $item->id_menu)}}" method="POST">
                                                            <a href="{{ route('edit.noncoffee', $item->id_menu) }}"  class="action-btn" title="Edit"><span class="las la-edit"></span></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="action-btn" title="Delete" onclick="confirmDelete('{{ $item->id_menu }}', '{{ $item->name }}')"><span class="las la-trash-alt"></span></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6">No data available</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <script>
                function confirmDelete(CoffeeID, CoffeName) {
                    if (confirm("Yakin hapus noncoffee: " + CoffeName + "?")) {
                        document.getElementById('delete-form-' + CoffeeID).submit();
                    }
                }
            </script>
@endsection


