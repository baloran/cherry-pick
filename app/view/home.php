<script src="<?= base_url() ?>app/assets/js/mustache.min.js"></script>


<script id="template" type="x-tmpl-mustache">
	Hello {{ name }}!
</script>

<script>
	function loadUser() {
		var template = $('#template').html();
		Mustache.parse(template);   // optional, speeds up future uses
		var rendered = Mustache.render(template, {name: "Luke"});
		$('#target').html(rendered);
	}

	loadUser();
</script>