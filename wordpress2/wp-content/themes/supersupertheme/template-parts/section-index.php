
        <section>
            <h2>TITRE2</h2>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post() ?>
                    <?php
                            // POUR LES PAGES, EN FAIT, ON NE PASSE QU'UNE FOIS DANS LA BOUCLE
                            // IMPORTANT: PARCE C'EST the_post QUI FAIT LE READ SQL
                            //
                            // Post Content here
                            // ICI ON PEUT UTILISER LES CONTENUS DES COLONNES DE LA TABLE SQL wp_posts
                            // POUR AFFICHER LE TITRE
                            ?>
                    <h3><?php the_title() ?></h3>
                    <p><?php the_content() ?></p>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>

        <section>
            <img src="<?php echo get_theme_file_uri("/assets/img/photo1.jpg") ?>" alt="">
        </section>