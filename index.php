<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SushiCool</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #373737; 
    color:white;
}

header {
    background-color: #d9d9d978; /* Couleur de fond gris pour le header */
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    background-color: #FD9A9A; /* Couleur rose saumon pour les boutons */
}

nav ul li a:hover {
    background-color: #FD9A9A; /* Couleur rose saumon plus foncée au survol */
}

footer {
    background-color: #808080; /* Couleur de fond gris pour le footer */
    color: white;
    padding: 20px;
    text-align: center;
}

button {
    background-color: #FD9A9A; /* Couleur rose saumon pour les boutons */
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: rgb(174, 72, 41); /* Couleur rose saumon plus foncée au survol */
}
    </style>
</head>
<body>

<header>
    <p>☼<p>
    <nav>
        <ul>
            <li><a href="#nos-offres">Nos Offres</a></li>
            <li><a href="#sushi-a-la-carte">Sushi à la Carte</a></li>
            <li><a href="#nos-restaurants">Nos Restaurants</a></li>
        </ul>
    </nav>
    <div>Panier</div> <!-- Ajoutez l'icône ou le contenu du panier ici -->
</header>

<div>Livraison gratuite à partir de 30€ d'achat</div>

<h1>SushiCool</h1>
<p>Restaurant Livraison</p>
<img src="ressources/logo.png" alt="logo_sushi">

<h2>La meilleure expérience sushi</h2>
<h3>12€ offerts sur votre première commande</h3>

<section id="nos-offres">
    <h2>Offres du Moment</h2>
    <table>
        <tr>
            <td><img src="chemin/vers/image1.jpg" alt="Offre 1"></td>
            <td><img src="chemin/vers/image2.jpg" alt="Offre 2"></td>
            <td><img src="chemin/vers/image3.jpg" alt="Offre 3"></td>
        </tr>
        <tr>
            <td colspan="3"><img src="chemin/vers/image4.jpg" alt="Offre 4"></td>
        </tr>
        <tr>
            <td><img src="chemin/vers/image5.jpg" alt="Offre 5"></td>
            <td><img src="chemin/vers/image6.jpg" alt="Offre 6"></td>
            <td><img src="chemin/vers/image7.jpg" alt="Offre 7"></td>
        </tr>
    </table>
</section>

<section id="sushi-a-la-carte">
    <h2>À la Carte</h2>
    <table>
        <tr>
            <th>Nom du Poisson</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Saumon</td>
            <td><img src="chemin/vers/saumon.jpg" alt="Saumon"></td>
            <td><button>+</button></td>
        </tr>
        <!-- Ajoutez d'autres lignes pour d'autres poissons -->
    </table>
</section>

<section id="notre-equipe">
    <h2>Notre Équipe</h2>
    <div>
        <img src="chemin/vers/photo1.jpg" alt="Nom Prénom">
        <p>Nom Prénom - Poste</p>
    </div>

</section>

<footer>
    <h3>Vous avez un sushi ?</h3>
    <h2>Contactez Nous</h2>
    <p>Téléphone: 0123456789</p>
    <p>Email: info@sushicool.com</p>
    <p>Conditions Générales</p>
</footer>

</body>
</html>
