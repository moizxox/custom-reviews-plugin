<?php

function cr_reviews_shortcode() {
    $data = cr_get_review_stats();

    ob_start();
    ?>
    <div class="cr-box">

        <h3>Customer Reviews</h3>
        <div class="cr-avg"><?php echo $data['avg']; ?></div>

        <?php foreach ([5,4,3,2,1] as $star): ?>
            <div class="cr-row">
                <span><?php echo $star; ?>★</span>

                <div class="cr-bar">
                    <div class="cr-fill" 
                         style="width: <?php echo $data['total'] ? ($data['counts'][$star] / $data['total']) * 100 : 0; ?>%">
                    </div>
                </div>

                <span><?php echo $data['counts'][$star] ?? 0; ?></span>
            </div>
        <?php endforeach; ?>

    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('cr_reviews', 'cr_reviews_shortcode');
