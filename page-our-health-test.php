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
		<h1 class="header-title">Expert Consultation</h1>
		<p class="header-slogan mb-5">And instantly know what meal plan our health experts recommend</p>
	</div>
</main>

<div class="container pb100">
    <div class="content-box pt-5 pb-5 position-relative">
        <div class="row">
            <div class="col-md-10 offset-md-1 progress-form">
                <div class="js-step-1 js-steps progress-steps">
                    <div class="text-center">
                        <h6 class="mini-slogan text-aquagreen">Step 1</h6>
                        <h2 class="mb-0 content-title">What is your diet goal?</h2>
                        <p class="mb30">I would like to..</p>
                        <div class="diet-goals mb-4">
                            <label>
                                <input type="radio" name="radio_diet_goal" class="js-diet-goal" value="Lose Weight">
                                <div class="diet-goal-box text-center">
                                    <h6>Lose Weight</h6>
                                    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/dist/images/lose-weight.svg" />
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="radio_diet_goal" class="js-diet-goal" value="Maintain Weight">
                                <div class="diet-goal-box text-center">
                                    <h6>Maintain Weight</h6>
                                    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/dist/images/maintain-weight.svg" />
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="radio_diet_goal" class="js-diet-goal" value="Gain Weight">
                                <div class="diet-goal-box text-center">
                                    <h6>Gain Weight</h6>
                                    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/dist/images/gain-weight.svg" />
                                </div>
                            </label>
                        </div>
                        <button class="btn btn-primary --aquagreen js-progress-next" type="button" disabled>
                            Next Step <i class="fas fa-chevron-right ml-3"></i>
                        </button>
                    </div>
                </div>
                <div class="js-step-2 js-steps active progress-steps">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            
                            <?php echo do_shortcode('[contact-form-7 id="92" title="Health Test"]') ?>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary --aquagreen js-calculate-bmr" type="button" disabled>
                            <i class="fas fa-calculator mr-3"></i> Submit Consultation Request
                        </button>
                    </div>
                </div>
               <div class="js-step-3 js-steps progress-steps">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="result-box">
                                <h2 class="mb-2 content-title">Your Results</h2>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <p class="mb-0">*Based on your BMI, you might roughly need <strong class="text-aquagreen js-calories-needed">2,000</strong> calories per day to lose or maintain 1 lb per week. Here’s our healthy recommendations:</p>
                                    </div>
                                </div>
                            </div>

                            <?php get_template_part( 'template-parts/content-weekly-subscription'); ?>

                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="arrow-controls" style="display:none;">
            <button type="button" disabled class="arrow-prev js-progress-prev js-progress-controls control-icons --primary">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button type="button" class="arrow-next js-progress-next js-progress-controls control-icons --primary" disabled>
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>

<?php get_template_part( 'template-parts/content-health-test-info'); ?>

<?php
get_footer();
