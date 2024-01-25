<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Diet
 */

get_header();
?>

<main class="header-banner">
	<div class="container">
		<!-- <h1 class="header-title">Count That Calorie!</h1> -->
		<h1 class="header-title">Revolutionizing The Way People Perceive Healthy Meals</h1>
		<!-- <p class="header-slogan">Revolutionizing the way people perceive healthy meals</p> -->

		<a href="<?php echo get_permalink(22670); ?>" class="btn btn-outline header-cta">
			SUBSCRIBE NOW
		</a>


		<div class="btn pulse js-scroll-to" data-scroll-to=".howtoorder"><i class="fas fa-chevron-down"></i></div>

		<div class="social-links-wrapper">
			<div>
				<div class="social-links">
					<a href="https://www.facebook.com/dietinaboxcebu" class="social-link" target="_blank" rel="noopener noreferrer">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a href="tel:09224781282" class="social-link">
						<i class="fas fa-phone"></i>
					</a>
					<a href="https://www.instagram.com/dietinabox/" class="social-link" target="_blank" rel="noopener noreferrer">
						<i class="fab fa-instagram"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</main>

<section class="section pt100 --about-floater">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h6 class="mini-slogan">The Best of Cebu</h6>
				<div class="badges">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/images/boc2016.png);">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/images/boc2017.png);">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/images/boc2018.png);">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/images/boc2019.png);">
				</div>
				<div class="section-header --aquagreen --left --underline" data-text-bg="Food Revolution">
					<h2 class="title">Awarded as Best Wellness Food Delivery in Sunstar's Best of Cebu</h2>
				</div>
				<p>
					Diet in a Box is a purposeful small business that aims
					to inspire every single Cebuano switch to a healthier way of eating.
					We want to make a difference by helping people build a healthier diet
					plan and put life to our food advocacy – "<b>REVOLUTIONIZING THE WAY PEOPLE PERCEIVE HEALTHY MEALS.</b>”
				</p>
			</div>
		</div>
	</div>
</section>

<section class="section howtoorder">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-header --aquagreen --left --underline" data-text-bg="How to Order">
					<h6 class="mini-slogan">3 STEPS TO START A HEALTHY LIFESTYLE</h6>
					<h2 class="title">How to Order</h2>
				</div>
			</div>
			<div class="col-md-4 step__item js-scroll-to" data-scroll-to=".meal-plans">
				<div class="row">
					<div class="step__image col-5 col-md-12"><div style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/images/order.png);"></div></div>
					<div class="col-7 col-md-12">
						<div class="step__title">Step 1</div>
						<div class="step__subtitle">Choose Your Meal Plan</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 step__item js-scroll-to" data-scroll-to=".meal-plans">
				<div class="row">
					<div class="step__image col-5 col-md-12"><div style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/images/form.png);"></div></div>
					<div class="col-7 col-md-12">
						<div class="step__title">Step 2</div>
						<div class="step__subtitle">Process Your Order</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 step__item js-scroll-to" data-scroll-to=".meal-plans">
				<div class="row">
					<div class="step__image col-5 col-md-12"><div style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/images/deliver.png);"></div></div>
					<div class="col-7 col-md-12">
						<div class="step__title">Step 3</div>
						<div class="step__subtitle">Delivery to Your Doorstep</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	//$getproducts = createQuery('product', array(), -1, 'date', 'ASC');
	//$allproducts = $getproducts->posts;

	$products = getAllProducts();

	$tdata = array(
		'22696' => 'diet_in_a_box_menu',
		'22697' => 'keto-go_menu',
		'22699' => 'lean_machine_menu',
		'22700' => 'vegan_menu',
		'22698' => 'pescatarian_menu'
	);

