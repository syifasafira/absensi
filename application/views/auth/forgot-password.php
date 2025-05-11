<body>
  <!-- loader starts-->
  <div class="loader-wrapper">
    <div class="loader-index"> <span></span></div>
    <svg>
      <defs></defs>
      <filter id="goo">
        <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
        <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
      </filter>
    </svg>
  </div>
  <!-- loader ends-->
  <!-- tap on top starts-->
  <div class="tap-top"><i data-feather="chevrons-up"></i></div>
  <!-- tap on tap ends-->
  <!-- page-wrapper Start-->
  <div class="page-wrapper">
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12">
          <div class="login-card login-dark">
            <div>
              <div><a class="logo" href="#"><img class="img-fluid for-light" src="<?= base_url('/assets'); ?>/images/logo/" alt="looginpage"></a></div>
              <div class="login-main">
                <div class="form-group">
                  <label class="col-form-label">Enter Your Email Address</label>
                  <input class="form-control mb-1" type="email" placeholder="yourname@example.com" required>
                  <div class="text-end mt-3">
                    <button class="btn btn-primary btn-block m-t-10" type="submit">Send</button>
                  </div>
                </div>

                <div class="mt-4 mb-4"><span class="reset-password-link">If don't receive OTP?  <a class="btn-link text-danger" href="#">Resend</a></span></div>
                <div class="form-group">
                  <label class="col-form-label pt-0">Enter OTP</label>
                  <div class="row">
                    <div class="col">
                      <input class="form-control text-center opt-text" type="text" value="00" maxlength="2">
                    </div>
                    <div class="col">
                      <input class="form-control text-center opt-text" type="text" value="00" maxlength="2">
                    </div>
                    <div class="col">
                      <input class="form-control text-center opt-text" type="text" value="00" maxlength="2">
                    </div>
                  </div>
                </div>
                <h6 class="mt-4">Create Your Password</h6>
                <div class="form-group">
                  <label class="col-form-label">New Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Retype Password</label>
                  <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                </div>
                <div class="form-group mb-0">
                  <div class="form-check">
                    <input class="checkbox-primary form-check-input" id="checkbox1" type="checkbox">
                    <label class="text-muted form-check-label" for="checkbox1">Remember password</label>
                  </div>
                  <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Done </button>
                </div>
                <p class="mt-4 mb-0 text-center">Already have an password?<a class="ms-2" href="<?= base_url('/auth'); ?>">Sign in</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>