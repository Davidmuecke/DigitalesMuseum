<?php
/**
 * Created by PhpStorm.
 * User: illi
 * Date: 04.08.2017
 * Time: 13:28
 */
?>
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="rahels_css.css">
<footer class="footer navbar-fixed-bottom">
    <div id="kontakt">
        DHBW Stuttgart <br>
        Rotebühlplatz 41,
        70176 Stuttgart <br>
        Kontakt:
    </div>
</footer>
<div>
    <script type="application/javascript" >
        function mail() {
            var  eins = "digitales-museum";
            var  zwei ="lehre.dhbw-stuttgart";
            var mail = document.createElement("a");
            mail.appendChild(document.createTextNode(eins+"@"+zwei+".com"));
            mail.setAttribute("href","mailto:"+eins+"@"+zwei+".de");
            document.getElementById("kontakt").appendChild(mail);
        }
    </script>
</div>