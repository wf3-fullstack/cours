<section>
    <h2>SECTION CONTACT</h2>
    <!-- 
    ON VA DEMANDER LE NOM, SON EMAIL ET PUIS LE MESSAGE
    ET ON AURA UN BOUTON POUR ENVOYER LE MESSAGE    
    -->
    <form class="contact" action="traitement.php" method="POST">
        <label>
            <p>nom</p>
            <input type="text" name="nom" placeholder="entrez votre nom" required>
        </label>
        <label>
            <p>email</p>
            <input type="email" name="email" placeholder="entrez votre email" required>
        </label>
        <label>
            <p>message</p>
            <textarea name="message" cols="30" rows="10" required placeholder="entrez votre message"></textarea>
        </label>
        <button type="submit">ENVOYER VOTRE MESSAGE</button>
        <div class="alert">
            <!-- ICI ON VERRA LE MESSAGE DE CONFIRMATION -->
        </div>
    </form>

    <script>
        // LE CODE JS SERA DEPLACE ENSUITE DANS assets/js/script.js         
        // IL FAUT COMMENCER PAR BLOQUER L'ENVOI DU FORMULAIRE
        // POUR AGIR EN JS SUR UNE BALISE HTML, J'AI BESOIN DE SELECTIONNER LA BALISE
        // DOM Document Objet Model
        var formulaire = document.querySelector("form.contact");

        // debug
        console.log(formulaire);
        // JE VEUX POUVOIR ACTIVER MON CODE JS
        // AU MOMENT OU LE VISITEUR VA ENVOYER LE FORMULAIRE
        // EVENT LISTENER
        formulaire.addEventListener("submit", function(event) {
            // ON RANGE DU CODE EN ATTENTE 
            // CE CODE SERA DECLENCHE SUR UNE ACTION DU VISITEUR

            // POUR BLOQUER L'ENVOI DU FORMULAIRE
            event.preventDefault();
            // debug
            console.log("JE VIENS DE BLOQUER LE FORMULAIRE");

            // MAINTENANT JE DOIS RECUPERER LES INFOS DU FORMULAIRES
            // (SANS QU'ELLES SOIENT ENVOYEES)
            console.log(event.target);

            // https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects

            var formData = new FormData(event.target);

            // ON PEUT AJOUTER DES INFOS SUPPLEMENTAIRES
            formData.append("cle", "valeur");
            
            // ET ENSUITE, JE VAIS LES ENVOYER PAR AJAX
            // => CA NE RECHARGE PAS LA PAGE ACTUELLE
            fetch("traitement.php", {
                    method: "POST",
                    body: formData // ICI ON TRANSMET DANS LA REQUETE AJAX LES INFOS DU FORMULAIRE
                })
                .then(function(response) {
                    // CE CODE SERA ACTIVE QUAND ON RECEVRA LA REPONSE DU SERVEUR (ASYNCHRONE/PROMESSE)
                    // JE VEUX LE CODE JSON A PARTIR DE LA REPONSE DU SERVEUR
                    return response.json();
                })
                .then(function(objetJSON) {
                    // debug
                    console.log(objetJSON);
                    // MAINTENANT JE VEUX AFFICHER UN MESSAGE POUR LE VISITEUR
                    // (ne pas oublier de rajouter le code HTML...)
                    var baliseAlert = event.target.querySelector(".alert");
                    baliseAlert.innerHTML = "MERCI POUR VOTRE MESSAGE " + objetJSON.nom;
                });
        });
    </script>

    <img src="assets/img/photo2.jpg" alt="ma jolie photo">
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, distinctio! Quod fugiat minima voluptatibus consequuntur, alias quasi et autem laudantium esse numquam ipsam eos inventore quaerat voluptatem iure, excepturi asperiores.</p>
</section>