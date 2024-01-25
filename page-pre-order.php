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
		<h1 class="header-title">Order Now!</h1>
		<p class="header-slogan mb-5">Revolutionizing the way people perceive healthy meals</p>
	</div>
</main>

<div class="container pb100">
    <div class="content-box pt-5 pb-5 position-relative">
        <div class="row">
            <div class="col-md-12 col-xl-10 offset-xl-1 progress-form">
                <?php get_template_part( 'template-parts/content-weekly-subscription'); ?>
            </div>
        </div>
    </div>
</div>
    

<?php
get_footer();
