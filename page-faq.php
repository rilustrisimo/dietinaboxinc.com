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

<?php
    $faq = get_field('questions_and_answers');
    $faq_data = $faq['body'];
?>

<main class="header-banner mini-banner">
	<div class="container">
		<!-- <h1 class="header-title">Count That Calorie!</h1> -->
		<h1 class="header-title">Revolutionizing The Way People Perceive Healthy Meals</h1>
		<!-- <p class="header-slogan mb-5">Revolutionizing the way people perceive healthy meals</p> -->
	</div>
</main>

<div class="container pb100 xs-container">
    <div class="content-box content-box-faq pt-5 pb-5 ">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="text-center">
                    <h6 class="mini-slogan text-aquagreen">Hello There!</h6>
                    <h2 class="mb-0 content-title">Frequently Asked Questions</h2>
                    <p class="mb30">Here are some common inquiries from people that might get you up to speed.</p>
                </div>
                <div id="accordionList">

                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-1" aria-expanded="false" aria-controls="collapseOne">
                                <h6>What’s inside my Diet in A Box?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-1" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
                                <p>
                                    We have FIVE SIGNATURE DIET MEAL PLANS that you can choose from;
                                </p>
                                <ol class="ml-0">
                                    <li>
                                        <p class="ml-2"><strong>Calorie-Counted:</strong> This is diet meal plan simply revolves around the concept of “Calorie-Control”. Meals are portioned depending on your calorie-requirements for the day as anchored to your weight goal – lose, maintain or gain.</p>
                                    </li>
                                    <li>
                                        <p class="ml-2"><strong>Vegan:</strong> Getting your nutrients from plant foods allows more room in your diet for health-promoting options like whole grains, fruit, nuts, seeds and vegetables, which are packed full of beneficial fibre, vitamins and minerals.</p>
                                    </li>
                                    <li>
                                        <p class="ml-2"><strong>Keto-Go:</strong> This diet meal plan focuses on the ”Macro-Measuring”. This is best known for being low-carb-high good fats diet, where the body produces ketones in the liver to be used as energy. This diet meal plan strictly follows the 75% fats, 25% protein and 5% carbs macro principle.</p>
                                    </li>
                                    <li>
                                        <p class="ml-2"><strong>Lean Machine:</strong> This diet meal plan is suitable for individuals who are doing a heavy performance based training like crossfit, triathlon, weight lifting, calisthenics, etc. This meal plan is considered high in protein, enough carbs and fats that sit on a base plan of 2,000 calories minimum.</p>
                                    </li>
                                    <li>
                                        <p class="ml-2"><strong>Pescatarian:</strong> A pescatarian diet is one that prioritizes fish and seafood as the primary protein source. This meal plan is typically low in carbs and enough in source of protein and good fats.</p>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-4" aria-expanded="false" aria-controls="collapseOne">
                                <h6>Do you deliver and what time is the delivery?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-4" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
                                <p>Yes, we deliver. Depending on the address, the earliest time is 6:30 AM and the latest is 10:00 AM. We deliver on-the-day NOT a day before. Delivery is only good for 5 days - Monday to Friday.</p>
                                <p>Delivery Time Frame:<p>
                                <p>Option1: Anytime from 6:30AM to 8:00AM
                                <br />
                                    Option2: Anytime from 8:30AM to 10:00AM</p>
                            </div>
                        </div>
                    </div>

                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-5" aria-expanded="false" aria-controls="collapseOne">
                                <h6>Can the meals be customized to my preference?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-5" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
                                <p>Yes, we have been customizing diet meal plans since March of 2015. Just let us know of your food preference and will get back to you with regard to our final quotation. The weekly price chart for special food requests/customized meals varies, depending on the complexity of the request.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-6" aria-expanded="false" aria-controls="collapseOne">
                                <h6>Are utensils included in my Diet in A Box?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-6" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
                                <p>Spoons and forks are not included in your daily package.</p>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-7" aria-expanded="false" aria-controls="collapseOne">
                                <h6>Are there free snacks in my diet in a box?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-7" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
                                <p>We do not include FREE snacks in your Diet in a Box package. However, we have Keto-Brownies and Keto-Biscuits for sale.</p>
                            </div>
                        </div>
                    </div>
-->
                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-8" aria-expanded="false" aria-controls="collapseOne">
                                <h6>Is there a delivery charge?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-8" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
								<p>Diet in a Box is presented with a great opportunity to hire more drivers that can deliver your food right at your doorstep. Many of these drivers have lost their jobs due to the pandemic, and we take this as our perfect timing to give them their livelihood back and be able to provide for their family. When you have your diet in a box meals delivered to you conveniently, there is a corresponding delivery fee added. This will apply to all entries within and outside of city premises.</p>
<p>With regard to HOW MUCH, it’s key that you know your BRGY and call us at 0917 702 0539 or at 0920 905 1988 so we can inform you of the delivery fee.</p>
<!--                                 <p>Deliveries done within the city proper is free, except some specific locations. Please refer to the chart below for the delivery charge for different locations:</p>
                                <?php get_template_part( 'template-parts/content-delivery-charges'); ?> -->
                            </div>
                        </div>
                    </div>

                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-9" aria-expanded="false" aria-controls="collapseOne">
                                <h6>How long will the food last and what are the ways to store the food?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-9" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
                                <p>Locally sourced produce and the freshest ingredients means food that is exceptional in taste without any preservatives. The meal’s ingredients will start to develop bad bacteria’s and it will eventually spoil when it’s just stored in a normal room temperature for more than 30 minutes. It is best to store your Diet in A Box in a refrigerator and reheat it before eating.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-10" aria-expanded="false" aria-controls="collapseOne">
                                <h6>How can I pay for my Diet in A Box?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-10" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
                                <p>When choosing the Direct Online Payment Transfer option, you'll need to wire transfer payment using this QR Code below. <b>This QR code accepts payments from UnionBank, BDO, Gcash, Maya, PalawanPay, Robinsons Bank Corp., ShopeePay, BPI/BP|Family, Gpay Network, Metropolitan Bank and Trust Company, Rizal CommercialBanking Corp., Asia United Bank, Land Bank of The Philippines and Security Bank.</b></p><img src='https://www.dietinaboxinc.com/wp-content/uploads/2024/09/diab-qr.jpg'><p class='highlight'>Proof of payment has to be sent to chime@dietinaboxinc.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-11" aria-expanded="false" aria-controls="collapseOne">
                                <h6>Can I start anytime of the week?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-11" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
                                <p>You cannot just start anytime you like. Since we personalize and put a signature style of gourmet cooking in your daily meals, we need to make sure you have booked at least days before we start the delivery week. We have a Reservation CUT-OFF which is every Sunday, 3:00 P.M. Any orders logged beyond that time will be considered an early booking for the week after.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card accordion">
                        <div class="card-header">
                            <button class="btn-collapse-trigger collapsed" type="button" data-toggle="collapse" data-target="#faq-12" aria-expanded="false" aria-controls="collapseOne">
                                <h6>What's the delivery dynamics?</h6>
                                <i class="h6 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div id="faq-12" class="collapse" data-parent="#accordionList">
                            <div class="card-body">
                                <hr />
                                <p>Your meals are delivered On-The-Day NOT a day before. We deliver everyday, from Monday to Friday. We do not have weekend deliveries for now. Your day's meals are delivered altogether. Example: If you have ordered Breakfast, Lunch and Dinner, your lunch and your dinner will be delivered altogether with your breakfast. You just have to store your day's meal at a fridge.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    

<?php
get_footer();
