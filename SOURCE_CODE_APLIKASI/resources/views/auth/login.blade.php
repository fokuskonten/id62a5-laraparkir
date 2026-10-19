@extends('layouts.app')

@section('content')
<div class="container-fluid" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #f8fafc; padding: 20px 0;">
    <div class="row justify-content-center" style="width: 100%; max-width: 480px;">
        <div class="col-12">
            <div class="text-center mb-3">
                <img src="{{ asset('logo.png') }}" alt="LaraParkir Logo" style="width: 72px; height: 72px; border-radius: 50%; object-fit: cover; box-shadow: 0 4px 12px rgba(0,0,0,0.15); border: 3px solid #ffffff;">
                <h3 class="mt-2 font-weight-bold" style="color: #0f172a; letter-spacing: -0.5px;">LaraParkir</h3>
                <p class="text-muted small mb-0">Sistem Parkir Kendaraan Otomatis & Cetak Karcis</p>
            </div>

            <div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h5 class="mb-0 font-weight-bold"><span class="fa fa-lock mr-2"></span> Portal Autentikasi</h5>
                </div>
                
                <div class="card-body p-4">
                    <!-- Quick 1-Click Credentials -->
                    <div class="p-3 mb-3 bg-light rounded border text-center">
                        <small class="text-muted d-block mb-2 font-weight-bold">Akses Demo 1-Klik:</small>
                        <button type="button" class="btn btn-sm btn-outline-primary mr-1" onclick="fillCred('admin', 'admin')">
                            <span class="fa fa-user-shield"></span> Admin
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="fillCred('operator@parkir.local', 'admin')">
                            <span class="fa fa-id-card"></span> Operator Loket
                        </button>
                    </div>

                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="font-weight-bold small text-muted">Username / Email</label>
                            <input type="text" id="inputEmail" name="email" value="{{ old('email', 'admin') }}" placeholder="Masukkan username atau email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus autocomplete="username">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback d-block">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold small text-muted">Kata Sandi (Password)</label>
                            <input type="password" id="inputPassword" name="password" value="admin" placeholder="Masukkan password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required autocomplete="current-password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback d-block">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-dark btn-block py-2 font-weight-bold mt-4" style="border-radius: 8px;">
                            Masuk ke Sistem <span class="fa fa-arrow-right ml-1"></span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3" style="font-size: 12px; color: #64748b; font-family: sans-serif;">
                Didukung oleh <a href="https://fokuskonten.my.id" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none;">FokusKonten</a> &bull; Solusi Aset Digital Terpercaya
            </div>
        </div>
    </div>
</div>

<script>
function fillCred(u, p) {
    var emailEl = document.getElementById('inputEmail');
    var passEl = document.getElementById('inputPassword');
    if (emailEl) emailEl.value = u;
    if (passEl) passEl.value = p;
}
</script>
@endsection
