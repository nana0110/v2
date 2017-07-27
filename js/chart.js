var ctx = document.getElementById("chart");
Chart.defaults.global.legend.display = false;

loadJSON("json/fruits.json", function(response) {
    loadJSON("json/fruitdata.json", function(response2) {

        var fruits = JSON.parse(response);
        console.log(fruits);
        var fruitdata = JSON.parse(response2);
        console.log(fruitdata);

        /*//Calculate in procent
        var sum = 0;
        for(var i = 0; i < fruitdata.length; i++){
            sum += fruitdata[i];
            console.log(fruitdata[i]);
        }
        for(var i = 0; i < fruitdata.length; i++){
            var procent = Math.round(fruitdata[i]/sum*100);
            fruitdata[i] = procent;
            console.log(fruitdata[i]);
        }*/

        var data = {
            labels: [
                fruits[0],
                fruits[1],
                fruits[2]
                //fruits[3]
            ],
            datasets: [
                {
                    data: [
                        fruitdata[0],
                        fruitdata[1],
                        fruitdata[2]
                        //fruitdata[3]
                    ],
                    backgroundColor: [
                        "#8D003B",
                        "#D9005B",
                        "#EC3B86"
                        //"#EC6AA1"
                    ],
                    hoverBackgroundColor: [
                        "#6cae41",
                        "#6cae41",
                        "#6cae41"
                        //"#6cae41"
                    ]
                }]
        };
        var myPieChart = new Chart(ctx,{
            type: 'pie',
            data: data,
            animation:{
                animateScale:true
            }
        });


    });
});


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




