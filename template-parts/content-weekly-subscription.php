<div class="lined-title text-center">
    <h3>Calorie Counted</h3>
    <h6 class="text-aquagreen">Portioned Diet Meal Plan</h6>
</div>
<div class="row mb-3">
    <div class="col-lg-6 mb-3">
        <div class="table-title text-center">
            <h5>Combo A</h5>
            <p>Breakfast and Lunch Package</p>
        </div>

        <?php
            $combo_a = get_field('combo_a', get_option('page_on_front'));
            $table_header = $combo_a['header'];
            $table_body = $combo_a['body'];
            $get_index = 0;
            $selected = 'Calorie Counted Combo A Option ';
        ?>

        <?php include(locate_template('table-striped.php')); ?>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="table-title text-center">
            <h5>Combo B</h5>
            <p>Lunch and Dinner Package</p>
        </div>

        <?php
            $combo_b = get_field('combo_b', get_option('page_on_front'));
            $table_header = $combo_b['header'];
            $table_body = $combo_b['body'];
            $get_index = 0;
            $selected = 'Calorie Counted Combo B Option ';
        ?>

        <?php include(locate_template('table-striped.php')); ?>
    </div>
    <div class="col-lg-6 offset-lg-3">
        <div class="table-title text-center">
            <h5>Supreme</h5>
            <p>Breakfast, Lunch and Dinner Package</p>
        </div>

        <?php
            $supreme = get_field('supreme', get_option('page_on_front'));
            $table_header = $supreme['header'];
            $table_body = $supreme['body'];
            $get_index = 0;
            $selected = 'Calorie Counted Supreme Option ';
        ?>

        <?php include(locate_template('table-striped.php')); ?>
    </div>
</div>

<div class="lined-title text-center">
    <h3>Vegan</h3>
    <h6 class="text-aquagreen">Plant-based Diet Meal Plan</h6>
</div>
<div class="row mb-3">
    <div class="col-lg-6 mb-3">
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
    <div class="col-lg-6 mb-3">
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
    <div class="col-lg-6 offset-lg-3">
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
</div>

<div class="lined-title no-line text-center">
    <h3>Keto-Go</h3>
    <h6 class="text-aquagreen mb-4">Ketogenic Diet Meal Plan</h6>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <?php
                $ketogenic = get_field('ketogenic', get_option('page_on_front'));
                $table_header = $ketogenic['header'];
                $table_body = $ketogenic['body'];
                $table_class = 'single-table';
                $get_index = 1;
                $selected = 'Keto Go ';
            ?>
            <?php include(locate_template('table-striped.php')); ?>
        </div>
    </div>
</div>

<div class="lined-title no-line text-center">
    <h3>Lean Machine</h3>
    <h6 class="text-aquagreen mb-4">High Protein Diet Meal Plan</h6>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <?php
                $leanMachine = get_field('lean_machine', get_option('page_on_front'));
                $table_header = $leanMachine['header'];
                $table_body = $leanMachine['body'];
                $table_class = 'single-table';
                $get_index = 1;
                $selected = 'Lean Machine ';
            ?>
            <?php include(locate_template('table-striped.php')); ?>
        </div>
    </div>
</div>

<div class="lined-title no-line text-center">
    <h3>Pescatarian</h3>
    <h6 class="text-aquagreen mb-4">Seafood and Plant-based diet</h6>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <?php
                $leanMachine = get_field('pescatarian', get_option('page_on_front'));
                $table_header = $leanMachine['header'];
                $table_body = $leanMachine['body'];
                $table_class = 'single-table';
                $get_index = 1;
                $selected = 'Pescatarian ';
            ?>
            <?php include(locate_template('table-striped.php')); ?>
        </div>
    </div>
</div>