<!DOCTYPE html>
<html>
    <head>
    <title>Menu</title>
   <?php include('init.php'); ?>
</head>
<body>
<?php include('header.php'); ?>
    <div data-role="content" data-theme="a">   
        <div data-role="collapsible-set">
            <div data-role="collapsible">
                <h3><div class="programmeMenu"></div></h3>
               <a href="./enBref.php" data-role="button"><div class="enBrefMenu"></div></a>
               <a href="./horaires.php" data-role="button"><div class="horairesMenu"></div></a>
            </div>
            <div data-role="collapsible" onmousedown="window.location='./reservations.php'">
               <h3><div class="reservationMenu"></div></h3>
            </div>
            <div data-role="collapsible" data-content-theme="a">
               <h3><div class="leFestivalMenu"></div></h3>
               <a href="./rainerMariaRilke.php" data-role="button"><div class="rainerMariaRilkeMenu"></div></a>
               <a href="./historique.php" data-role="button"><div class="historiqueMenu"></div></a>
               <a href="./organisation.php" data-role="button"><div class"organisationMenu">Organisation</div></a>
            </div>
            <div data-role="collapsible">
               <h3><div class="multimediaMenu"></div></h3>
               <a href="./photos.php" data-role="button" data-ajax="false"><div class="photosMenu"></div></a>
               <a href="./videos.php" data-role="button"><div class="videoMenu"></div></a>
               <a href="#reservations" data-role="button"><div class="audioMenu"></div></a>
            </div>
            <div data-role="collapsible" onmousedown="window.location='./concours.php'">
               <h3><div class="concoursMenu"></div></h3>
            </div>
            <div data-role="collapsible">
               <h3><div class="informationsUtilesMenu"></div></h3>
               <a href="./acces.php" data-role="button"><div class="accesMenu"></div></a>
               <a href="./sponsors.php" data-role="button"><div class="sponsorsMenu"></div></a>
            </div>
        </div>
    </div><!-- /content -->


<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>