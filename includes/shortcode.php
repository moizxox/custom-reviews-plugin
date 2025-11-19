<?php

function cr_reviews_shortcode() {
    $data = cr_get_review_stats();
    $avg = $data['avg'];
    $fullStars = floor($avg);
    $partialStar = $avg - $fullStars;

    ob_start();
    ?>
    <div class="cr-box">
        <h3 class="cr-title">Customer Reviews</h3>
        
        <div class="cr-avg-section">
            <div class="cr-avg"><?php echo number_format($avg, 1); ?></div>
            <div class="cr-avg-stars">
                <?php 
                for ($i = 1; $i <= 5; $i++): 
                    if ($i <= $fullStars): 
                        echo '<span class="cr-star-full">★</span>';
                    elseif ($i == $fullStars + 1 && $partialStar > 0):
                        echo '<span class="cr-star-partial" style="--partial: ' . ($partialStar * 100) . '%">★</span>';
                    else:
                        echo '<span class="cr-star-empty">★</span>';
                    endif;
                endfor;
                ?>
            </div>
        </div>

        <div class="cr-breakdown">
            <?php foreach ([5,4,3,2,1] as $star): 
                $count = $data['counts'][$star] ?? 0;
                $percentage = $data['total'] > 0 ? ($count / $data['total']) * 100 : 0;
            ?>
                <div class="cr-row">
                    <div class="cr-star-label">
                        <span class="cr-star-icon">★</span>
                        <span class="cr-star-number"><?php echo $star; ?></span>
                    </div>
                    <div class="cr-bar">
                        <div class="cr-fill" style="width: <?php echo $percentage; ?>%"></div>
                    </div>
                    <span class="cr-count"><?php echo $count; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('cr_reviews', 'cr_reviews_shortcode');
