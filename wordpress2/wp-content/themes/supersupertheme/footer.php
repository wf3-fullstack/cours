    </main>
    <footer>
        <nav>
            <?php wp_nav_menu(['theme_location' => 'secondary']) ?>
        </nav>
        <p>tous droits réservés - &copy;2019</p>
    </footer>
    <!-- WORDPRESS PEUT INSERER DU CODE JS (ET AUSSI HTML) -->
    <?php wp_footer() ?>

    <script src="<?php echo get_theme_file_uri("/assets/js/main.js") ?>"></script>
    </body>

    </html>