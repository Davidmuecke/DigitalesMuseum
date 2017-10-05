//Mail-Adresse ausgeben
var prefix = "mailto:";
var firstName = "jonathan";
var lastName = "weyl";
var provider = "gmail";
var topLevelDomain = "com";

//Statusmodell für XML-Request
var req = null;
var READY_STATE_UNINITIALIZED = 0;
var READY_STATE_LOADING = 1;
var READY_STATE_LOADED = 2;
var READY_STATE_INTERACTIVE = 3;
var READY_STATE_COMPLETE = 4;


function sendRequest(url,params,HTTPMethod) {
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (req) {
        req.onreadystatechange = onReadyState;
        req.open(HTTPMethod,url,true);
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.send(params);
    }
}


function onReadyState() {
    var ready = req.readyState;
    //alert("readyState: " + req.readyState);
    if (ready == READY_STATE_COMPLETE) {
        if( req.responseText ) {
            var refZiel = document.getElementById( "spielfeld" );
            var plan = document.createElement("div");
            plan.setAttribute("id",plan);
            if(refZiel.lastElementChild.getAttribute("id")=="plan") {
                refZiel.removeChild(refZiel.lastChild);
            }
            refZiel.innerHTML = req.responseText;
            refZiel.appendChild(plan);
        }
    }
}


function showKacheln(ID, username1,username2, user, scheme) {
    //alert("showGamesBlock()");
    header = document.createElement("h2");
    if(username2 != "") {
        header.appendChild(document.createTextNode("Offenes Spiel"));
    } else {
        header.appendChild(document.createTextNode("Neues Spiel"));
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
        text.appendChild(document.createTextNode("Gegner wird gesucht"));
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

        document.getElementById("body").appendChild(game);
    }
}


















