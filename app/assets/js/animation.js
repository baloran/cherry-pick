   
        var season_data = [
            {
                value: 5,
                color:"rgba(246,232,1,1)",
                label: "Yellow"
            },
            {
                value: 1,
                color: "rgba(60,107,147,1)",
                label: "Blue"
            }
        ]
        var season_options = {
            segmentShowStroke : false,
            percentageInnerCutout : 80,
            animationEasing: "easeInOutQuart"
        }

        
    //////////////////////////////////////////////////
    ////////////////// DONUT N°2 /////////////////////
    var episodes_data = [
            {
                value: 121,
                color:"rgba(246,232,1,1)",
                responsive: true,
                label: "Yellow"
            },
            {
                value: 21,
                color: "rgba(60,107,147,1)",
                label: "Blue"
            }
        ]
        var episodes_options = {
            segmentShowStroke : false,
            percentageInnerCutout : 80,
            animationEasing: "easeInOutQuart"
        }
    var episodes = document.getElementById('episodes').getContext('2d');
        new Chart(episodes).Doughnut(episodes_data, episodes_options);
    //////////////////////////////////////////////////
    ////////////////// NUMBER VIEWER /////////////////////
    var graph_data = {
        labels: ["0","1", "2", "3", "4", "5"],
        datasets: [
            {
            label: "Blue",
            fillColor: "rgba(60,107,147,0.1)",
            strokeColor: "rgba(60,107,147,1)",
            pointColor: "rgba(60,107,147,1)",
            pointStrokeColor: "rgba(60,107,147,1)",
            pointHighlightFill: "rgba(60,107,147,1)",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [0,359000]
            },
            {
            label: "Yellow",
            fillColor: "rgba(246,232,1,0.05)",
            strokeColor: "rgba(246,232,1,1);",
            pointColor: "rgba(246,232,1,1);",
            pointStrokeColor: "rgba(246,232,1,1)",
            pointHighlightFill: "rgba(246,232,1,1)",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [0,39103,109319,489028,1100039, 2380380]
            }
        ]
        };
    var graph_options = {
        bezierCurve: false,
        scaleGridLineColor : "rgba(245,245,245,0.1)"
    }
    var graph = document.getElementById('graph').getContext('2d');
        new Chart(graph).Line(graph_data, graph_options);
    //////////////////////////////////////////////////////
    ////////////////// MEDIA RATINGS /////////////////////
    
    var star_data = {
    labels: ["IMDb", "Trakt", "Rotten Tomatoes", "TMDB"],
    datasets: [
        {
            label: "Blue",
            fillColor: "rgba(60,107,147,0.1)",
            strokeColor: "rgba(60,107,147,1)",
            pointColor: "rgba(60,107,147,1)",
            pointStrokeColor: "rgba(60,107,147,1)",
            pointHighlightFill: "rgba(60,107,147,1)",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [4, 4, 4.2, 3]
        },
        {
            label: "Yeallow",
            fillColor: "rgba(246,232,1,0.05)",
            strokeColor: "rgba(246,232,1,1)",
            pointColor: "rgba(246,232,1,1)",
            pointStrokeColor: "rgba(246,232,1,1)",
            pointHighlightFill: "rgba(246,232,1,1)",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [4.5, 4, 3.9, 4.2]
        }
    ]
};
    var star_options = {
        angleLineColor : "rgba(245,245,245,0)",
        scaleLineColor: "rgba(245,245,245,.1)",
        scaleShowLine : true,

    //Boolean - Whether we show the angle lines out of the radar
    angleShowLineOut : true,

    //Boolean - Whether to show labels on the scale
    scaleShowLabels : false
    }
var star = document.getElementById('star').getContext('2d');
        new Chart(star).Radar(star_data, star_options);
        