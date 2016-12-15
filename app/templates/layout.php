<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Le vrai classement du PSC5</title>

        <meta name="description" content="Cette page contient le classement du championnat de handball niveau : Honneur Departementale +16 masculin - Comité de Paris. Elle a pour but de donner le classement sans prendre en compte les défaites et les victoires administratives, tout en comparant le résultat obtenu avec le classement officiel de la Fédération Française de Handball. De plus elle permet de visualiser le classement des attaques et des défenses. ">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
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
        <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">

        <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap-theme.min.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/main.css') ?>">

        <script src="<?= $this->assetUrl('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') ?>"></script>
    </head>
    <body style="margin-top: 30px;">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


      <div class="container">
        <div class="jumbotron">
          <header>
            <h1><?= $this->e($title) ?></h1>
            <blockquote>
                <p><em><?= $this->e($subtitle) ?></em></p>
            </blockquote>
          </header>
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


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
