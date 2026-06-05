@extends('layouts.app')

@section('content')
<div class="row justify-content-center min-vh-100 align-items-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-gradient-primary text-white text-center py-4" style="background: #173648;">
                      <br> <h3 class="mb-0">Login SchoolEvent</h3>
                <p class="mb-0 mt-2">Masuk ke akun Anda</p> 
                <br>
            </div>
            
            <div class="card-body p-5">
                <!-- Session Status -->
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
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
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email Address -->
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
                                   autofocus 
                                   placeholder="Masukkan email Anda">
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
                                   placeholder="Masukkan password">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <br>
                    
                    <!-- Login Button -->
                    <button type="submit" class="btn w-100 mb-3 py-2 fw-bold" style="background: #173648; color: white;">
                        Login
                    </button>
                    
                    
                    <hr>
                    
                    <!-- Register Link -->
                    <div class="text-center mt-3">
                        <p class="mb-0">Belum punya akun? 
                            <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: #173648;">
                                Register sekarang!
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