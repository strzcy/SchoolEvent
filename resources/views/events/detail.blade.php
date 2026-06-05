@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow">
            <div class="row g-0">
                <div class="col-md-5">
                    @if($event->poster)
                        <img src="{{ asset('storage/' . $event->poster) }}" class="img-fluid rounded-start" alt="{{ $event->title }}" style="height: 100%; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white text-center py-5 h-100 d-flex align-items-center justify-content-center">
                            <i class="fas fa-image fa-4x"></i>
                        </div>
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <span class="badge mb-3 p-2" style="background: #173648; color: white;">{{ $event->category }}</span>
                        <h2 class="card-title">{{ $event->title }}</h2>
                        
                        <div class="mb-3">
                            <p class="mb-1"><i class="fas fa-calendar-alt" style="color: #173648;"></i> <strong>Tanggal:</strong> {{ date('d F Y', strtotime($event->date)) }}</p>
                            <p class="mb-1"><i class="fas fa-users"></i> <strong>Kuota Peserta:</strong> {{ $event->quota }} orang</p>
                        </div>
                        
                        <div class="mb-4">
                            <h5><i class="fas fa-align-left"></i> Deskripsi Acara</h5>
                            <p class="text-muted">{{ $event->description }}</p>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('home') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection