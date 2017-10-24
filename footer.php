<link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<footer class="footer navbar-inverse navbar-fixed-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse navHeaderCollapse">
            <div id="kontakt">
                <ul class="nav navbar-nav">
                    <li><b>DHBW Stuttgart  </b></li>
                    <li><b>Rotebühlplatz 41,  </b></li>
                    <li><b>70176 Stuttgart  </b></li>
                    <li><b>Kontakt:</b></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div>
    <b>
    <script type="application/javascript" >
        function mail() {
            var  username = "digitales-museum";
            var  provider ="lehre.dhbw-stuttgart";
            var mail = document.createElement("a");
            mail.appendChild(document.createTextNode(username+"@"+provider+".com"));
            mail.setAttribute("href","mailto:"+username+"@"+provider+".de");
            document.getElementById("kontakt").appendChild(mail);
        }
    </script>
    </b>
</div>