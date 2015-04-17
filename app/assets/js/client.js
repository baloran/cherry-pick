$( "#animation" ).click(function() {
  $( "#go_left, #go_right" ).addClass('opened', function () {
  	$('.container').css("display", 'none');
  });


  // $("#anim_opacity").animate({
  //   opacity: 0,
  // }, 1500, "linear" 
  // );
$(".opacity").fadeTo(1500, 0);
$(".nav").fadeTo(1500,0);
});

// var myplugin;
// $('#target').click(function(){
//      if(!myplugin){
// 	  myplugin = $('#p1').cprogress({
// 	       percent: 10, // starting position
// 	       img1: 'v1.png', // background
// 	       img2: 'v2.png', // foreground
// 	       speed: 200, // speed (timeout)
// 	       PIStep : 0.05, // every step foreground area is bigger about this val
// 	       limit: 20, // end value
// 	       loop : false, //if true, no matter if limit is set, progressbar will be running
// 	       showPercent : false, //show hide percent
// 	       onInit: function(){console.log('onInit');},
// 	       onProgress: function(p){console.log('onProgress',p);}, //p=current percent
// 	       onComplete: function(p){console.log('onComplete',p);}
// 	  });
//      }
// });

