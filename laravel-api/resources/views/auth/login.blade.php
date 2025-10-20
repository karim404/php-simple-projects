<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>تسجيل الدخول</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons (اختياري) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .auth-card { max-width: 420px; width: 100%; border-radius: 12px; }
  </style>
</head>
<body>
  <div class="card shadow-sm auth-card">
    <div class="card-body p-4">
      <h4 class="mb-3 text-center">تسجيل الدخول</h4>



            <form class="needs-validation" novalidate method="POST" action="{{route('login.authenticate')}}">
              @csrf
                <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    
                    <input id="email" name="email" type="email" class="form-control" placeholder="example@domain.com" required>
                     @error('email')
                      <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="invalid-feedback">مطلوب بريد إلكتروني صالح.</div>
                </div>
                </div>

                <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>


                    <input id="password" name="password" type="password" class="form-control"  required>
                     @error('password')
                      <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="invalid-feedback">يرجى إدخال كلمة المرور.</div>
                </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">

                    <input class="form-check-input" type="checkbox" id="remember" name="remember">

                    <label class="form-check-label" for="remember">تذكرني</label>
                </div>
                <a href="#" class="small">نسيت كلمة المرور؟</a>
                </div>

                <button type="submit" class="btn btn-primary w-100">دخول</button>

                <div class="text-center mt-3">
                <small>مش مسجل؟ <a href="{{route('register.show')}}">إنشاء حساب</a></small>
                </div>
            </form>


    </div>
  </div>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Simple Bootstrap validation script -->
  {{-- <script>
    (function () {
      'use strict'
      var forms = document.querySelectorAll('.needs-validation')
      Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script> --}}
</body>
</html>
