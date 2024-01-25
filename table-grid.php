<?php
/*
Template Name: Table Grid
*/

    $table_body = $table['body'];
    $table_header = $table['header'];
?>

<?php foreach($table_body as $key=>$row): ?>
    <div class="tab-row">

        <?php foreach($row as $innerKey=>$cell): ?>
            <?php if ($innerKey == 0): ?>

                <div class="tab-row-header">
                    <h5><?php echo $cell['c']; ?></h5>
                </div>

            <?php else: ?>

                <div class="tab-row-content">
                    <h6 class="day">
                        <?php echo $table_header[$innerKey]['c']; ?>
                    </h6>
                    <div class="tab-row-square">
                        <p><?php echo $cell['c']; ?></p>
                    </div>
                </div>

            <?php endif ?>
        <?php endforeach;?>
    </div>
<?php endforeach; ?>

<div class="tab-row-mobile hide">
    <?php for ($idx=1; $idx < 6; $idx++) { ?>
        <div class="tab-row-header">
            <h5>
                <?php echo $table_header[$idx]['c']; ?>
            </h5>
        </div>
        <div class="tab-row-content">
            <?php for ($innerIdx=0; $innerIdx < 3; $innerIdx++) { ?>
                <h6 class="day">
                    <?php echo $table_body[$innerIdx][0]['c']; ?>
                </h6>
                <div class="tab-row-square">
                    <p><?php echo $table_body[$innerIdx][$idx]['c']; ?></p>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>