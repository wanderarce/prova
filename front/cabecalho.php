<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Sticky Footer Navbar Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sticky-footer-navbar/">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Favicons -->
   <link rel="stylesheet" href="../assets/font-awesome/all.min.css">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        /* Custom page CSS
-------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        body {
            padding-top: 55px;
        }

        main > .container {
            padding: 60px 15px 0;
        }

        .footer {
            background-color: #f5f5f5;
        }

        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        code {
            font-size: 80%;
        }
    </style>
    <!-- Custom styles for this template -->
    <script>
        var url = window.location;
        console.log(url);
    </script>
</head>
<body class="d-flex flex-column h-100">
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../index.php">Prova Backend ERP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:window.location.href='/prova/front/cliente/lista.php'">Cliente <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:window.location.href='/prova/front/venda/lista.php'">Venda <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php
ini_set("display_errors", "0");
?>