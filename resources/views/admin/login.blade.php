<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Lafayette Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color:#F5EBE0; font-family:'Montserrat',sans-serif; color:#4A3525; height:100vh; overflow:hidden; display:flex; align-items:center; justify-content:center; }
        .judul-elegan{ font-family:'Playfair Display', serif; font-weight:700; color:#8A6141; font-size:2,8rem; }
        .card-custom{ width:100%; max-width:430px; padding:1.4rem; border:none; border-radius:20px; box-shadow:0 15px 40px rgba(138,97,65,.15); background:#fff; }
        .form-control { border-color: #DBC4B1; color: #4A3525; border-radius: 10px; padding: 12px 15px; }
        .form-control:focus { border-color: #BA8E68; box-shadow: 0 0 0 0.25rem rgba(186, 142, 104, 0.25); }
       .btn-cokelat{
    background:#8A6141;
    color:#fff;
    border:none;
    border-radius:10px;
    padding:10px;
    font-weight:600;
    transition:.35s;
}
        .btn-cokelat:hover{

    background:#6B4324;

    color:#fff;

    transform:translateY(-3px);

    box-shadow:0 8px 20px rgba(107,67,36,.30);

}
        .judul-elegan{ font-family:'Playfair Display', serif; font-weight:700; color:#8A6141; font-size:2.8rem; line-height:1.1; margin-bottom:8px; }
        .input-group .btn { border-color: #DBC4B1; }
        .input-group .btn{ width:55px; }
        .form-control{ height:48px; }
        .btn-cokelat{ white-space: nowrap; }
        .btn-cokelat{ letter-spacing: 0.3px;}
        .btn-cokelat{ font-size: 1rem; }
        .form-label{ margin-bottom: 8px; }
        .form-control:focus{ border-color:#BA8E68; box-shadow:0 0 0 3px rgba(186,142,104,.15); }

        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes shake{

0%{transform:translateX(0);}

25%{transform:translateX(-8px);}

50%{transform:translateX(8px);}

75%{transform:translateX(-8px);}

100%{transform:translateX(0);}

}

.shake{

animation:shake .35s;

}
        .animasi-masuk { animation: fadeInUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }
        
        /* -- STYLE LOGO DIPOSISIKAN NORMAL DI DALAM KOTAK -- */
        .login-logo {  width:65px; height:65px; object-fit: cover; border-radius: 50%; margin-bottom: 15px; /* Jarak antara logo dan teks Lafayette Studio */ background-color: #FFFFFF; box-shadow: 0 5px 15px rgba(138, 97, 65, 0.1); /* Bayangan lembut */ }
        .login-alert{

    background:#FFF2F2;

    border-left:5px solid #DC3545;

    color:#B42318;

    border-radius:12px;

    padding:14px 18px;

    margin-bottom:18px;

    font-size:15px;

    text-align:left;

    animation:fadeInUp .4s;

}
    
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row justify-content-center m-0">
            <div class="col-lg-5 col-xl-4 animasi-masuk">
                <div class="card card-custom text-center {{ session('error') ? 'shake' : '' }}">
                    
                    <!-- Logo Lafayette diletakkan di dalam form -->
                    <img src="{{ asset('images/logo-lafayette.png') }}" alt="Logo Lafayette" class="login-logo mx-auto">
                    
                    <h2 class="judul-elegan mb-2">
                        Lafayette Studio
                    </h2>
                    <p class="text-muted mb-3" style="font-size:14px;">
                        Sistem Informasi Reservasi dan Check-in Customer
                    </p>

                    @if(session('error'))

                <div class="login-alert">

                <i class="bi bi-exclamation-circle-fill me-2"></i>

                {{ session('error') }}

                </div>
                @endif
                    
                    <form id="loginForm" action="{{ route('admin.authenticate') }}" method="POST">
                        @csrf
                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold" style="color: #BA8E68;">Email / Username</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email admin" autofocus required>
                        </div>
                        <div class="mb-4 text-start">

    <label class="form-label fw-bold" style="color: #BA8E68;">
        Password
    </label>

    <div class="input-group">

        <input
            type="password"
            id="password"
            name="password"
            class="form-control"
            placeholder="••••••••"
            required>

        <button
            type="button"
            class="btn btn-outline-secondary px-3"
            onclick="togglePassword()">

            <i id="eye-icon" class="bi bi-eye">
        </i>
        </button>

    </div>

</div>
                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-cokelat" id="loginBtn">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        <span id="btnText">
                        Masuk ke Dashboard
                        </span>

                        </button>

                        </div>
                    </form>

                        <div class="mt-3">
                    <small class="text-muted">
                        © 2026 Lafayette Photo Studio
                    </small>
                    </div>

                </div>
            </div>
        </div>
    </div>

<script> function togglePassword()
{
    const password =
        document.getElementById('password');

    const icon =
        document.getElementById('eye-icon');

    if(password.type === 'password')
    {
        password.type = 'text';

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    }
    else
    {
        password.type = 'password';

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}


// ===========================
// Loading Button
// ===========================

document
.getElementById("loginForm")
.addEventListener("submit", function () {

    const btn =
        document.getElementById("loginBtn");

    const text =
        document.getElementById("btnText");

    btn.disabled = true;

    text.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2"></span>
        Memproses...
    `;

});

</script>

</body>
</html>