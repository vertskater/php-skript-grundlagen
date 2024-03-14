<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./pico.classless.min.css">
    <title>Statistik</title>
</head>
<body>
<main class="container">
    <header>
        <h1>Namen filtern</h1>
        <a href="../uebung-P5/names_table.php?char=<?= $_GET['char'] ?>" role="button">show in Table</a>
        <nav style="display: flex; flex-wrap: wrap">
					<?php include './includes/letters.php'; ?>
        </nav>
    </header>
    <hr/>
    <section>