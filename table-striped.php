<?php
/*
Template Name: Table Striped
*/

$options = array(
    'Calorie Counted Supreme Option 1' => array(
        22542,
        '?attribute_meal-plan=Supreme+%28Breakfast%2C+Lunch+and+Dinner+Package%29&attribute_calories=1%2C200+Calories'
    ),
    'Calorie Counted Supreme Option 2' => array(
        22542,
        '?attribute_meal-plan=Supreme+%28Breakfast%2C+Lunch+and+Dinner+Package%29&attribute_calories=1%2C500+Calories'
    ),
    'Calorie Counted Supreme Option 3' => array(
        22542,
        '?attribute_meal-plan=Supreme+%28Breakfast%2C+Lunch+and+Dinner+Package%29&attribute_calories=1%2C800+Calories'
    ),
    'Calorie Counted Combo A Option 1' => array(
        22542,
        '?attribute_meal-plan=Combo+A+%28Breakfast+and+Lunch+Package%29&attribute_calories=800+Calories'
    ),
    'Calorie Counted Combo A Option 2' => array(
        22542,
        '?attribute_meal-plan=Combo+A+%28Breakfast+and+Lunch+Package%29&attribute_calories=1%2C000+Calories'
    ),
    'Calorie Counted Combo A Option 3' => array(
        22542,
        '?attribute_meal-plan=Combo+A+%28Breakfast+and+Lunch+Package%29&attribute_calories=1%2C200+Calories'
    ),
    'Calorie Counted Combo B Option 1' => array(
        22542,
        '?attribute_meal-plan=Combo+B+%28Lunch+and+Dinner+Package%29&attribute_calories=800+Calories'
    ),
    'Calorie Counted Combo B Option 2' => array(
        22542,
        '?attribute_meal-plan=Combo+B+%28Lunch+and+Dinner+Package%29&attribute_calories=1%2C000+Calories'
    ),
    'Calorie Counted Combo B Option 3' => array(
        22542,
        '?attribute_meal-plan=Combo+B+%28Lunch+and+Dinner+Package%29&attribute_calories=1%2C200+Calories'
    ),
    'Vegan Supreme Option 1' => array(
        22543,
        '?attribute_meal-plans=Supreme+%28Breakfast%2C+Lunch+and+Dinner+Package%29&attribute_calories=1%2C200+Calories'
    ),
    'Vegan Supreme Option 2' => array(
        22543,
        '?attribute_meal-plans=Supreme+%28Breakfast%2C+Lunch+and+Dinner+Package%29&attribute_calories=1%2C350+Calories'
    ),
    'Vegan Combo A Option 1' => array(
        22543,
        '?attribute_meal-plans=Combo+A+%28Breakfast+and+Lunch+Package%29&attribute_calories=800+Calories'
    ),
    'Vegan Combo A Option 2' => array(
        22543,
        '?attribute_meal-plans=Combo+A+%28Breakfast+and+Lunch+Package%29&attribute_calories=1%2C000+Calories'
    ),
    'Vegan Combo B Option 1' => array(
        22543,
        '?attribute_meal-plans=Combo+B+%28Lunch+and+Dinner+Package%29&attribute_calories=800+Calories'
    ),
    'Vegan Combo B Option 2' => array(
        22543,
        '?attribute_meal-plans=Combo+B+%28Lunch+and+Dinner+Package%29&attribute_calories=1%2C000+Calories'
    ),
    'Vegan Combo B Option 2' => array(
        22543,
        '?attribute_meal-plans=Combo+B+%28Lunch+and+Dinner+Package%29&attribute_calories=1%2C000+Calories'
    ),
    'Keto Go Breakfast, Lunch and Dinner' => array(
        22544,
        '?attribute_meal-plans=Breakfast%2C+Lunch+and+Dinner+%281%2C350+Calories%29'
    ),
    'Keto Go Breakfast and Lunch' => array(
        22544,
        '?attribute_meal-plans=Breakfast+and+Lunch+%28900+Calories%29'
    ),
    'Keto Go Lunch and Dinner' => array(
        22544,
        '?attribute_meal-plans=Lunch+and+Dinner+%28900+Calories%29'
    ),
    'Lean Machine Breakfast, Lunch and Dinner' => array(
        22545,
        '?attribute_meal-plans=Breakfast%2C+Lunch+and+Dinner+%282%2C100+Calories%29'
    ),
    'Lean Machine Breakfast and Lunch' => array(
        22545,
        '?attribute_meal-plans=Breakfast+and+Lunch+%281%2C400+Calories%29'
    ),
    'Lean Machine Lunch and Dinner' => array(
        22545,
        '?attribute_meal-plans=Lunch+and+Dinner+%281%2C400+Calories%29'
    )
);

//echo get_permalink( wc_get_page_id( 'product' ) ).$options[$selected . $row[$get_index]['c']]; 

?>

<table class="table table-striped --aquagreen <?php echo $table_class ?>">
    <thead>
        <tr>
            <?php foreach($table_header as $key=>$header): ?>
                <th><?php echo $header['c']; ?></th>
            <?php endforeach;?>
            <!--<th></th>-->
        </tr>
    </thead>
    <tbody>
        <?php foreach($table_body as $key=>$row): ?>
            <tr>
                <?php foreach($row as $innerKey=>$cell): ?>
                    <td><?php echo $cell['c']; ?></td>
                <?php endforeach;?>
                <!--
                <td>
                    <?php
                        $id = $options[$selected . $row[$get_index]['c']][0];
                        $attr = $options[$selected . $row[$get_index]['c']][1];
                    ?>
                    
                    <a
                        href="<?php echo get_permalink( $id ).$attr; ?>"
                        class="btn btn-rounded btn-action"
                    >
                        Select
                    </a>
                </td>
                -->
            </tr>
        <?php endforeach;?>
    </tbody>
</table>