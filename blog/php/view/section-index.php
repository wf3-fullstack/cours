<section>
    <h2>inscription à la newsletter</h2>
    <form action="traitement.php" method="post">
        <input type="text" name="nom" required placeholder="entrez votre nom">
        <input type="email" name="email" required placeholder="entrez votre email">
        <button type="submit">inscription à la newsletter</button>
        <!-- ajout technique pour le traitement -->
        <input type="hidden" name="identifiantFormulaire" value="newsletter">
        <div class="alert">
            <!-- on verra ici la confirmation avec AJAX -->
        </div>
    </form>
</section>

<section>
    <h2>Accueil</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem accusantium, suscipit et maxime libero, veritatis obcaecati sapiente voluptatum sequi facilis odio dolores distinctio debitis. Quis quia veritatis nisi quod vel?</p>
    <div class="ligne x3col">
        <img src="assets/img/photo1.jpg" alt="cuisine">
        <img src="assets/img/photo2.jpg" alt="cuisine">
        <img src="assets/img/photo3.jpg" alt="cuisine">
    </div>
</section>