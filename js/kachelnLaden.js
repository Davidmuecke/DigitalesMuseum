
function showKacheln(ID, username1,username2, user, scheme) {
    //alert("showGamesBlock()");
    header = document.createElement("h2");
    if(username2 != "") {
        header.appendChild(document.createTextNode("Offenes Spiel"));
    } else {
        header.appendChild(document.createTextNode("Kategorie"));
    }
    game = document.createElement("div");
    if(username2 != "") {
        game.setAttribute("class","game " + scheme);
    } else {
        game.setAttribute("class","newGame " + scheme);
    }

    text = document.createElement("p");
    text.appendChild(document.createTextNode(username1 + " vs. "));
    if(username2 != "") {
        text.appendChild(document.createTextNode(username2));
    } else {
        text.appendChild(document.createTextNode("Zeitalter: 1750"));
    }
    //text.appendChild(username1);

    game.appendChild(header);
    game.appendChild(text);
    //alert("username1" + username1 + " user: " + user);
    if(username2 != "") {
        form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "game.php");
        id = document.createElement("input");
        id.setAttribute("type", "hidden");
        id.setAttribute("name", "id");
        id.setAttribute("value", ID);
        submit = document.createElement("input");
        submit.setAttribute("type", "submit");
        submit.setAttribute("class", "spielenButton");
        submit.setAttribute("value", "Spielen");
        form.appendChild(id);
        form.appendChild(submit);
        game.appendChild(form);


        document.getElementById("body").appendChild(game);
    } else {
        if (username1 != user) {
            form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "spielBetreten.php");
            id = document.createElement("input");
            id.setAttribute("type", "hidden");
            id.setAttribute("name", "id");
            id.setAttribute("value", ID);
            submit = document.createElement("input");
            submit.setAttribute("type", "submit");
            submit.setAttribute("class", "spielenButton");
            submit.setAttribute("value", "Spiel beitreten");
            form.appendChild(id);
            form.appendChild(submit);
            game.appendChild(form);
        }

        document.getElementById("startseite_button").appendChild(game);
    }
}


















