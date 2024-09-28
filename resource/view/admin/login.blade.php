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
              <?php if (session('login_notify')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= session('login_notify'); ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php session('login_notify', 'unset'); ?>
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
                  </div>
                </div>

                <div data-mdb-input-init class="form-outline mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" onclick="togglePassword()">
                    <label class="form-check-label" for="flexCheckIndeterminate">Hiện mật khẩu</label>
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
</html>
<script>
  function togglePassword() {
    var passwordField = document.getElementById("passwordShow");
    
    if (passwordField.type === "password") {
      passwordField.type = "text";
    } else {
      passwordField.type = "password";
    }
  }
</script>
