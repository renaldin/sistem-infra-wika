@extends('auth.main')

@section('content')
    <section class="login-content" style="height: 100vh; overflow: hidden; position: relative;">
        <div class="row m-0" style="height: 100%;">
            <div class="col-md-12 p-0" style="height: 100%;">
                <img src="{{ asset('templateLanding/img/bglogin.jpg') }}"
                    class="img-fluid gradient-main" alt="images" style="height: 100%; width: 100%; object-fit: cover;">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card" style="width: 80%; max-width: 400px;">
                    <div class="card-body" style="background-color: blue @media">
                        <div class="d-flex justify-content-between align-items-center" >
                            <div class="d-flex align-items-center" style="justify-content: space-between;">
                                <a href="{{ asset('template/html/dashboard/index.html') }}" class="navbar-brand">
                                    <!-- Logo kiri -->
                                    <img src="{{ asset('templateLanding/img/bumn.png') }}" width="150" alt="Logo Kiri" style="margin-left: -56px;">
                                </a>
                                <a href="{{ asset('template/html/dashboard/index.html') }}" class="navbar-brand">
                                    <!-- Logo kanan -->
                                    <img src="{{ asset('templateLanding/img/wikainfra.png') }}" width="200" alt="Logo Kanan" style="margin-left:60px;" class="logo-kanan w-100">
                                </a>
                            </div>
                        </div>
                        
                        <p class="text-center mx-auto my-0" style="color: black">Hallo Sobat Infra,</p> 
                        <p class="text-center" style="color: black">Selamat Datang di Portal Integrasi
                            Infrastructure 2 Division
                        </p>
                        <h2 class="mb-2 text-center">{{ $title }}</h2>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="row">
                                @if (session('success'))
                                    <div class="col-lg-12">
                                        <div class="alert bg-primary text-white alert-dismissible">
                                            <span>
                                                <svg width="32" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                {{ session('success') }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                                @if (session('fail'))
                                    <div class="col-lg-12">
                                        <div class="alert bg-danger text-white alert-dismissible">
                                            <span>
                                                <svg width="32" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                                {{ session('fail') }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="nik" class="form-label" style="color: black">NIP</label>
                                        <input type="text"
                                            class="form-control @error('nip') is-invalid @enderror" name="nip"
                                            id="nip" aria-describedby="nip" placeholder=" " autofocus >
                                        @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="password" class="form-label" style="color: black">Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" aria-describedby="password" placeholder=" " >
                                            <span class="input-group-text" style="cursor: pointer;" id="togglePassword">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1614 12.0531C15.1614 13.7991 13.7454 15.2141 11.9994 15.2141C10.2534 15.2141 8.83838 13.7991 8.83838 12.0531C8.83838 10.3061 10.2534 8.89111 11.9994 8.89111C13.7454 8.89111 15.1614 10.3061 15.1614 12.0531Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.998 19.355C15.806 19.355 19.289 16.617 21.25 12.053C19.289 7.48898 15.806 4.75098 11.998 4.75098H12.002C8.194 4.75098 4.711 7.48898 2.75 12.053C4.711 16.617 8.194 19.355 12.002 19.355H11.998Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                            </span>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-lg-12 d-flex justify-content-end">
                                    <a href="/lupa-password">Lupa Password?</a>
                                </div> --}}
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary" style="border-radius: 15px; padding: 10px 20px;">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
    </section>
    <style>
        /* CSS untuk mengatur form login */
        .auth-card {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.74); /* Transparan */
            border-radius: 30px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(226, 226, 226, 0.685);
        }
    </style>
@endsection
