  <!-- login page start-->
  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-12 p-0">
        <div class="login-card login-dark">
          <div>
            <div><a class="logo" href="#"><img class="img-fluid for-light" src="<?= base_url('/assets') ?>/images/logo/" alt="loginpage"></a></div>
            <div class="login-main create-account">
              <form class="theme-form" method="post" action="<?= base_url('auth/register'); ?>">
                <h4>Create your account</h4>
                <p>Enter your personal details to create account</p>

                <div class="form-group">
                  <label class="col-form-label">Your Name</label>
                  <input class="form-control" type="text" name="nama" id="nama" placeholder="Your name" value="<?= set_value('nama'); ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Email Address</label>
                  <input class="form-control" type="text" name="email" id="email" placeholder="example@gmail.com" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="password" id="password" placeholder="*********">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="show-hide"><span class="show"></span></div>
                  </div>
                </div>

                <div class="form-group mb-0">
                  <div class="form-check">
                    <input class="checkbox-primary form-check-input" id="checkbox1" type="checkbox" required>
                    <label class="text-muted form-check-label" for="checkbox1">I agree to the terms & conditions and <a class="ms-2" href="#">Privacy Policy</a></label>
                  </div>
                  <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Create Account</button>
                </div>

                <h6 class="text-muted mt-4 or">Or create your account with</h6>
                <div class="social mt-4">
                  <div class="btn-showcase">
                    <a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                    <a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a class="btn btn-light" href="https://www.google.com/" target="_blank"><i class="fa-brands fa-google"></i></a>
                  </div>
                </div>

                <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="<?= base_url('auth'); ?>">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>