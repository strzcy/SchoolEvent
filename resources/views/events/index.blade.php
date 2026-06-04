@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12 text-center">
        <h1 class="text-white mb-3">✨ Daftar Acara Sekolah ✨</h1>
        <p class="text-white-50">Temukan acara menarik dan ikuti keseruannya!</p>
        
        @auth
            @if(Auth::user()->email === 'admin@school.com')
                <a href="{{ route('events.create') }}" class="btn btn-success mt-2">
                    <i class="fas fa-plus-circle"></i> Tambah Acara Baru
                </a>
            @endif
        @endauth
    </div>
</div>

<div class="row g-4">
    @forelse($events as $event)
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card h-100">
                @if($event->poster)
                    <img src="{{ asset('storage/' . $event->poster) }}" class="card-img-top event-poster" alt="{{ $event->title }}">
                @else
                    <div class="bg-secondary text-white text-center py-5">No Poster</div>
                @endif
                
                <div class="card-body">
                    <span class="badge bg-primary mb-2">{{ $event->category }}</span>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text text-muted">
                        <i class="fas fa-calendar"></i> {{ date('d M Y', strtotime($event->date)) }}<br>
                        <i class="fas fa-users"></i> Kuota: {{ $event->quota }} peserta
                    </p>
                    <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 pb-3">
                    <div class="d-grid gap-2">
                        <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i> Lihat Detail Acara
                        </a>
                        
                        {{-- Tombol Edit & Hapus - Hanya untuk Admin yang login --}}
                        @auth
                            @if(Auth::user()->email === 'admin@school.com')
                                <div class="btn-group mt-2" role="group">
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $event->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Modal Konfirmasi Hapus untuk setiap event --}}
        @auth
            @if(Auth::user()->email === 'admin@school.com')
                <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $event->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="deleteModalLabel{{ $event->id }}">
                                    <i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus acara:</p>
                                <h5 class="text-danger">{{ $event->title }}</h5>
                                <p class="text-muted">Tindakan ini tidak dapat dibatalkan!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Ya, Hapus!
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> Belum ada acara. 
                @auth
                    @if(Auth::user()->email === 'admin@school.com')
                        <a href="{{ route('events.create') }}">Silakan tambah acara pertama!</a>
                    @else
                        Silakan tunggu admin menambahkan acara.
                    @endif
                @else
                    Silakan login sebagai admin untuk menambah acara.
                @endauth
            </div>
        </div>
    @endforelse
</div>

{{-- Tambahan style untuk tombol --}}
<style>
    .btn-group .btn {
        border-radius: 5px;
        margin: 0 3px;
    }
    .btn-warning {
        color: white;
        background-color: #ff9800;
    }
    .btn-warning:hover {
        background-color: #e68900;
        color: white;
    }
    .btn-danger {
        background-color: #f44336;
    }
    .btn-danger:hover {
        background-color: #da190b;
    }
</style>
@endsection