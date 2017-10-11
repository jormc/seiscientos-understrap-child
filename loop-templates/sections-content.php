<?php
/**
 * @package seiscientos
 */
?>

<div class="card-deck-wrapper">

<?php 
    $count = 0;
    $sections = get_all_sections(); 
    foreach ($sections as $section) { 
        $title = $section['title'];
        $post_title = $section['post_title'];
        $thumbnail = $section['thumbnail'];
        $thumbnail_title = $title;
        $thumbnail_alt = $title;
        $excerpt = $section['excerpt'];
        $link = $section['link'];
?>

<?php if ($count % 2 == 0) { ?>
<div class="card-deck-wrapper">
<div class="card-deck">
<?php } ?>

<div class="card section-card">
    <div class="card-block">
        <div class="row">
            <div class="col-md-4">
                <!-- Left image -->
                <a href="<?= $link ?>" alt="<?= $thumbnail_alt ?>" title="<?= $thumbnail_title ?>">
                    <?= wp_get_attachment_image( $thumbnail['id'], 'thumbnail', false, array( 'class' => 'rounded' ) ) ?>
                </a>
            </div>
            <div class="col-md-8">
                <div class="col-md-12">
                    <!-- Right text -->
                    <a href="<?= $link ?>">
                        <h4 class="card-title"><?= $title ?></h4>
                        <p class="card-text"><?= $excerpt ?></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($count % 2 == 1) { ?>
</div>
</div>
<?php } ?>

<?php $count++; } ?>