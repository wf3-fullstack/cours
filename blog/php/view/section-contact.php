<section>
    <h2>Contact</h2>
    <form action="traitement.php" method="POST">
        <!-- partie pour le visiteur -->
        <!-- http://html5pattern.com/ -->
        <label>
            <div>nom</div>
            <input type="text" name="nom" required maxlength="160" placeholder="entrez votre nom">
        </label>
        <label>
            <div>email</div>
            <input type="email" name="email" required maxlength="160" placeholder="entrez votre email">
        </label>
        <label>
            <div>message</div>
            <textarea name="message" cols="80" rows="8" required placeholder="entrez votre message"></textarea>
        </label>
        <button type="submit">envoyer votre message</button>
        <div class="alert"></div>
        <!-- partie technique pour faciliter le traitement php -->
        <input type="hidden" name="identifiantFormulaire" value="contact">
    </form>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem accusantium, suscipit et maxime libero, veritatis obcaecati sapiente voluptatum sequi facilis odio dolores distinctio debitis. Quis quia veritatis nisi quod vel?</p>
    <img src="assets/img/photo3.jpg" alt="cuisine">
</section>