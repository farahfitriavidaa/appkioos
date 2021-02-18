<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="<?=base_url()?>assets/dashboard/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/dashboard/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/dashboard/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/dashboard/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?=base_url()?>assets/dashboard/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?=base_url()?>assets/dashboard/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="<?=base_url()?>assets/dashboard/pages/widget/amchart/amcharts.min.js"></script>
<script src="<?=base_url()?>assets/dashboard/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="<?=base_url()?>assets/dashboard/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="<?=base_url()?>assets/dashboard/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/dashboard/js/script.js"></script>
<script type="text/javascript " src="<?=base_url()?>assets/dashboard/js/SmoothScroll.js"></script>
<script src="<?=base_url()?>assets/dashboard/js/pcoded.min.js"></script>
<script src="<?=base_url()?>assets/dashboard/js/demo-12.js"></script>
<script src="<?=base_url()?>assets/dashboard/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
</script>
</body>

</html>
