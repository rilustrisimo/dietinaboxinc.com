<?php
/*
Template Name: Thank You
*/

get_header();

if(!isset($_SESSION['cart']['items'])):
    $url = get_permalink(22670); //shop
    echo '<script>window.location.href="'.$url.'";</script>';
endif;

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="container thankyou-page">
			<div class="row">
                <div class="col-md-12"><h1>THANK YOU FOR CHOOSING DIET IN A BOX</h1></div>
                <div class="col-md-12"><p>Please check (3 mins max) your email to review order request. You’ll be contacted by one of our FOH’s within 24 hours upon submission of this entry. Call us at 0917 702 0539 or at 0920 905 1988 for immediate feedback. Thank you!</p></div>
                <?php if((isset($_GET['mode']) && $_GET['mode'] != "ubpay") || !isset($_GET['mode']) ): ?>
                <div class="col-md-12 text-center">
                    <p>When choosing the Direct Online Payment Transfer option, you'll need to wire transfer payment using this QR Code below. <b>This QR code accepts payments from UnionBank, BDO, Gcash, Maya, PalawanPay, Robinsons Bank Corp., ShopeePay, BPI/BP|Family, Gpay Network, Metropolitan Bank and Trust Company, Rizal CommercialBanking Corp., Asia United Bank, Land Bank of The Philippines and Security Bank.</b></p><img src='https://www.dietinaboxinc.com/wp-content/uploads/2024/09/diab-qr.jpg'><p class='highlight'>Proof of payment has to be sent to <a href='mailto:chime@dietinaboxinc.com'>chime@dietinaboxinc.com</a></p>
                </div>
                <?php endif; ?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
