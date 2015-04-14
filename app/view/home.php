<form action="#" id="searchShow">
	
	<input type="text" id="show">

	<input type="submit">

</form>


<script>
	
$('#searchShow').on('submit', function() {
	
	console.log($("#show").val());
	// $.ajax({
	// 	url: '/api/getShow/' + $(this).value(),
	// 	type: 'post',
	// 	data: {},
	// 	success: function (data) {
	// 		data
	// 	}
	// });
});
</script>