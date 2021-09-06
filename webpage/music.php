<!--
ID: U1810069
Author: SAFAROV OTAMUROD
SEC:001
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="viewer.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="header">

    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>


<div id="listarea">
    <ul id="musiclist">


<!--    php area     -->

<!--    MUSICS  - exercise1-->
        <?php

        if (!isset($_REQUEST["playlist"])) {

            $musics = glob("songs/*.mp3");
            foreach ($musics as $mp3file) {
                $musicName = basename($mp3file);
            ?>
            <li class="mp3item">
                <a href="songs/<?= "$musicName"?>"><?= "$musicName"?></a>


<!--            SIZE - exercise 4-->
                <?php
                $fileSize = filesize("$mp3file");
                if ($fileSize >= 0 and $fileSize < 1024){
                    print "( $fileSize bytes)";
                }
                elseif ($fileSize >= 1024 and $fileSize < 1048575){
                    $fileSizeKB = round($fileSize / 1024);
                    print "( $fileSizeKB KB)";
                }
                else{
                    $fileSizeMB = round($fileSize / 1024 / 1024) ;
                    $fileSizeMB = number_format($fileSizeMB, 2);
                    print "($fileSizeMB MB)";
                }
                ?>
            </li>

            <?php } ?>
<!--        PLAYLISTS - exercise2-->
            <?php

            $list = glob("songs/*.txt");
            foreach ($list as $textFile) {
                $playlist = basename($textFile);
                ?>
                <li class="playlistitem">
    <!--                <a href="songs/--><?//= "$playlist"?><!--">--><?//= "$playlist"?><!--</a>-->
                    <a href="music.php?playlist=<?= $textFile ?>"><?= $playlist ?></a>
                </li>

            <?php } ?>
        <?php } ?>

<!--    PLAYLISTS - exercise3-->

        <?php if (isset($_REQUEST["playlist"])){

            $LIST = $_REQUEST["playlist"];
            $file = file($LIST);
            foreach( $file as $mp3){ ?>
                <li class="mp3item">
                     <a href="songs/<?= $mp3?>"><?= basename($mp3) ?></a>
                 </li>
            <?php } ?>
        <?php } ?>

<!--    html area-->

    </ul>
</div>
</body>
</html>