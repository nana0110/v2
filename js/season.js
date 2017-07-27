/*var canvas1 = document.getElementById("season1"),
    ctx1 = canvas1.getContext("2d");

var canvas2 = document.getElementById("season2"),
    ctx2 = canvas2.getContext("2d");*/
loadJSON("json/seasons.json", function(response) {

    var seasons = JSON.parse(response);
    console.log(seasons);

    var canvas = new Array;
    var ctx = new Array;
    for (var i = 0; i < 3; i++) {
        canvas[i] = document.getElementById("season" + (i + 1).toString()),
            ctx[i] = canvas[i].getContext("2d");
    }

     for (var i = 0; i < 3; i++) {
         makeSeason(ctx[i], seasons, i);
     }

});

function makeSeason(ctx, season, int) {
    ctx.canvas.width = window.innerWidth/1.9;
    ctx.canvas.height = window.innerHeight/24;
    var drawText = false;

    var rectStartPoint = 0;
    for(var i = 1; i <= 12; i++) {
        if(jQuery.inArray(i, season[int]) != -1) {
            ctx.fillStyle = "#6cae41";
            drawText = true;
        }
        else {
            ctx.fillStyle = "#d9d9d9";
            drawText = false;
        }
        var rectwidth = ctx.canvas.width/13;
        ctx.fillRect(rectStartPoint, 0, rectwidth, ctx.canvas.height);
        if(drawText) {
            var size = 6 + rectwidth/5;
            ctx.textBaseline = "middle";
            ctx.font = size.toString() + "px Arial";
            ctx.fillStyle = "#ffffff";
            var month = ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"];
            ctx.fillText(month[i - 1], rectStartPoint + rectwidth / 2 - ctx.measureText(month[i - 1]).width / 2, ctx.canvas.height / 2);
        }
        rectStartPoint += rectwidth + 5;

    }
}


function loadJSON(file, callback) {

    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', file, true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
        }
    };
    xobj.send(null);
}

