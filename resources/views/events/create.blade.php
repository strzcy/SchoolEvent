@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header text-white" style="background: #173648;">
                <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Tambah Acara Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Acara *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori *</label>
                        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Seni Budaya">Seni & Budaya</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Sosial">Sosial</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">Tanggal Acara *</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="quota" class="form-label">Kuota Peserta *</label>
                            <input type="number" class="form-control @error('quota') is-invalid @enderror" id="quota" name="quota" value="{{ old('quota') }}" required>
                            @error('quota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="poster" class="form-label">Poster Acara *</label>
                        <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG. Max 2MB</small>
                        @error('poster')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('home') }}" class="btn btn-secondary me-md-2">Batal</a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Simpan Acara
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection