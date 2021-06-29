</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="<?= base_url() ?>assets/admin/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/js-cookie/js.cookie.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="<?= base_url() ?>assets/admin/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="<?= base_url() ?>assets/admin/js/argon.min9f1e.js?v=1.1.0"></script>
<!-- Demo JS - remove this in your project -->
<script src="<?= base_url() ?>assets/admin/js/demo.min.js"></script>
<!-- plugins -->
<script src="<?php echo base_url();?>assets/guest/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>assets/guest/plugins/toastr/toastr.min.js"></script>

<script>
	const logout = () => {
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Apakah anda yakin akan keluar?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Batal',
			confirmButtonText: 'Ya'
		}).then((result) => {
			if (result.value) {
				window.location.href = `<?= site_url('auth/logout')?>`;
			}
		})
	}

</script>
<?= $view_js;?>

</body>
</html>
