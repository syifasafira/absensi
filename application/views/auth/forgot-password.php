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
  <!-- tap on top ends-->

  <!-- page-wrapper Start-->
  <div class="page-wrapper">
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12">
          <div class="login-card login-dark">
            <div>
              <div>
                <a class="logo" href="#"><img class="img-fluid for-light" src="<?= base_url('/assets'); ?>/images/logo/" alt="loginpage"></a>
              </div>
              <div class="login-main">
                <!-- Form forgot password mulai di sini -->
                <?= $this->session->flashdata('message'); ?>


                <form method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                  <div class="form-group">
                    <label class="col-form-label">Enter Your Email Address</label>
                    <input class="form-control mb-1" type="email" name="email" placeholder="yourname@example.com" required>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block m-t-10" type="submit">Send</button>
                    </div>
                  </div>
                </form>
                <!-- Form forgot password selesai di sini -->

                <p class="mt-4 mb-0 text-center">Already have a password?<a class="ms-2" href="<?= base_url('/auth'); ?>">Sign in</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>