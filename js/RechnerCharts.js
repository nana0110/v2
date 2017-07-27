$( document ).ready(function() { // 6,32 5,38 2,34

    function Circle(id, text, value) {
        $(id).circliful({
            animation: 1,
            animationStep: 10,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            pointColor: '#444',
            pointSize: 45,
            percent: value,
            textSize: 28,
            noPercentageSign: true,
            replacePercentageByText: text,
            percentageTextSize: 40,
            fontColor: '#fff',
            foregroundColor: '#C05'
        });
    };

    function HalfCircle(id, text, value, size) {
        $(id).circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: value,
            replacePercentageByText: text,
            percentageTextSize: size,
            halfCircle: 1,
            foregroundColor: '#6A3',
            fontColor: '#444'
        });
    };


    var circleA = new Circle("#vitA", 'A', 60);
    var circleB1 = new Circle("#vitB1", 'B1', 30);
    var circleB2 = new Circle("#vitB2", 'B2', 10);
    var circleB3 = new Circle("#vitB3", 'B3', 75);
    var circleB5 = new Circle("#vitB5", 'B5', 45);
    var circleB6 = new Circle("#vitB6", 'B6', 21);
    var circleB7 = new Circle("#vitB7", 'B7', 21);
    var circleB9 = new Circle("#vitB9", 'B9', 21);
    var circleC = new Circle("#vitC", 'C', 21);
    var circleE = new Circle("#vitE", 'E', 21);
    var circleK = new Circle("#vitK", 'K', 21);

    var circleCa = new HalfCircle("#minCa", 'Calcium', 20, 16);
    var circleKa = new HalfCircle("#minKa", 'Kalium', 60, 16);
    var circleMa = new HalfCircle("#minMa", 'Magnesium', 60, 16);
    var circlePh = new HalfCircle("#minPh", 'Phoshor', 60, 16);
    var circleEi = new HalfCircle("#minEi", 'Eisen', 60, 16);
    var circleKu = new HalfCircle("#minKu", 'Kupfer', 60, 16);
});