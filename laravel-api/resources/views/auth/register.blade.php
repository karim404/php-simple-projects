
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>إنشاء حساب</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #f7fff6 0%, #f1f7ff 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .auth-card { max-width: 520px; width: 100%; border-radius: 12px; }
  </style>
</head>
<body>
  <div class="card shadow-sm auth-card">
    <div class="card-body p-4">
      <h4 class="mb-3 text-center">إنشاء حساب جديد</h4>



                <form class="needs-validation" novalidate method="post" action="{{route('register.store')}}">
                    
                    @csrf
                    <div class="mb-3">
                    <label for="fullname" class="form-label">الاسم الكامل</label>
                    <input id="fullname" name="name" type="text" value="{{old('name')}}" class="form-control" placeholder="أدخل اسمك " required>
                    {{-- <div class="invalid-feedback">الاسم مطلوب.</div> --}}
                    @error('name')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="mb-3">
                    <label for="regEmail" class="form-label">البريد الإلكتروني</label>

                    <input id="regEmail" name="email" type="email" value="{{old('email')}}" class="form-control" placeholder="example@domain.com" required>
                    {{-- <div class="invalid-feedback">أدخل بريداً إلكترونياً صالحاً.</div> --}}

                    @error('email')
                      <span class="text-danger">{{$message}}</span>
                    @enderror

                    </div>

                    <div class="mb-3">
                    <label for="regPassword" class="form-label">كلمة المرور</label>
                    <input id="regPassword" name="password" type="password" value="{{old('password')}}"  class="form-control" placeholder="كلمة المرور" minlength="6" required>
                    {{-- <div class="invalid-feedback">الحد الأدنى 6 حروف.</div> --}}

                    @error('password')
                      <span class="text-danger">{{$message}}</span>
                    @enderror

                    </div>

                    <div class="mb-3">
                    <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                                                        <!--لازم اخلي الname = password_confirmation عشان لارافيل تمسكه -->
                    <input id="confirmPassword" name="password_confirmation" type="password" value="{{old('password_confirmation')}}" class="form-control" placeholder="أعد كتابة كلمة المرور" required>
                    <div class="invalid-feedback">يرجى تأكيد كلمة المرور.</div>

                    @error('password_confirmation')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    </div>

                    <div class="form-check mb-3">
                    <input class="form-check-input" name="remember" type="checkbox" id="terms"  required>
                    <label class="form-check-label" for="terms">أوافق على الشروط والأحكام</label>
                    {{-- <div class="invalid-feedback">يجب الموافقة على الشروط للمتابعة.</div> --}}
                    </div>

                    <button type="submit" class="btn btn-success w-100">تسجيل</button>

                    <div class="text-center mt-3">
                    <small>لديك حساب؟ <a href="{{route('login.show')}}">دخول</a></small>
                    </div>
                </form>


    </div>
  </div>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Simple Bootstrap validation + password match check -->
  {{-- <script>
    (function () {
      'use strict'
      var forms = document.querySelectorAll('.needs-validation')
      Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
          var pwd = form.querySelector('#regPassword')
          var conf = form.querySelector('#confirmPassword')
          if (pwd && conf && pwd.value !== conf.value) {
            conf.setCustomValidity('mismatch')
          } else if (conf) {
            conf.setCustomValidity('')
          }

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
