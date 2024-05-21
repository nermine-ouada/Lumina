<?php

include ('../../config.php');
session_start();

if (!isset($_SESSION['participant'])) {
    header("Location: auth/login.php");
    exit();
}
$participant_id = $_SESSION['participant_id'];


// Récupérer les données du participant à partir de la base de données
$sql = 'SELECT * FROM participant WHERE participant_id = ?';
$stmt = $conn->prepare($sql);
$stmt->execute([$participant_id]);
$participant = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si les données du participant ont été récupérées avec succès
if (!$participant) {
    // Rediriger l'utilisateur vers une page d'erreur ou afficher un message d'erreur
    echo "Erreur: Participant introuvable.";
    exit();
}
include ('header.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title> Dashboard Profile Page Theme Color CSS Vanilla JS Example </title>
    <!-- Style CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- Demo CSS (No need to include it into your project) -->
    <link rel="stylesheet" href="../../assets/css/demo.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
</head>

<body>

    <!--$%adsense%$-->
    <main class="cd__main">
        <!-- Start DEMO HTML (Use the following code into your project)-->
        <div class="profile-page">
            <div class="content">
                <div class="content__cover">
                    <div class="content__avatar"></div>
                    <div class="content__bull"><span></span><span></span><span></span><span></span><span></span>
                    </div>
                </div>
                <div class="content__actions"><a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path fill="currentColor"
                                d="M192 256A112 112 0 1 0 80 144a111.94 111.94 0 0 0 112 112zm76.8 32h-8.3a157.53 157.53 0 0 1-68.5 16c-24.6 0-47.6-6-68.5-16h-8.3A115.23 115.23 0 0 0 0 403.2V432a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48v-28.8A115.23 115.23 0 0 0 268.8 288z">
                            </path>
                            <path fill="currentColor"
                                d="M480 256a96 96 0 1 0-96-96 96 96 0 0 0 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592a48 48 0 0 0 48-48 111.94 111.94 0 0 0-112-112z">
                            </path>
                        </svg><span>Connect</span></a><a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M208 352c-41 0-79.1-9.3-111.3-25-21.8 12.7-52.1 25-88.7 25a7.83 7.83 0 0 1-7.3-4.8 8 8 0 0 1 1.5-8.7c.3-.3 22.4-24.3 35.8-54.5-23.9-26.1-38-57.7-38-92C0 103.6 93.1 32 208 32s208 71.6 208 160-93.1 160-208 160z">
                            </path>
                            <path fill="currentColor"
                                d="M576 320c0 34.3-14.1 66-38 92 13.4 30.3 35.5 54.2 35.8 54.5a8 8 0 0 1 1.5 8.7 7.88 7.88 0 0 1-7.3 4.8c-36.6 0-66.9-12.3-88.7-25-32.2 15.8-70.3 25-111.3 25-86.2 0-160.2-40.4-191.7-97.9A299.82 299.82 0 0 0 208 384c132.3 0 240-86.1 240-192a148.61 148.61 0 0 0-1.3-20.1C522.5 195.8 576 253.1 576 320z">
                            </path>
                        </svg><span>Message</span></a></div>
                <div class="content__title">

                    <h1> <?php if (isset($participant['last_name']))
                        echo $participant['last_name']; ?>
                        <?php if (isset($participant['first_name']))
                            echo $participant['first_name']; ?>
                    </h1><span>
                        <p></p>
                    </span>
                </div>
                <div class="content__description">
                    <p>cin: <?php if (isset($participant['cin']))
                        echo $participant['cin']; ?></p>
                    <p>tel: <?php if (isset($participant['tel']))
                        echo $participant['tel']; ?></p>
                    <p>email: <?php if (isset($participant['email']))
                        echo $participant['email']; ?></p>
                    <p>address: <?php if (isset($participant['address']))
                        echo $participant['address']; ?></p>
                </div>

                <div class="content__button"><a class="button" href="#">
                        <div class="button__border"></div>
                        <div class="button__bg"></div>
                        <p class="button__text">Show more</p>
                    </a></div>
            </div>
            <div class="bg">
                <div><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                </div>
            </div>
            <div class="theme-switcher-wrapper" id="theme-switcher-wrapper"><span>Themes color</span>
                <ul>
                    <li><em class="is-active" data-theme="orange"></em></li>
                    <li><em data-theme="green"></em></li>
                    <li><em data-theme="purple"></em></li>
                    <li><em data-theme="blue"></em></li>
                </ul>
            </div>
            <div class="theme-switcher-button" id="theme-switcher-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path fill="currentColor"
                        d="M352 0H32C14.33 0 0 14.33 0 32v224h384V32c0-17.67-14.33-32-32-32zM0 320c0 35.35 28.66 64 64 64h64v64c0 35.35 28.66 64 64 64s64-28.65 64-64v-64h64c35.34 0 64-28.65 64-64v-32H0v32zm192 104c13.25 0 24 10.74 24 24 0 13.25-10.75 24-24 24s-24-10.75-24-24c0-13.26 10.75-24 24-24z">
                    </path>
                </svg>
            </div>
        </div>
        <!-- END EDMO HTML (Happy Coding!)-->
    </main>

    <!-- Script JS -->
    <script src="../../assets/js/script.js"></script>
    <!--$%analytics%$-->
</body>
<?php include ('footer.php'); ?>