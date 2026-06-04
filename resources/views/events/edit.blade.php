@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4 class="mb-0"><i class="fas fa-edit"></i> Edit Acara</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Acara *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $event->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori *</label>
                        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="Olahraga" {{ $event->category == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="Seni Budaya" {{ $event->category == 'Seni Budaya' ? 'selected' : '' }}>Seni & Budaya</option>
                            <option value="Akademik" {{ $event->category == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Teknologi" {{ $event->category == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                            <option value="Sosial" {{ $event->category == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">Tanggal Acara *</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $event->date) }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="quota" class="form-label">Kuota Peserta *</label>
                            <input type="number" class="form-control @error('quota') is-invalid @enderror" id="quota" name="quota" value="{{ old('quota', $event->quota) }}" required>
                            @error('quota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $event->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    @if($event->poster)
                        <div class="mb-3">
                            <label class="form-label">Poster Saat Ini</label><br>
                            <img src="{{ asset('storage/' . $event->poster) }}" alt="Poster" style="max-height: 150px;">
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="poster" class="form-label">Ganti Poster (Opsional)</label>
                        <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG. Max 2MB</small>
                        @error('poster')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('home') }}" class="btn btn-secondary me-md-2">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-update"></i> Update Acara
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection