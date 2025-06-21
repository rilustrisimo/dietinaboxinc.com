<?php
/*
Template Name: Meal Plans New
*/

// Add template-specific body class for scoped styling
add_filter('body_class', function($classes) {
    $classes[] = 'meal-plans-template';
    $classes[] = 'page-template-meal-plans-dev';
    return $classes;
});

get_header();
?>
	<div id="primary" class="content-area meal-plans-content">
		<main id="main" class="site-main">
		<div class="container shop-page meal-plans-modern" id="meal-plans-development">
			<!-- Page Header -->
			<div class="page-header mb-5">
				<h1 class="page-title"><?php strtoupper(the_title()); ?></h1>
				<p class="page-subtitle">Diet in a Box has 5 meal plans: Calorie Counted, Keto, Lean Machine, Vegan, and Pescatarian. We deliver fresh meals daily, Monday to Friday. Choose your plan below and let us handle the rest!</p>
			</div>
			
			<div class="row">
				<div class="col-12 col-lg-8">
					<div class="meal-plans-section">
						<!-- Meal Plans Category Badge -->
						<div class="category-badge mb-4">
							<span class="badge badge-category">SELECT A MEAL PLAN</span>
						</div>
						
						<div class="meal-plans-container">
						<?php
							$products = getAllProducts();
							$productIndex = 0;

							foreach($products as $p):
								$id = $p->ID;
								$fields = get_fields($id);
								$productIndex++;
						?>

						<div class="meal-plan-group mb-4">
							<div class="products__item">
								<div class="products__variants">
									<?php foreach($fields['variants'] as $index => $v): 
										// Remove commas and convert to float for proper calculation
										$cleanPrice = (float) str_replace(',', '', $v['variant_price']);
										
										// Dynamic meal calculation based on variant description
										$description = strtolower($v['variant_description']);
										
										// Count occurrences of each meal type (case-insensitive)
										$breakfastCount = (preg_match('/\bbreakfast\b/', $description)) ? 1 : 0;
										$lunchCount = (preg_match('/\blunch\b/', $description)) ? 1 : 0;
										$dinnerCount = (preg_match('/\bdinner\b/', $description)) ? 1 : 0;
										
										// Calculate meals per day and total meals
										$mealsPerDay = $breakfastCount + $lunchCount + $dinnerCount;
										$totalMeals = $mealsPerDay * 5; // 5 days
										
										// Default to 15 if no meals detected (fallback)
										if ($totalMeals == 0) {
											$totalMeals = 15;
											$mealsPerDay = 3;
											$breakfastCount = 1;
											$lunchCount = 1;
											$dinnerCount = 1;
										}
										
										$perMealPrice = round($cleanPrice / $totalMeals, 2);
									?>
										<div class="products__variants__item meal-plan-card" data-plan-index="<?php echo $productIndex . '-' . ($index + 1); ?>">
											<div class="selection-badge">
												<span class="badge-number"><?php echo $productIndex; ?></span>
											</div>
											
											<div class="meal-card-content">
												<div class="meal-image-section">
													<div class="meal-image" style="background-image: url(<?php echo $v['variant_image']['url']; ?>);"></div>
													<div class="meal-pricing-controls show-mobile">
														<div class="price-section">
															<div class="total-price">₱<?php echo number_format($cleanPrice, 0); ?></div>
															<div class="price-subtitle">for <?php echo $totalMeals; ?> meals</div>
														</div>
													</div>
												</div>
												
												<div class="meal-details-section">
													<div class="meal-header">
														<h3 class="meal-name"><?php echo $v['variant_name']; ?></h3>
														<div class="meal-meta">
															<span class="calories-badge"><?php echo $v['variant_calories']; ?> Calories</span>
															<span class="meals-total-badge"><?php echo $totalMeals; ?> MEALS TOTAL</span>
														</div>
														<p class="meal-description"><?php echo $v['variant_description']; ?></p>
														<p class="meal-delivery-info"><?php echo $totalMeals; ?> Meals Total for 5 days worth of Delivery - Monday to Friday</p>
													</div>
													
													<div class="meal-breakdown">
														<div class="breakdown-grid">
															<?php if ($breakfastCount > 0): ?>
															<div class="breakdown-item">
																<div class="breakdown-number"><?php echo $breakfastCount * 5; ?></div>
																<div class="breakdown-label">Breakfast</div>
																<div class="breakdown-days">Mon-Fri</div>
															</div>
															<?php endif; ?>
															
															<?php if ($lunchCount > 0): ?>
															<div class="breakdown-item">
																<div class="breakdown-number"><?php echo $lunchCount * 5; ?></div>
																<div class="breakdown-label">Lunch</div>
																<div class="breakdown-days">Mon-Fri</div>
															</div>
															<?php endif; ?>
															
															<?php if ($dinnerCount > 0): ?>
															<div class="breakdown-item">
																<div class="breakdown-number"><?php echo $dinnerCount * 5; ?></div>
																<div class="breakdown-label">Dinner</div>
																<div class="breakdown-days">Mon-Fri</div>
															</div>
															<?php endif; ?>
														</div>
														<div class="per-meal-info">
															<span class="per-meal-price">₱<?php echo number_format($perMealPrice, 0); ?> per meal</span> • Daily delivery
														</div>
													</div>
													
													<div class="meal-pricing-controls">
														<div class="price-section hide-mobile">
															<div class="total-price">₱<?php echo number_format($cleanPrice, 0); ?></div>
															<div class="price-subtitle">for <?php echo $totalMeals; ?> meals</div>
														</div>
														
														<div class="quantity-controls">
															<button class="qty-btn minus" type="button">
																<i class="fas fa-minus"></i>
															</button>
															<input type="text" class="qty-field" value="0" 
																   data-pid="<?php echo $id;?>" 
																   data-var="<?php echo $v['variant_name']; ?>" 
																   data-type="mealplan"
																   data-calories="<?php echo $v['variant_calories']; ?>"
																   data-price="<?php echo str_replace(',', '', $v['variant_price']); ?>"
																   data-total-meals="<?php echo $totalMeals; ?>"
																   data-meals-per-day="<?php echo $mealsPerDay; ?>"
																   data-breakfast-count="<?php echo $breakfastCount; ?>"
																   data-lunch-count="<?php echo $lunchCount; ?>"
																   data-dinner-count="<?php echo $dinnerCount; ?>">
															<button class="qty-btn plus" type="button">
																<i class="fas fa-plus"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="count quantity-indicator">0</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						
						<?php
							endforeach;
						?>
						</div>
						
						<!-- Add-ons Section -->
						<div class="addons-section mt-5">
							<div class="category-badge mb-4">
								<span class="badge badge-category">ADD-ONS</span>
							</div>
							
							<?php
								$products = getAllAddons();

								foreach($products as $p):
									$id = $p->ID;
									$fields = get_fields($id);
							?>

							<div class="addon-group mb-4">
								<div class="products__item">
									<div class="products__variants">
										<?php foreach($fields['variants'] as $v): 
											// Clean price for add-ons too
											$cleanAddonPrice = (float) str_replace(',', '', $v['variant_price']);
										?>
											<div class="products__variants__item addon-card">
												<div class="addon-card-content">
													<div class="addon-image-section">
														<div class="addon-image" style="background-image: url(<?php echo $v['variant_image']['url']; ?>);"></div>
													</div>
													
													<div class="addon-details-section">
														<div class="addon-header">
															<h4 class="addon-name"><?php echo $v['variant_name']; ?></h4>
															<p class="addon-description"><?php echo $v['variant_description']; ?></p>
														</div>
														
														<div class="addon-pricing-controls">
															<div class="price-section">
																<div class="addon-price">₱<?php echo number_format($cleanAddonPrice, 0); ?></div>
															</div>
															
															<div class="quantity-controls">
																<button class="qty-btn minus" type="button">
																	<i class="fas fa-minus"></i>
																</button>
																<input type="text" class="qty-field" value="0" 
																	   data-pid="<?php echo $id;?>" 
																	   data-var="<?php echo $v['variant_name']; ?>" 
																	   data-type="addon"
																	   data-price="<?php echo str_replace(',', '', $v['variant_price']); ?>">
																<button class="qty-btn plus" type="button">
																	<i class="fas fa-plus"></i>
																</button>
															</div>
														</div>
													</div>
												</div>
												<div class="count quantity-indicator">0</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>

							<?php
								endforeach;
							?>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="order-summary modern-order-summary">
							<div class="order-summary-header">
								<h2 class="order-summary__title">Order Summary</h2>
								<div class="delivery-dates">
									<i class="fas fa-calendar-alt"></i>
									<span class="js-our-menu-date">For Date From to Date to</span>
								</div>
							</div>
							
							<!-- Always visible totals section for mobile -->
							<div class="order-totals">
								<div class="total-meals">
									<span>Total Meals:</span>
									<span class="meal-count">0 meals</span>
								</div>
								<div class="order-summary__total">
									<span class="total-label">Total</span>
									<span class="total-amount">₱0.00</span>
								</div>
							</div>
							
							<div class="order-summary-content">
								<div class="order-summary__items">
									<div class="empty-cart-state">
										<div class="empty-cart-price">₱0</div>
										<i class="fas fa-utensils empty-cart-icon"></i>
										<p class="empty-cart-message">No meal plans selected</p>
										<p class="empty-cart-submessage">Choose a plan to get started</p>
									</div>
								</div>
								
								<div class="delivery-info">
									<i class="fas fa-clock"></i>
									<div class="delivery-text">
										<span class="delivery-title">Daily Delivery Schedule</span>
										<span class="delivery-subtitle">3 meals delivered fresh each morning for 5 consecutive days</span>
									</div>
								</div>
							</div>
							
							<!-- Always visible button section -->
							<div class="order-summary__button">
								<a href="#" class="btn btn-proceed">Proceed to Checkout</a>
							</div>
					</div>
					
					<!-- Mobile footer - always visible button section outside the collapsible container -->
					<div class="order-summary-footer">
						<div class="order-summary__button">
							<a href="#" class="btn btn-proceed">Proceed to Checkout</a>
						</div>
					</div>
				</div> <!-- End of col-12 col-lg-4 -->
			</div> <!-- End of row -->
		</div> <!-- End of container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();