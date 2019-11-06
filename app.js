
$( document ).ready(function () {
	let heroes = null;
	$("#search").click(function () {
		console.log("CLICK");
		fetch("superheroes.php")
		.then(response => heroes = response.text())
		.then(data => {
			heroes = data;
			console.log(heroes);
			alert(heroes);
		})
		.catch(error => {
			console.log(error);
		});
	});
	
});