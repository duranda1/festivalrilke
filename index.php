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
               <a href="./programme.php" data-role="button"><div class="progMenu">Programme</div></a>
               <a href="./horaires.php" data-role="button"><div class="horairesMenu">Horaires </div></a>
            </div>
          <span class="except">
            <div data-role="collapsible" onmousedown="window.location='./reservations.php'">
               <h3><div class="reservationMenu"></div></h3>
            </div>
          </span>
            <div data-role="collapsible" data-content-theme="a">
               <h3><div class="leFestivalMenu"></div></h3>
               <a href="./rainerMariaRilke.php" data-role="button"><div class="rainerMariaRilkeMenu">Rilke</div></a>
               <a href="./historique.php" data-role="button"><div class="historiqueMenu">Historique</div></a>

               <a href="./organisation.php" data-role="button"><div class"organisationMenu">Organisation</div></a>
            </div>
            <div data-role="collapsible">
               <h3><div class="multimediaMenu"></div></h3>
               <a href="./photos.php" data-role="button" data-ajax="false"><div class="photosMenu">Photos</div></a>
               <a href="./videos.php" data-role="button"><div class="videoMenu">Video</div></a>
               <a href="./audio.php" data-role="button"><div class="audioMenu">Audio</div></a>
            </div>
           <span class="except"> 
            <div data-role="collapsible" onmousedown="window.location='./concours.php'">
               <h3><div class="concoursMenu"></div></h3>
            </div>
           </span>
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