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


    
    
</body>
</html>