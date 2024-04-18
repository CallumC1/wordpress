<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

    <div class="flex flex-col items-center mt-10">
        
        <h2 class="text-xl font-semibold">The Loop</h2>
        <p>"The Loop" doesnt offer much flexability as its object is automatically set based off the URL.</p>
        <p>This menas that you can not display other posts if you are on a posts page.</p>
        <p>This can be seen below by clicking on one of the Hiyield cards.</p>
        <div class="container mx-auto flex flex-wrap justify-center gap-8 p-4">


            <?php
            $size = null;
            $attr = ['class' => 'object-cover'];
            if (have_posts()):
                while (have_posts()) : 
                    the_post();
                ?>


                <div class="w-auto h-auto">

                    <div class="rounded-md overflow-hidden w-96 h-52">                    
                        <?= the_post_thumbnail($size, $attr) ?>
                    </div>

                    <p class="font-semibold"><?= the_title(); ?></p>
                    <p class="text-red-600 text-sm"><?= get_the_date(); ?></p>

                </div>

            <?php
                endwhile;
            endif;
            ?>

        </div>
    </div>

    <div class="flex flex-col items-center">

        <h2 class="text-xl font-semibold">WP Query</h2>
        <p>WP Query allows more flexability, allowing arguments and custom queries.</p>
        <p>Here i have added the arguments, post_type (Post), order_by (Date) and order (ASC) </p>
    
        <div class="container mx-auto flex flex-wrap justify-center gap-8 p-4">
    
    
            <?php
            // WP Query
            // Query arguments
            $args = [
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'ASC'
            ];
    
            $query = new WP_Query($args);
    
            // Image attributes
            $size = null;
            $attr = ['class' => 'object-cover'];
    
            if ($query->have_posts()):
    
                while ($query->have_posts()) : 
                    $query->the_post();
                ?>
    
    
                <div class="w-auto h-auto">
    
                    <div class="rounded-md overflow-hidden w-96 h-52">                    
                        <?= the_post_thumbnail($size, $attr) ?>
                    </div>
    
                    <p class="font-semibold"><?= the_title(); ?></p>
                    <p class="text-red-600 text-sm"><?= get_the_date(); ?></p>
    
                </div>
    
            <?php
                endwhile;
            endif;
            // Resets the post data so that the main query is not affected.
            wp_reset_postdata();
            ?>
    
        </div>
    </div>
    

    <!-- Hiyield Cards -->

    <div class="container mx-auto flex flex-wrap justify-center gap-8 p-4 my-20 bg-rose-50">

    <?php
    $postCount = 0;
    // WP Query
    // Query arguments
    $args = [
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'ASC'
    ];

    $query = new WP_Query($args);

    // Image attributes
    $size = null;
    $attr = ['class' => 'object-cover group-hover:scale-125 transiton-all duration-300'];

    if ($query->have_posts()):

        while ($query->have_posts()) : 
            $query->the_post();
            $postCount++;
        ?>

        <!-- Card -->
        <a href="<?= get_permalink(); ?>" class="relative group w-72 h-auto">
            
            <!-- Number -->
            <div class="absolute -left-8 p-2 rounded-ful z-20">
                <p class="text-[#f472b6] text-4xl font-semibold">0<?= $postCount; ?></p>
            </div>

            <div class="rounded-md overflow-hidden w-72 h-52 ">                    
                <?= the_post_thumbnail($size, $attr) ?>
            </div>

            <span class="flex gap-3 items-center text-teal-700 text-sm font-semibold text-wrap">
                <p class=""><?= get_the_author(); ?></p>

                <svg width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg" role="presentation">
                    <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                </svg>

                <p class=""><?= get_the_date(); ?></p>

                <svg width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg" role="presentation">
                    <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                </svg>

                <p> <?= estimate_reading_time( get_the_id() ); ?> </p>
            </span>
            
            <h3 class="font-semibold text-teal-700 group-hover:text-[#f472b6] text-3xl"><?= the_title(); ?>
                <span class="inline-block ">
                    <svg class="group-hover:translate-x-1 feather feather-arrow-right transition-all duration-300" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f472b6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </span>
            </h3>
     
        </a>
        <!-- End Card -->

        <?php
            endwhile;
        endif;
        // Resets the post data so that the main query is not affected.
        wp_reset_postdata();
        ?>


    </div>

    
    
</body>
</html>