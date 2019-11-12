
$( document ).ready(function () {
	$("#search-button").click(search_hero);
});

let baseURI = "superheroes.php";


function search_hero(){
	let input = $('#search-field').val().trim();
	get_hero(input)
	.then(hero => show_hero(hero));		
	
}

function show_hero(hero){
	$("#result").html(hero);
}

async function get_hero(name) {
	let hero = null;
	await fetch(`${baseURI}?query=${name}`)
	.then(response => response.text())
	.then(data => hero = data )
	.catch(error => { console.log("Error: ", error)} );
	return hero;
}

function get_all_heroes() {
	let heroes = null;
	fetch(this.baseURI)
	.then(response => heroes = response.text())
	.then(data => {
		heroes = data;
		console.log(heroes);
		alert(heroes);
	})
	.catch(error => {
		console.log(error);
	});
}