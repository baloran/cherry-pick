;(function($){
    $.fn.extend({
        donetyping: function(callback,timeout){
            timeout = timeout || 1e3; // 1 second default timeout
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                // Chrome Fix (Use keyup over keypress to detect backspace)
                // thank you @palerdot
                $el.is(':input') && $el.on('keyup keypress',function(e){
                    // This catches the backspace button in chrome, but also prevents
                    // the event from triggering too premptively. Without this line,
                    // using tab/shift+tab will make the focused element fire the callback.
                    if (e.type=='keyup' && e.keyCode!=8) return;
                    
                    // Check if timeout has been set. If it has, "reset" the clock and
                    // start over again.
                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function(){
                        // if we made it here, our timeout has elapsed. Fire the
                        // callback
                        doneTyping(el);
                    }, timeout);
                }).on('blur',function(){
                    // If we can, fire the event since we're leaving the field
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);

var cherry = function () {

	this.searchBox = $('#searchShow');
	this.showSearch = $('#show');
	this.selectShow = $('.select-show');
	this.selectShowUl = this.selectShow.find('ul');
	this.oldValue = null;
	this.showOneSelected = false;
	this.showData = null;
	this.laoding = null;

	this.init = function () {

		console.log("Cherry-pick v0.1 started");

		this.captureEvent();
	}

	this.captureEvent = function () {

		var that = this;

		that.showSearch.donetyping(function () {

			that.search($(this).val());

		});


		// that.selectShow.on('hover', function () {

		// 	var oldValue = that.show.val();

		// 	var newValue = this.text();

		// 	console.log("sakyt")

		// 	console.log(oldValue);
		// 	console.log(newValue);

		// }, 'li');

		that.selectShow.on({

			mouseenter: function (e) {

				that.oldvalue = that.showSearch.val();
				var newValue = $(this).text();

				that.showSearch.val(newValue);

			},

			mouseleave: function (e) {

				if (!that.showOneSelected) {
					that.showSearch.val(that.oldvalue);
				};
			},

			click: function (e) {

				that.selectShow.hide();
				that.showOneSelected = true;
				that.showSearch.val($(this).text());
				that.loading = 'loading';
				that.selectFirstShow(that.showData.data[$(this).data('id')]);
			}


		}, '.showname');

	};

	this.selectFirstShow = function (data) {

		var that = this;

		$.ajax({
				url: 'api/getInfo/',
				type: 'post',
				data: {
					data: data
				},
				success: function (data) {
					console.log(data);
					that.loading = 'finish';
				},
				error: function (err) {
					console.log(err);
				}
			});
	};

	this.search = function (name) {

		var that = this;

		var slug = name.replace(/\s/g,"-");

		$.ajax({
				url: 'api/search/' + slug,
				type: 'get',
				dataType: 'json',
				success: function (data) {

					that.showData = data;
					
					that.selectShowUl.find('li').remove();

					if (data.code == 200) {
						
						for(var i = 0; i < 3; i++) {

							that.selectShowUl.append('<li class="showname" data-id="' + i + '"><img src="' + data.data[i].show.images.poster.medium + '" alt="" width="72px"/><h2>' + data.data[i].show.title + '</h2></li>');
						}

					} else {
						console.log("no show");
					}

				},
				error: function (err) {
					console.log(err);
				}
			});
	}
};

$(function () {
	
	var app = new cherry();

	app.init();
});
