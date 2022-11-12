
<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container">

        <div class="p-t-40">
            <p class="stext-107 cl6 txt-center">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            </p>
        </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!-- Modal1 -->

<!--===============================================================================================-->
<script src="/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/template/vendor/bootstrap/js/popper.js"></script>
<script src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/template/vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="/template/vendor/daterangepicker/moment.min.js"></script>
<script src="/template/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/template/vendor/slick/slick.min.js"></script>
<script src="/template/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="/template/vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="/template/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="/template/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="/template/vendor/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addwish-b2').on('click', function(e){
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    // $('.js-addcart-detail').each(function(){
    //     var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
    //     $(this).on('click', function(){
    //         swal(nameProduct, "is added to cart !", "success");
    //     });
    // });

</script>
<!--===============================================================================================-->
<script src="/template/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="/template/js/main.js"></script>
<script src="/template/js/public.js"></script>
