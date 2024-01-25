<?php
/*
Template Name: Checkout
*/

get_header();

if(!isset($_SESSION['cart']['items'])):
    $url = get_permalink(22670); //shop
    echo '<script>window.location.href="'.$url.'";</script>';
endif;

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<h1><?php the_title(); ?></h1>
		<div class="container checkout-page">
			<div class="row">
                <div class="col-12 col-md-7">
                    <?php 
                    $items = $_SESSION['cart']['items'];
                    $totalprice = $_SESSION['cart']['totalprice'];
                    $mealtotal = $_SESSION['cart']['mealtotal'];
                    $addtotal = $_SESSION['cart']['addtotal'];
                    $mealinput = array();
                    $addinput = array();
                    $cartlist = "";
                    
                    foreach($items as $i):
                        $p = $i['totalprice'];
                        $t = $i['type'];

                        if($t == 'addon'){
                            $addinput[] = $i['qty']."x ".$i['name'];
                        }else{
                            $mealinput[] = $i['qty']."x ".$i['name'];
                        }

                        $cartlist .= "<div class='cart__item'><span>" . $i['qty'] .  "x</span> " . $i['name'] . " - <span>&#8369; " . number_format($p, 2) . "</span></div>";
                    endforeach;
                    ?>
                    <input type="hidden" id="meal-plan_details" value="<?php echo implode(', ', $mealinput); ?>">
                    <input type="hidden" id="add-on_details" value="<?php echo implode(', ', $addinput); ?>">
                    <input type="hidden" id="total-price_details" value="<?php echo number_format((float)$totalprice, 2); ?>">
                    <input type="hidden" id="meal-price_details" value="<?php echo number_format((float)$mealtotal, 2); ?>">
                    <input type="hidden" id="add-price_details" value="<?php echo number_format((float)$addtotal, 2); ?>">
                    <?php echo do_shortcode('[contact-form-7 id="23" title="Order Now"]'); ?>

                </div>
                <div class="col-12 col-md-5">
					<div class="order-summary">
						<div class="order-summary__title">Order Summary<span class="js-our-menu-date"></span></div>
						<div class="order-summary__items"><?php echo $cartlist; ?></div>
						<div class="order-summary__total container">
                            <div class="row">
                                <div class="col-6 col-md-6">Subtotal <span id="wks">1 week(s)<span></div>
                                <div class="col-6 col-md-6">&#8369; <span id="subtotal"><?php echo number_format((float)$mealtotal, 2); ?></span></div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6">Add Ons</div>
                                <div class="col-6 col-md-6">&#8369; <span id="addtotal"><?php echo number_format((float)$addtotal, 2); ?></span></div>
                            </div>
                            <div class="row delivery-container">
                                <div class="col-6 col-md-6">Delivery Fee <span>PHP <l class="dperday">0.00</l> / day<span></div>
                                <div class="col-6 col-md-6">&#8369; <span id="delivery">0.00</span></div>
                            </div>  
                            <div class="row" id="discout-code" style="display: none;">
                                <div class="col-6 col-md-6">Discount Code <span id="coupon"><span></div>
                                <div class="col-6 col-md-6">&#8369; - <span id="discount-price">0.00</span></div>
                            </div>  
                            <div class="row" id="discout-4wks" style="display: none;">
                                <div class="col-6 col-md-6">Discount <span> 4 Weeks<span></div>
                                <div class="col-6 col-md-6">&#8369; - <span id="discount-4wks">0.00</span></div>
                            </div>  
                            <div class="row grand-total-container">
                                <div class="col-6 col-md-6">Total</div>
                                <div class="col-6 col-md-6">&#8369; <span id="grand-total"><?php echo number_format((float)$totalprice, 2); ?></span></div>
                            </div>                             
                        </div>
						<div class="order-summary__button"><a href="#" class="btn proceed-btn">Review Order</a></div>
					</div>
				</div>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
