<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font arimo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">

    <!-- font averia sans libre -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Sans+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

    <!-- favicon du site -->
    <link rel="icon" type="image/png" href="./public/ressources/favicon/favicon-site-antho13.png">

    <!-- mes styles -->
    <link rel="stylesheet" href="./public/styles/style.css">
    <?= $liens ?>

    <?= $meta ?>

    <title><?= $title ?></title>
</head>

<body>
    <header id="bandeHaut">
        <!-- bandeau header fait avec le composant de vue js -->
        <bande_header></bande_header>
    </header>

    <?= $content ?>

    <footer id="bande_bas">
        <!-- bandeau fait avec le composant dans vue JS -->
        <bande-footer></bande-footer>
    </footer>

    <!-- script font awesome -->
    <script src="https://kit.fontawesome.com/780e1487a9.js" crossorigin="anonymous"></script>
    <!-- CDN de VUE  JS  on peut le mettre en haut ou en bas, cela importe peu -->
    <script src="https://unpkg.com/vue@next"></script>
    <!-- mes scripts -->
    <script src="./public/scripts/script_header-footer.js"></script>
    <?= $scripts ?>
</body>
</html>