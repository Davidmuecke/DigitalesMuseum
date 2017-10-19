<script type="text/javascript">
    <!--
    var sel = document.getElementById('epochen_auswahl');
    sel.onchange = function zwei() {
        if (document.getElementById('epochen_auswahl').value == "neueEpoche") {
            var show = document.getElementById('ne_input');
            show.style.display = "block";
        }
        else {
            var show = document.getElementById('ne_input');
            show.style.display = "none";
        }
    }
    -->
</script>




<div id="ne_input">
    <input type="text" placeholder="Neue Epoche eingeben"
           name="neue_epoche" class="form-control"
           required>
</div>


<div id="add_button_person">
    <a onclick="addElement('epoche','ueber_epoche')" class="btn_add"><span
            class="glyphicon glyphicon-plus"></span></a>
</div>