<section class="container">
		<div class="go_left" id="go_left">
			<div class="content">
				<div class="background" style="background-image:url('<?= $show->fanart_full ?>')" >
					<input type="text" class="title" value="<?= $show->title ?>">
				</div>
			</div>
		</div>
		<div class="opacity loader"id="animation">
			<button  class="VS">VS
			</button>
		</div>
		<div class="go_right" id="go_right" >
			<div class="content">
				<div class="background">
					<input type="text" class="title2" placeholder="find a tv show !">
				</div>
				
			</div>
		</div>
	</section>
		<div id="quit"><a href="compare.html"><img src="img/quit.png" alt="quit"></a></div>
		<header id="header_dataviz">
			<section class="versus">
				<h2>THE DUEL</h2>
				<div class="vs">
					<div class="serie1">
						<h3><?= $show->title ?></h3>
					</div>
					<div class="serie2">
						<h3>The walking dead</h3>
					</div>
					<div class="middle">VS</div>
				</div>
			</section>
		</header>
		<section class="info">
			<article class="fullpage synopsis">
				<h3>SYNOPSIS / GENRE / TOP ACTOR</h3>
				<div class="left text-right">
					<ul class="actor">
						<?php foreach ($show->cast as $cast): ?>
							<li>
								<img src="img/rick.png" alt="Rick">
								<div class="meta">
									<h5><?= $cast->character_name ?></h5>
									<span><?= $cast->person ?></span>
								</div>
							</li>
						<?php endforeach ?>
					</ul>
					<h4>Detective</h4>
					<p><?= $show->overview ?></p>
				</div>
				<div class="right text-left">
					<ul class="actor" id="actors">
						<li>
							<img src="img/rick.png" alt="Rick">
							<div class="meta">
								<h5>RICK</h5>
								<span>Andrew Lincolm</span>
							</div>
						</li>
						<li>
							<img src="img/rick.png" alt="Rick">
							<div class="meta">
								<h5>RICK</h5>
								<span>Andrew Lincolm</span>
							</div>
						</li>
						<li>
							<img src="img/rick.png" alt="Rick">
							<div class="meta">
								<h5>RICK</h5>
								<span>Andrew Lincolm</span>
							</div>
						</li>
					</ul>
					<h4 id="genre">Horror</h4>
					<p id="overview">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc.</p>
				</div>
			</article>
		<article class="fullpage data">
				<div class="four-column">
					<h2>DATE</h2>

				</div>
				<div class="four-column">
					<h2>NUMBER SEASONS / EPISODE</h2>
					<div class="season">
						<div class="numbers1">
							<span id="number_blue1"><?= count($show->seasons) ?></span> VS <span id="number_yellow1"></span>
						</div>
						<canvas id="season" height="140" width="140">
						</canvas>
						<h3>Season</h3>
					</div>
					<div class="episodes">
						<div class="numbers2">
							<span id="number_blue2"><?= $show->total_episodes ?></span> VS <span id="number_yellow2"></span>
						</div>
						<canvas id="episodes" height="140" width="140">
						</canvas>
						<h3>Episodes</h3>
					</div>
				</div>
				<div class="four-column">
					<h2>NUMBER OF <img src="img/tw_blue.png" alt="" class="inline"></h2>
					<div class="numbertweets">
						<span class="twit1">8,190</span>#<span class="twit2">31,310</span>
					</div>	
				</div>
		</article>
		<article class="fullpage graphics">
				<div class="six-column">
					<h2>Viewer per season</h2>
					<div class="graph">
						<canvas id="graph" height="380" width="500">
						</canvas>
					</div>
				</div>
				<div class="six-column">
					<h2>Media Rating Average</h2>
					<div class="star">
						<canvas id="star" height="400" width="400">
						</canvas>
					</div>
				</div>
		</article>
		</section>
	<footer>
		<h3>Cherrypick | 2015 - Tout droits réservés</h3>
		<div class="tw">
			<img src="img/tw.png" alt="twitter">
		</div>
		<div class="fb">
			<img src="img/fb.png" alt="facebook">
		</div>
	</footer>

	if (isset($compare_show) && (count($show->seasons) < count($compare_show->seasons))){
	foreach ($compare_seasons-> as $_season) {
		array_push($array, $_season);
	}
	echo $array;
}
else {
	foreach ($show->seasons as $_season) {
		array_push($array, $_season);
	}
	echo $array;
}

		<script>
		////////////////// DONUT N°1 /////////////////////
		var season_data = [
		    {
		        value: <?= count($show->seasons) ?>,
		        color:"rgba(246,232,1,1)",
		        label: "Yellow"
		    },
		    {
		        value: 0,
		        color: "rgba(60,107,147,1)",
		        label: "Blue"
		    }
		]
		var season_options = {
			segmentShowStroke : false,
			percentageInnerCutout : 80,
			animationEasing: "easeInOutQuart"
		}

		var season = document.getElementById('season').getContext('2d');
    	new Chart(season).Doughnut(season_data, season_options);
   	//////////////////////////////////////////////////
   	////////////////// DONUT N°2 /////////////////////
   	var episodes_data = [
		    {
		        value: <?= $show->total_episodes ?>,
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
            data: [4, <?= $show->score / 20 ?>, 4.2, 3]
        },
        {
            label: "Yellow",
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
    	</script>