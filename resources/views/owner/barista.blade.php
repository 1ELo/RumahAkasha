@extends ('master.layout-owner')
@section('konten')
    <link rel="stylesheet" href="{{ asset('css/owner/event.css') }}">
    <div class="main-content-wrapper">
        <div class="main-content">
            <div class="recent-grid">
                <div class="event">
                    <div class="card">
                        <div class="card-header">
                            <h3>Barista</h3>
                            <a class="add-btn" href="{{url('/owner/add-barista')}}">+ Add</a>
                        </div>
                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Years of Experience</th>
                                        <th>Job Desk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($baristas as $barista)
                                        <tr>
                                            <td>
                                                <img src="{{ asset(str_replace('/mnt/laravel_barista_images/', '/img/barista/', str_replace('../public', '',$barista->foto_barista))) }}" width="60px" height="60px" alt="Barista Image">
                                            </td>
                                            <td>{{ $barista->nama_barista }}</td>
                                            <td>{{ $barista->deskripsi }}</td>
                                            <td>{{ $barista->tahun_kerja }}</td>
                                            <td>{{ $barista->job_desk }}</td>
                                            <td>
                                                <form action="{{ route('destroy.barista', $barista->id_barista) }}" method="POST" style="display:inline;">
                                                    <a href="{{ route('edit.barista', $barista->id_barista) }}" class="action-btn" title="Edit"><span class="las la-edit"></span></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn" title="Delete" onclick="confirmDelete('{{ $barista->id_barista }}', '{{ $barista->nama_barista }}')"><span class="las la-trash-alt"></span></button>
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

    <script>
        function confirmDelete(baristaID, baristaName) {
            if (confirm("Yakin hapus barista: " + baristaName + "?")) {
                document.getElementById('delete-form-' + baristaID).submit();
            }
        }
    </script>
@endsection
