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
                <div class="col-md-12"><p>Please check (3 mins max) your email to review order request. You’ll be contacted by one of our FOH’s within 24 hours upon submission of this entry. Call us at 09177020539 for immediate feedback. Thank you!</p></div>
                <?php if((isset($_GET['mode']) && $_GET['mode'] != "ubpay") || !isset($_GET['mode']) ): ?>
                <div class="col-md-12">
                    <div class="payment-list">
                        <h2>Payment Facilities</h2>
                        <h3>(COD Option Available)</h3>
                        <ul>
                            <!--
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/gcash-logo.jpg"><div class="deets"><b>0922 478 1282</b><br>Chime Bell Osabel</div>
                            </li>
                            -->
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/bdo-logo.jpg"><div class="deets"><b>0069-9041-6555</b><br>OSAMOR FOOD CORPORATION</div>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/gcash-logo.jpg"><div class="deets"><b>0920-905-1988</b><br>CHIME BELL OSABEL</div>
                            </li>
                            <!--
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/gcash-logo.jpg"><div class="deets"><b>0975-590-6507</b><br>ANGELO AMADEUS MORENO</div>
                            </li>
                            -->
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/ub-logo.png"><div class="deets"><b>0027-6001-0692</b><br>OSAMOR FOOD CORPORATION</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 notice">Kindly send your proof of payment to chime@dietinaboxinc.com</div>
                <?php endif; ?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
