<div class="modal fade" id="dietBoxModal" tabindex="-1" role="dialog" aria-labelledby="dietBoxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
			<div class="lined-title text-center">
				<h3>Calorie Counted</h3>
				<h6 class="text-aquagreen">Portioned Diet Meal Plan</h6>
			</div>

            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="table-title text-center">
                        <h5>Supreme</h5>
                        <p>Breakfast, Lunch and Dinner Package</p>
                    </div>

                    <?php
                        $supreme = get_field('supreme');
                        $table_header = $supreme['header'];
                        $table_body = $supreme['body'];
                        $get_index = 0;
                        $selected = 'Calorie Counted Supreme Option ';
                    ?>

                    <?php include(locate_template('table-striped.php')); ?>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="table-title text-center">
                        <h5>Combo A</h5>
                        <p>Breakfast and Lunch Package</p>
                    </div>

                    <?php
                        $combo_a = get_field('combo_a');
                        $table_header = $combo_a['header'];
                        $table_body = $combo_a['body'];
                        $get_index = 0;
                        $selected = 'Calorie Counted Combo A Option ';
                    ?>

                    <?php include(locate_template('table-striped.php')); ?>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="table-title text-center">
                        <h5>Combo B</h5>
                        <p>Lunch and Dinner Package</p>
                    </div>

                    <?php
                        $combo_b = get_field('combo_b');
                        $table_header = $combo_b['header'];
                        $table_body = $combo_b['body'];
                        $get_index = 0;
                        $selected = 'Calorie Counted Combo B Option ';
                    ?>
                    
                    <?php include(locate_template('table-striped.php')); ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary-outline --aquagreen" data-dismiss="modal" aria-label="Go back">
                    <i class="fas fa-arrow-left mr-1"></i> Go back
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="veganModal" tabindex="-1" role="dialog" aria-labelledby="veganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
			<div class="lined-title text-center">
				<h3>Vegan</h3>
				<h6 class="text-aquagreen">Plant-based Diet Meal Plan</h6>
			</div>

            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="table-title text-center">
                        <h5>Supreme</h5>
                        <p>Breakfast, Lunch and Dinner Package</p>
                    </div>

                    <?php
						$supreme = get_field('vegan_supreme', get_option('page_on_front'));
						$table_header = $supreme['header'];
						$table_body = $supreme['body'];
						$get_index = 0;
						$selected = 'Vegan Supreme Option ';
					?>

                    <?php include(locate_template('table-striped.php')); ?>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="table-title text-center">
                        <h5>Combo A</h5>
                        <p>Breakfast and Lunch Package</p>
                    </div>

                    <?php
						$combo_a = get_field('vegan_combo_a', get_option('page_on_front'));
						$table_header = $combo_a['header'];
						$table_body = $combo_a['body'];
						$get_index = 0;
						$selected = 'Vegan Combo A Option ';
					?>

                    <?php include(locate_template('table-striped.php')); ?>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="table-title text-center">
                        <h5>Combo B</h5>
                        <p>Lunch and Dinner Package</p>
                    </div>

                    <?php
						$combo_b = get_field('vegan_combo_b', get_option('page_on_front'));
						$table_header = $combo_b['header'];
						$table_body = $combo_b['body'];
						$get_index = 0;
						$selected = 'Vegan Combo B Option ';
					?>
                    
                    <?php include(locate_template('table-striped.php')); ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary-outline --aquagreen" data-dismiss="modal" aria-label="Go back">
                    <i class="fas fa-arrow-left mr-1"></i> Go back
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ketoGoModal" tabindex="-1" role="dialog" aria-labelledby="ketoGoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
			<div class="lined-title text-center">
				<h3>Keto-Go</h3>
				<h6 class="text-aquagreen">Ketogenic Diet Meal Plan</h6>
			</div>

            <div class="row">
                <div class="col-12">
                    <?php
                        $ketogenic = get_field('ketogenic');
                        $table_header = $ketogenic['header'];
                        $table_body = $ketogenic['body'];
                        $table_class = 'single-table';

                        $get_index = 1;
                        $selected = 'Keto Go ';
                    ?>
                    <?php include(locate_template('table-striped.php')); ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary-outline --aquagreen" data-dismiss="modal" aria-label="Go back">
                    <i class="fas fa-arrow-left mr-1"></i> Go back
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="leanMachineModal" tabindex="-1" role="dialog" aria-labelledby="leanMachineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
			<div class="lined-title text-center">
				<h3>Lean Machine</h3>
				<h6 class="text-aquagreen">High Protein Diet Meal Plan</h6>
			</div>

            <div class="row">
                <div class="col-12">
                    <?php
                        $leanMachine = get_field('lean_machine');
                        $table_header = $leanMachine['header'];
                        $table_body = $leanMachine['body'];
                        $table_class = 'single-table';

                        $get_index = 1;
                        $selected = 'Lean Machine ';
                    ?>
                    <?php include(locate_template('table-striped.php')); ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary-outline --aquagreen" data-dismiss="modal" aria-label="Go back">
                    <i class="fas fa-arrow-left mr-1"></i> Go back
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pescatarianModal" tabindex="-1" role="dialog" aria-labelledby="pescatarianModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
			<div class="lined-title text-center">
				<h3>Pescatarian</h3>
				<h6 class="text-aquagreen">Seafood and Plant-based diet</h6>
			</div>

            <div class="row">
                <div class="col-12">
                    <?php
                        $leanMachine = get_field('pescatarian');
                        $table_header = $leanMachine['header'];
                        $table_body = $leanMachine['body'];
                        $table_class = 'single-table';

                        $get_index = 1;
                        $selected = 'Pescatiarian ';
                    ?>
                    <?php include(locate_template('table-striped.php')); ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary-outline --aquagreen" data-dismiss="modal" aria-label="Go back">
                    <i class="fas fa-arrow-left mr-1"></i> Go back
                </button>
            </div>
        </div>
    </div>
