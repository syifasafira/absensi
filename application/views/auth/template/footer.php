<!-- footer.html -->
<!-- Script JS -->
<script src="<?= base_url('/assets'); ?>/js/jquery.min.js"></script>
<script src="<?= base_url('/assets'); ?>/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('/assets'); ?>/js/icons/feather-icon/feather.min.js"></script>
<script src="<?= base_url('/assets'); ?>/js/icons/feather-icon/feather-icon.js"></script>
<script src="<?= base_url('/assets'); ?>/js/config.js"></script>
<script src="<?= base_url('/assets'); ?>/js/script.js"></script>
<script src="<?= base_url('/assets'); ?>/js/script1.js"></script>
<script>
    $(document).on('click', '#error', function(e) {
        if ($('.email').val() == '' || $('.pwd').val() == '') {
            swal("Error!", "Sorry, looks like some data are not filled, please try again !", "error");
            e.preventDefault(); // mencegah submit jika data kosong
        }
    });
</script>
</div> <!-- Penutup container-fluid -->
</body>