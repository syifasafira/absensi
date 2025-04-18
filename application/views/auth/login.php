  <body>
    <!-- login page start-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 p-0">
          <div class="login-card login-dark">
            <div>
              <div><a class="logo" href="#"><img class="img-fluid for-light" src="<?= base_url('/assets') ?>/images/logo/logo.png" alt="looginpage"></a></div>
              <div class="login-main">
                <form class="theme-form">
                  <h4>Sign in to account</h4>
                  <p>Enter your email & password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" required="" placeholder="test@gmail.com">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                      <div class="show-hide"><span class="show"> </span></div>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="form-check">
                      <input class="checkbox-primary form-check-input" id="checkbox1" type="checkbox">
                      <label class="text-muted form-check-label" for="checkbox1">Remember password</label>
                    </div><a class="link" href="<?= base_url('/auth/ForgotPassword'); ?>">Forgot password?</a>
                    <div class="text-end">
                      <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Sign in</button>
                    </div>
                  </div>
                  <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="fa-brands fa-x-twitter"></i></a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a><a class="btn btn-light" href="https://www.google.com/" target="_blank"><i class="fa-brands fa-google"></i></a></div>
                  </div>
                  <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="<?= base_url('/auth/register'); ?>">Create Account</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>