</div>

<!--<div class="modal fade" id="covidNotificationModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="covidNotificationLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
			<div class="lined-title text-center">
				<h3 style="color: #c0392b;">IMPORTANT NOTICE</h3>
			</div>
            <div class="row">
                <div class="col-12">
					<p class="mb-2 text-justify">At <strong style="color: #38b3ba;">Diet in a Box</strong>, the health and safety of our employees, customers, partners, and our community is our primary concern.</p>
					<p class="mb-2 text-justify">During this time of uncertainty, as a team, we wish to help stop the spread of the virus exponentially. In as much as we would do everything to support your needs as your best wellness food delivery, it is in the best interest of your safety, our employees, partners, and our community that we temporary suspend all of our operations effective today, <strong>March 22, 2020</strong> until further notice. </p>
					<p class="mb-2 text-justify">As we continue to go through this dynamic situation community-by-community; with this decision, our employees may safely stay at home, are less mobile and interact with people and with this chance, the virus will then have fewer opportunities to spread - a big step in flattening the curve. </p>
					<p class="mb-2 text-justify">I also wanted to personally reach out to you and thank you for always believing in our purpose and supporting my team in showcasing their cause. Thank you for being a loyal customer. It’s our intent to remain transparent, providing the latest information from <strong style="color: #38b3ba;">Diet in a Box</strong>. </p>
					<p class="mb-2 text-justify">To all our clients, we sincerely apologize for the inconvenience this has caused you. As soon as this outbreak lapses, we will notify everyone through social media, email, and sms. </p>
					<p class="mb-2 text-justify">To all our clients who have paid their subscription in advance, one of our front of house associates, Shang Baynosa, will call you today and tomorrow to arrange your refund.</p>
					<p class="mb-2 text-justify">Our hearts go out to all who have been affected by the outbreak of this coronavirus. Now, more than ever, we can all appreciate just how small the world truly is, and the importance of coming together to protect our community in times of great need. Everything’s going to be alright. </p>
					<p>Sincerely,<br />
					<strong>Chime Bell Osabel</strong><br />
					<strong style="color: #38b3ba;">Diet in a Box</strong><br />
					<em>0922 478 1282</em></p>
                </div>
            </div>
        </div>
    </div>
</div>-->