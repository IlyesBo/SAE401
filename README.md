# SAE401
Bienvenue sur le repository GitHub de notre projet universitaire dédié à la création d'un site web de restaurant de sushi et de réservation. Ce projet vise à développer une plateforme moderne et conviviale permettant aux utilisateurs de découvrir notre restaurant, consulter le menu, effectuer des réservations et interagir avec notre équipe.

<h3>Contexte</h3>

Ce projet a été réalisé dans le cadre d'un cours universitaire mettant l'accent sur le développement web et la conception d'API. Nous avons choisi de concevoir un site web pour un restaurant de sushi, une entreprise qui nécessite souvent une plateforme en ligne pour permettre aux clients de réserver des tables et de parcourir le menu.
Voici le [cahier des charges](https://github.com/IlyesBo/SAE401/blob/main/Documentation/Cahier%20des%20charges.pdf) qui nous a été fournis.

<h4>Technologies utilisées:</h4>
Front-end: Angular, Bootstrap, HTML, CSS, TypeScript
Back-end: PHP, Typescript

Vous retrouverez dans ce documents tous les éléments nécessaires à la réalisation de notre projets, maquettes, diagrammes, plannification codes, rgpd.

#Sommaire

- [Livrable L401_1 : Dossier d'analyse](#livrable-l401_1--dossier-danalyse)
  - [Répartition des tâches](#répartition-des-tâches)
  - [Nom et Logo de l'application](#nom-et-logo-de-lapplication)
  - [Diagramme Use Case](#diagramme-use-case)
  - [Diagramme d'activités](#diagramme-dactivités)
  - [Diagramme de classes](#diagramme-de-classes)
- [Livrable L401_2](#livrable--l401_2)
  - [Implémentation et architécture de la partie back.](#implémentation-et-architécture-de-la-partie-back)
- [Livrable L401_3](#livrable--l401_3)
  - [Maquettes de l'application](#maquettes-de-lapplication)
- [Livrable L401_4](#livrable--l401_4)
  - [Intégralité du code de la partie Front avec suivi des mises à jour](#intégralité-du-code-de-la-partie-front-avec-suivi-des-mises-à-jour)
- [Livrable L401_5](#livrable--l401_5)
  - [Page pour la prise en compte des règles RGPD liées à l'application](#rgpd)
  - [Document comprenent des scénarios malveillants et les mesures pour les contrecarrer](#user-evil)

# Livrable L401_1 : Dossier d'analyse

<h2 id="répartition-des-tâches">Répartition des tâches</h2>

Nous avons plannifier notre projet sur l'outil de gestion de projet en ligne TRELLO, [cliquez-ici pour y accéder](https://trello.com/invite/b/wLtTQiaz/ATTIf68be55ea010272ef062c92d2e3464579689B28D/plannification-sae-401).
![image](https://github.com/IlyesBo/SAE401/assets/115214794/cdd4664e-3117-482a-bf71-cc252585c01e)



<h3>Ilyès BOUZIANE (IlyesBO):</h3>
En tant que chef de projet, je coordonne les efforts de l'équipe tout en contribuant activement au développement frontend et backend. Cette approche me permet de superviser le projet de manière globale tout en restant impliqué dans la réalisation des fonctionnalités clés. Mon rôle est d'assurer le bon déroulement du projet en veillant également à repecter les délais imposés.

<h3>Alan LESZEK (Ales230):</h3>
Responsable de la partie back-end du projet, mon rôle est de mettre en place une API REST fonctionnelle pour gérer les boxes de sushi ainsi que la base de données. J'utilise la méthode CRUD (Create, Read, Update et Delete) pour les mettre à jour. Je l'héberge égagalement sur.....

<h3>Joris DUPRE (JSo77):</h3> 
Au sein du projet, j'ai pensé tout le fonctionnement du site dont les parcours utilisateurs pour que la navigation soit fluide et intuitive. Je suis également développeur front-end donc je suis chargé de traduire le design des maquettes en code.

<h3>Nathan ROBERT (NathanRobertMMI):</h3>
En tant que designer du projet mon rôle est de travailler sur le visuel du site, j'ai pu créer un logo, les maquettes avec l'aprobation de l'équipe, les palettes de couleurs ainsi que les typographies, j'aide également au développement front pour traduire la maquette en code.

<h2 id="nom-et-logo-de-lapplication">Nom et Logo de l'application</h2>

Nous avons choisis le nom 'Sushill" qui est un jeux de mots venant de l'expression anglaise "So chill" ( si calme/détendu en français), le logo fait référence au nom avec la représentation d'un sushi sous forme d'un personnage qui porte des lunettes de soleil qui pose de manière détendu.
Nathan l'a imaginé et dessiné sur le logiel Procreate en créant également des boxes personnalisées à implanter sur le site web.

![image](https://github.com/IlyesBo/SAE401/assets/115214794/fc6d7e8c-a440-44bd-8a01-65f0a7af76a7)  ![accueil(1)](https://github.com/IlyesBo/SAE401/assets/115214794/b98b4c04-7151-4659-8be3-68c400f59ded)





<h2 id="diagramme-use-case">Diagramme Use Case</h2>

![diag_use_case drawio](https://github.com/IlyesBo/SAE401/assets/115214794/3b45965c-c88c-4c89-8052-e681f077ab9f)

<h2 id="diagramme-dactivités">Diagramme d'activités</h2>

![diag_activités drawio](https://github.com/IlyesBo/SAE401/assets/115214794/0dc58e02-163a-4a4c-b9db-0e54c373b648)

<h2 id="diagramme-de-classes">Diagramme de classes</h2>

![SAE401_Diagramme_classes_groupe4 drawio](https://github.com/IlyesBo/SAE401/assets/115214794/08f6e509-8890-4b09-b019-05e41254803d)



# Livrable : L401_2

<h2 id="implémentation-et-architécture-de-la-partie-back">Implémentation et architécture de la partie back.</h2>

Cliquez sur le lien ci-dessous pour accéder au code de notre api REST:

https://github.com/IlyesBo/SAE401/tree/main/apiSushi

![image](https://github.com/IlyesBo/SAE401/assets/115214794/807ab436-d445-47ea-9a1f-512982485947)


# Livrable : L401_3

<h2 id="maquettes-de-lapplication">Maquettes de l'application</h2>

Nous avons réaliser la maquette de notre application sur l'éditeur de graphique FIGMA, [cliquez-ici pour accéder à la maquette complète.](https://www.figma.com/file/mJPIAKbHiOl9iZ70PtWVPV/SAE-401-maquette?type=design&node-id=0%3A1&mode=design&t=5dXQOrUazbawneyQ-1)

Nous avons une première version et une deuxième que nous avons fait par la suite car la première ne correspondait pas totalement au cahier des charges.

Voici la première version:

<h3>Accueil et panier</h3>
<br>

![image](https://github.com/IlyesBo/SAE401/assets/115214794/46304abc-3e4b-4db2-9ea9-35b701426a9f)

<h3>Menu Boxes</h3>
<br>

![image](https://github.com/IlyesBo/SAE401/assets/115214794/c0020dd4-6ef5-4f22-9407-973e496db54e)



<h3>Carte</h3>
<br>

![image](https://github.com/IlyesBo/SAE401/assets/115214794/d814aaea-bb6e-4cd6-b020-7c5caf56b554)


<h3>Équipe et emplacement</h3>
<br>

![image](https://github.com/IlyesBo/SAE401/assets/115214794/0fcd12fc-7b63-4b2f-8545-e27316e4b2c6)



<h3>Footer</h3>
<br>

![image](https://github.com/IlyesBo/SAE401/assets/115214794/d3fbc70f-1562-405d-a0d5-4dafcb7b31b9)

Voici la version finale:

<h3>Accueil et panier</h3>
<br>

![image](https://github.com/IlyesBo/SAE401/assets/115214794/0e7c68bc-7892-4924-b690-9d7acb2753f3)

<h3>Menu</h3>
<br>

![image](https://github.com/IlyesBo/SAE401/assets/115214794/9cce61ef-a126-48f5-85de-bef136e408ad)

<h3>Informations Entreprise</h3>
<br>

![image](https://github.com/IlyesBo/SAE401/assets/115214794/ad4286a0-ed4a-4f79-866e-a0c87ac535f5)

<h3>Footer</h3>
<br>

![image](https://github.com/IlyesBo/SAE401/assets/115214794/5686d37c-33e8-4a49-9f2f-55b87010f9a7)

# Livrable : L401_4

<h2 id="intégralité-du-code-de-la-partie-front-avec-suivi-des-mises-à-jour">Intégralité du code de la partie Front avec suivi des mises à jour</h2>

Cliquez sur le lien ci-dessous pour visualiser:
https://github.com/IlyesBo/SAE401/commits/main/

![image](https://github.com/IlyesBo/SAE401/assets/115214794/b9826d46-7463-4733-908a-384df3e84d75)

# Livrable : L401_5

<h2 id="rgpd">Page pour la prise en compte des règles RGPD liées à l'application</h2>

La page de politique de confidentialité sera accéssible dans le footer, [cliquez-ici pour visualiser le rgpd en pdf](https://github.com/IlyesBo/SAE401/blob/main/Documentation/RGPD_SUSHILL.pdf).

<h2 id="user-evil">Document comprenent des scénarios malveillants et les mesures pour les contrecarrer</h2>

Nos user evil stories sont visualisables en [cliquant sur ce lien qui ramène au pdf](https://github.com/IlyesBo/SAE401/blob/main/Documentation/SCENARIOS_MALVEILLANT_SUSHILL.pdf).




