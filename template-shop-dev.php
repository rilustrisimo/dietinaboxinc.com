<?php
/*
Template Name: Meal Plans
*/

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<h1><?php the_title(); ?></h1>
		<div class="container shop-page">
			<div class="row">
				<div class="col-12 col-md-8">
					<div class="products container">
						<div class="row">
						<?php
							$products = getAllProducts();

							foreach($products as $p):
								$id = $p->ID;
								$fields = get_fields($id);
						?>

						
							<div class="products__item col-md-12">
								<div class="products__title"><?php echo $fields['product_name']; ?></div>
								<div class="products__variants">
									<?php foreach($fields['variants'] as $v): ?>
										<div class="products__variants__item container">
											<div class="row">
												<div class="col-4 col-md-3 left"><div class="image" style="background: url(<?php echo $v['variant_image']['url']; ?>);"></div></div>
												<div class="col-8 col-md-9 right container">
													<div class="row">
														<div class="name col-md-12"><?php echo $v['variant_name']; ?></div>
														<div class="calories col-md-12"><?php echo $v['variant_calories']; ?> Calories</div>
														<div class="desc col-md-12"><?php echo $v['variant_description']; ?></div>
														<div class="qty col-5 col-md-3"><span class="minus">-</span><input type="text" class="qty-field" value="0" data-pid="<?php echo $id;?>" data-var="<?php echo $v['variant_name']; ?>" data-type="mealplan"><span class="plus">+</span></div>
														<div class="price col-7 col-md-9">&#8369; <span><?php echo $v['variant_price']; ?></span></div>
														<div class="count">0</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						
						<?php
							endforeach;
						?>
						</div>
						<div class="row">
						<?php
							$products = getAllAddons();

							foreach($products as $p):
								$id = $p->ID;
								$fields = get_fields($id);
						?>

						
							<div class="products__item col-md-12">
								<div class="products__title"><?php echo $fields['product_name']; ?></div>
								<div class="products__variants">
									<?php foreach($fields['variants'] as $v): ?>
										<div class="products__variants__item container">
											<div class="row">
												<div class="col-4 col-md-3 left"><div class="image" style="background: url(<?php echo $v['variant_image']['url']; ?>);"></div></div>
												<div class="col-8 col-md-9 right container">
													<div class="row">
														<div class="name col-md-12"><?php echo $v['variant_name']; ?></div>
														<div class="desc col-md-12"><?php echo $v['variant_description']; ?></div>
														<div class="qty col-5 col-md-3"><span class="minus">-</span><input type="text" class="qty-field" value="0" data-pid="<?php echo $id;?>" data-var="<?php echo $v['variant_name']; ?>" data-type="addon"><span class="plus">+</span></div>
														<div class="price col-7 col-md-9">&#8369; <span><?php echo $v['variant_price']; ?></span></div>
														<div class="count">0</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						
						<?php
							endforeach;
						?>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="order-summary">
						<div class="order-summary__title">Order Summary<span class="js-our-menu-date"></span></div>
						<div class="order-summary__items"><span class="empty">Your Cart is Empty</span></div>
						<div class="order-summary__total">Total &#8369; <span>0.00</span></div>
						<div class="order-summary__button"><a href="#" class="btn">Proceed</a></div>
					</div>
				</div>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
