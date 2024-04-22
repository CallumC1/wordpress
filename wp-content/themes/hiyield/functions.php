<?php
// Reading time
// An average person reads 200 words per minute, this works based on that.

function estimate_reading_time($postID) {

    // Get the current post
    $postContent = get_post_field( 'post_content', $postID );
    // Get the post word count and strip out any HTML tags
    $wordCount = str_word_count( strip_tags( $postContent ) );

    // Divide the total word count by 200 words per minute and round up to the nearest minute just for niceness.
    $readingTime = ceil($wordCount / 200);

    // Return the reading time
    return $readingTime . ' min read';
}