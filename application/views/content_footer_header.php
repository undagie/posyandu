
    <!-- JS here -->
    <script src="<?php echo base_url()?>assets/assets_web/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/ajax-form.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/waypoints.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/scrollIt.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/wow.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/nice-select.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/plugins.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="<?php echo base_url()?>assets/assets_web/js/contact.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/jquery.form.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/mail-script.js"></script>

    <script src="<?php echo base_url()?>assets/assets_web/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            disableDaysOfWeek: [0, 0],
        //     icons: {
        //      rightIcon: '<span class="fa fa-caret-down"></span>'
        //  }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
        var timepicker = $('#timepicker').timepicker({
         format: 'HH.MM'
     });
    </script>
</body>

</html>
