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
    <div class="content-box pt-5 pb-5 ">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="text-center">
                    <h6 class="mini-slogan text-aquagreen">Order form</h6>
                    <h2 class="mb-0 content-title">Let us take your order</h2>
                    <p class="mb30">You're now one step away from transforming into a healthy lifestyle</p>
                </div>
                <div class="order-form">
                    <?php echo do_shortcode('[contact-form-7 id="23" title="Order Now"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<button type="button" class="d-none" data-toggle="modal" data-target="#modalCharges">
  Show Charges
</button>

<!-- Charges per location -->
<div class="modal fade" id="modalCharges" tabindex="-1" role="dialog" aria-labelledby="modalChargesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>
            <div class="modal-header text-center d-block">
                <h1 class="modal-title mb-4">Charges per Location</h1>
                <h5 class="text-aquagreen">Reminder: Please refer to the table below for the respective delivery charge of your desired delivery address:</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <?php get_template_part( 'template-parts/content-delivery-charges'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    function getOptions($tableId, $columns) {
        $table = get_field($tableId, get_option('page_on_front'));
        $table_body = $table['body'];

        $options = array();
        $option = array();

        foreach($table_body as $key=>$row):
            foreach($columns as $id=>$name):
                $option[$name] = $row[$id]['c'];
            endforeach;
            $options[] = $option;
        endforeach;

        return $options;
    }

    $columns = array('option', 'calories', 'price');

    $supreme = getOptions('supreme', $columns);
    $combo_a = getOptions('combo_a', $columns);
    $combo_b = getOptions('combo_b', $columns);
	$vegan_supreme = getOptions('vegan_supreme', $columns);
	$vegan_combo_a = getOptions('vegan_combo_a', $columns);
	$vegan_combo_b = getOptions('vegan_combo_b', $columns);

    $columns = array('option', 'plan', 'price', 'calories');
    $ketogenic = getOptions('ketogenic', $columns);
    $lean_machine = getOptions('lean_machine', $columns);

    $supreme = json_encode($supreme);
    $combo_a = json_encode($combo_a);
    $combo_b = json_encode($combo_b);
	$vegan_supreme = json_encode($vegan_supreme);
	$vegan_combo_a = json_encode($vegan_combo_a);
	$vegan_combo_b = json_encode($vegan_combo_b);
    $ketogenic = json_encode($ketogenic);
    $lean_machine = json_encode($lean_machine);
?>

<script>

    window.plan = {
        'supreme': <?php echo $supreme; ?>,
        'combo_a': <?php echo $combo_a; ?>,
        'combo_b': <?php echo $combo_b; ?>,
        'vegan_supreme': <?php echo $vegan_supreme; ?>,
        'vegan_combo_a': <?php echo $vegan_combo_a; ?>,
        'vegan_combo_b': <?php echo $vegan_combo_b; ?>,
        'ketogenic': <?php echo $ketogenic; ?>,
        'lean_machine': <?php echo $lean_machine; ?>
    };

</script>

<?php get_template_part( 'template-parts/content-terms-conditions'); ?>
<?php
get_footer();
