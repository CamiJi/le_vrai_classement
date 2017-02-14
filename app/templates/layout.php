<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="alternate" href="http://levraiclassement.16mb.com/public/" hreflang="fr-fr" />

        <title>Le vrai classement du PSC5</title>

        <meta name="description" content="Le classement du championnat de handball : Honneur Departementale +16 masculin - Comité de Paris. Donne le classement sans prendre en compte les défaites et les victoires administratives, tout en comparant le résultat obtenu avec le classement officiel de la Fédération Française de Handball. De plus elle permet de visualiser le classement des attaques et des défenses. ">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Language" content="fr">
        <meta name="google-site-verification" content="LyD8sKxwD9FHgGrTjPw0KMyL746Lto2BVlqyt4KVAZg" />
        
        <!-- Chargement des favicons -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?= $this->assetUrl('favicon/apple-icon-57x57.png') ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= $this->assetUrl('favicon/apple-icon-60x60.png') ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= $this->assetUrl('favicon/apple-icon-72x72.png') ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= $this->assetUrl('favicon/apple-icon-76x76.png') ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= $this->assetUrl('favicon/apple-icon-114x114.png') ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= $this->assetUrl('favicon/apple-icon-120x120.png') ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= $this->assetUrl('favicon/apple-icon-144x144.png') ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= $this->assetUrl('favicon/apple-icon-152x152.png') ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->assetUrl('favicon/apple-icon-180x180.png') ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= $this->assetUrl('favicon/android-icon-192x192.png') ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->assetUrl('favicon/favicon-32x32.png') ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->assetUrl('favicon/favicon-96x96.png') ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->assetUrl('favicon/favicon-16x16.png') ?>">
        <link rel="manifest" href="<?= $this->assetUrl('favicon/manifest.json') ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= $this->assetUrl('favicon/ms-icon-144x144.png') ?>">
        <meta name="theme-color" content="#ffffff">



        <link rel="apple-touch-icon" href="<?= $this->assetUrl('apple-touch-icon.png') ?>">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap-theme.min.css') ?>">

        <link rel="stylesheet" href="<?= $this->assetUrl('css/main.css') ?>">


        <script src="<?= $this->assetUrl('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') ?>"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">Vous utilisez un navigateur <strong>trop ancien</strong>. SVP <a href="http://browsehappy.com/">utilisez un autre navigateur</a> pour améliorer votre navigation.</p>
        <![endif]-->


      <div class="container">
    <div id="header">
        <img src="<?= $this->assetUrl('img/logo_PSC.jpg') ?>">          
        <h1 class="bold"><?= $this->e($title) ?></h1>
        <p><?= $this->e($subtitle) ?></p> 
    </div>


          <section>
            <?= $this->section('main_content') ?>
          </section>

        <!-- Panel pour donner le link du site de la FFH -->
        <div class="panel panel-default" id="siteFFHdiv">
          <div class="panel-body">
            <h3 class="panel-title"><a href="http://www.ff-handball.org/competitions/championnats-departementaux/75-comite-de-paris.html?tx_obladygesthand_pi1[competition_id]=4514&cHash=53dc111887ff438df08f948461e435f3" target="_blank">Le lien vers le classement officiel de la FFH</a></h3>
          </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
        <script>window.jQuery || document.write('<script src="<?= $this->assetUrl('js/vendor/jquery-1.11.2.min.js') ?>"><\/script>')</script>

        <script src="<?= $this->assetUrl('js/vendor/bootstrap.min.js') ?>"></script>

        <script src="<?= $this->assetUrl('js/main.js') ?>"></script>


        <!-- Google Analytics -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-88844031-1', 'auto');
          ga('send', 'pageview');

        </script>
    </body>
</html>
