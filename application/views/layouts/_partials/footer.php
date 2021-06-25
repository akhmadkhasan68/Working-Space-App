<!-- footer -->
<footer class="footer mt-4">
	<div class="container">
		<div class="row align-items-center justify-content-md-between">
			<div class="col-md-6">
				<div class="copyright">
					&copy; 2021 <a href="#" target="_blank">Labahawara.Co</a>.
				</div>
			</div>
			<div class="col-md-6">
				<!-- <ul class="nav nav-footer justify-content-end">
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">License</a>
                            </li>
                        </ul> -->
			</div>
		</div>
	</div>
</footer>

<!--   Core JS Files   -->
<script src="<?php echo base_url();?>assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?php echo base_url();?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the Carousel, full documentation here: http://jedrzejchalubek.com/ -->
<script src="<?php echo base_url();?>assets/js/plugins/glide.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://flatpickr.js.org/ -->
<script src="<?php echo base_url();?>assets/js/plugins/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!--	Plugin for Select, full documentation here: https://joshuajohnson.co.uk/Choices/ -->
<script src="<?php echo base_url();?>assets/js/plugins/choices.min.js" type="text/javascript"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://flatpickr.js.org/ -->
<script src="<?php echo base_url();?>assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url();?>assets/js/plugins/jasny-bootstrap.min.js"></script>
<!-- Plugin for Headrom, full documentation here: https://wicky.nillia.ms/headroom.js/ -->
<script src="<?php echo base_url();?>assets/js/plugins/headroom.min.js"></script>
<!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="../../../buttons.github.io/buttons.js"></script>
<script src="<?php echo base_url();?>assets/js/argon-design-system.min2c70.js?v=1.0.3" type="text/javascript">
</script>
<!-- Sharrre libray -->
<script src="<?php echo base_url();?>assets/demo/jquery.sharrre.js"></script>
<!-- plugins -->
<script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
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
<script>
    
</script>
<script>

</script>
</body>

</html>
