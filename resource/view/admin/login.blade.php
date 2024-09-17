<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập Admin - Datahihi1-Lite</title>
    @include('admin.assets.style')
</head>
<body class="container-fluid">

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="{{BASE_URL.'public/adminLogin.svg'}}" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              <?php if (session('login_error')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= session('login_error'); ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php session('login_error', 'unset'); ?>
            <?php endif; ?>
              <form action="{{route('admin/login/check')}}" method="POST">
                
                <!-- Username input -->
                <div data-mdb-input-init class="form-outline mb-3">
                  <label class="form-label" for="form1Example13">Tên tài khoản</label>
                    <input type="text" id="form1Example13" class="form-control form-control-lg" name="username" />
                    <span></span>
                    </div>

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-3">
                  <label class="form-label" for="form1Example13">Email</label>
                  <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
                  <span></span>
                </div>
              
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-3">
                  <label class="form-label" for="passwordShow">Mật khẩu</label>
                  <div class="input-group">
                    <input type="password" id="passwordShow" class="form-control form-control-lg" name="password" />
                    <span class="input-group-text" onclick="togglePassword()">
                      <i class="fa fa-eye" id="toggleIcon"></i>
                    </span>
                  </div>
                </div>
              
                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-block">Đăng nhập</button>
      
                <div class="divider d-flex align-items-center my-3">
                  <p class="text-center fw-bold mx-3 mb-0 text-muted">Hoặc</p>
                </div>
      
                <a data-mdb-ripple-init class="btn btn-primary btn-block" style="background-color: green; color:#fff" href="#!"
                  role="button">
                  <i class="fab fa-google-f me-2"></i>Đăng nhập bằng Google
                </a>
      
              </form>
            </div>
          </div>
        </div>
      </section>
</body>
@include('admin.assets.script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
</html>
<script>
  function togglePassword() {
    var passwordField = document.getElementById("passwordShow");
    var icon = document.getElementById("toggleIcon");
    
    if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      passwordField.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>
