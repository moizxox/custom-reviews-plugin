<?php

function cr_get_review_stats() {
    $query = new WP_Query([
        'post_type' => 'cr_review',
        'posts_per_page' => -1
    ]);

    if (!$query->have_posts()) {
        return ['avg' => 0, 'total' => 0, 'counts' => []];
    }

    $ratings = [];
    foreach ($query->posts as $p) {
        $ratings[] = (int) get_post_meta($p->ID, 'cr_rating', true);
    }

    $total = count($ratings);
    if ($total === 0) {
        return ['avg' => 0, 'total' => 0, 'counts' => []];
    }

    $avg = round(array_sum($ratings) / $total, 1);

    $counts = [];
    foreach ([5,4,3,2,1] as $star) {
        $counts[$star] = count(array_filter($ratings, fn($r) => $r == $star));
    }

    return [
        'avg' => $avg,
        'total' => $total,
        'counts' => $counts
    ];
}
