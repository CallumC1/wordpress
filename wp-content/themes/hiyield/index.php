<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="container mx-auto flex flex-wrap justify-center gap-8 p-4">


        <?php
        // $size = ['400', '200'];
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
                <a href="#" class="text-red-600 text-sm"><?= get_the_date(); ?></a>

            </div>

        <?php
            endwhile;
        endif;
        ?>

        

    </div>


    
    
</body>
</html>