?>
<section class="section mplan">
	<div class="section-header --aquagreen text-center mb60">
		<h2 class="title text-center --center --aquagreen" data-text-bg="Meal Plans">Meal Plans</h2>
		<h6 class="mini-slogan">Five Weekly (Mon-Fri) Diet Meal Plan Subscription</h6>
	</div>
	<div class="container meal-plans">
		<div class="row">
			<?php foreach($products as $p): ?>
			<?php $pfields = get_fields($p->ID); ?>
			<?php
				$table = get_field($tdata[$p->ID]);
			?>
			<div class="col-12 col-md-12">
				<a href="#" class="meal-modal" prod-id="<?php echo $p->ID; ?>" prod-title="<?php echo $pfields['product_name']; ?>">
					<div class="meal-plans__item">
						<div class="meal-plans__title"><?php echo $pfields['product_name']; ?></div>
						<!--<div class="meal-plans__subtitle"><?php echo $pfields['product_short_description']; ?></div>-->
						<div class="meal-plans__menu" style="display:none;">
							<?php if(is_array($table)): ?>
							<div class="calendar"><i class="fas fa-calendar-alt"></i> <span class="js-our-menu-date"></span></div> <?php include(locate_template('table-grid.php')); ?>
							<?php endif; ?>
						</div>
					</div>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section-bg-before section-wellness pb100">
	<div class="container">
		<div class="section-header --orange text-center mb-5">
			<!--<h6 class="mini-slogan">Meals made with love while</h6>-->
			<h2 class="title text-center text-white mb-3">GET READY TO UPGRADE YOUR LIFESTYLE!</h2>
			<!--<h5 class="subtitle text-center text-white">Become a better, happier and healthier version of yourself this year.</h5>-->
		</div>
		<div class="content-box ptb60 no-minheight">
			<!--
			<div class="text-center mb-5">
				<h6 class="mini-slogan text-aquagreen">Get Ready to Upgrade your Lifestyle!</h6>
			</div>
							-->
			<div class="row">
				<div class="col-md-12 ml-auto text-center mb-3">
					<a href="<?php echo get_permalink( get_page_by_path( 'our-health-test' ) ); ?>" class="link-card">
						Expert Consultation	
					</a>
					<h5>Talk to our Nutritionist-Dietitian</h5>
				</div>
				<div class="col-md-12 mr-auto text-center mb-3">
					<a href="<?php echo get_permalink(22670); ?>" class="link-card">
						Subscribe Now
					</a>
					<h5>Minimum of 5 days (Monday to Friday)</h5>
				</div>
				<div class="col-md-12 mr-auto text-center mb-3">
					<a href="<?php echo get_permalink( get_page_by_path( 'faq' ) ); ?>" class="link-card">
						FAQs
					</a>
					<h5>Know other important details about our services</h5>
				</div>
			</div>
		</div>
	</div>
</section>
<!--
<section class="section section-news --news-floater">
	<?php
		$args = array(
			'post_type' => 'news',
			'posts_per_page' => -1
		);

		$news_query = new WP_Query($args);
		$posts = $news_query->posts;
	?>

	<div class="container">
		<h6 class="mini-slogan text-center mb-5">News & Compliments to the Chef</h6>
		<div class="row">
			<?php foreach($posts as $post): ?>
				<?php
					$thumbnail      = get_field('thumbnail', $post->ID);
					$image      	= get_field('image', $post->ID);
					$location       = get_field('location', $post->ID);
					$excerpt       	= get_field('excerpt', $post->ID);
				?>

				<div class="col-6 col-xl-3 col-lg-4 col-md-6 mb-4">
					<div class="card news-card shadow-none bg-transparent">
						<?php if ($thumbnail == 'image'): ?>
							<img class="card-img-top" src="<?php echo $image['url']; ?>" alt="Card image cap">
						<?php else: ?>
							<div class="card-img-top">
								<?php the_field('vimeo', $post->ID); ?>
							</div>
						<?php endif ?>
						<div class="card-body">
							<p class="card-text">
								<?php echo $excerpt; ?>
							</p>
						</div>
					</div>
				</div>

			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
						-->
<?php
get_footer();
