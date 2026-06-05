@extends('layouts.app')

@section('content')
<div class="row justify-content-center min-vh-100 align-items-center py-5">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-apa text-white text-center py-4" style="background: #173648;">
                <h3 class="mb-0">Daftar Akun</h3>
                <p class="mb-0 mt-2">Bergabung dengan SchoolEvent</p>
            </div>
            
            <div class="card-body p-5">
                <!-- Error Messages -->
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">
                            Nama Lengkap
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent">
                                <i class="fas fa-user text-muted"></i>
                            </span>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required 
                                   autofocus 
                                   placeholder="Masukkan nama lengkap">
                        </div>
                        @error('name')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold">
                            Email Address
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent">
                                <i class="fas fa-envelope text-muted"></i>
                            </span>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   placeholder="Masukkan email aktif">
                        </div>
                        @error('email')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold">
                            Password
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent">
                                <i class="fas fa-key text-muted"></i>
                            </span>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   required 
                                   placeholder="Minimal 8 karakter">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-bold">
                            Konfirmasi Password
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent">
                                <i class="fas fa-check text-muted"></i>
                            </span>
                            <input type="password" 
                                   class="form-control" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   required 
                                   placeholder="Ulangi password">
                        </div>
                    </div>
                    
                    <!-- Register Button -->
                    <button type="submit" class="btn w-100 mb-3 py-2 fw-bold" style="background: #173648; color: white;">
                        <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                    </button>
                    
                    <hr>
                    
                    <!-- Login Link -->
                    <div class="text-center mt-3">
                        <p class="mb-0">Sudah punya akun? 
                            <a href="{{ route('login') }}" class="fw-bold text-decoration-none">
                                Login disini!
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Toggle Password Script -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    }
</script>
@endsection