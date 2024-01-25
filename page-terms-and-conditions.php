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

<main class="header-banner mini-banner">
	<div class="container">
		<!-- <h1 class="header-title">Count That Calorie!</h1> -->
		<h1 class="header-title">Revolutionizing The Way People Perceive Healthy Meals</h1>
        <!-- <p class="header-slogan mb-5">Revolutionizing the way people perceive healthy meals</p> -->
	</div>
</main>

<div class="container pb100">
    <div class="content-box pt-5 pb-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="text-center">
                    <h6 class="mini-slogan text-aquagreen">Read This</h6>
                    <h2 class="mb-0 content-title text-danger">Terms and Conditions</h2>
                    <p class="mb30">Here are stuff you'd want to know.</p>
                </div>

                <?php echo get_post_field('post_content', $post->ID); ?>
            </div>
        </div>
    </div>
</div>
    

<?php
get_footer();
