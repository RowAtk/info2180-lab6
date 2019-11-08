
$( document ).ready(function () {
	$("#search").click(search_hero);
	
});

let baseURI = "superheroes.php";


function search_hero(){
	console.log("CLICK");
	let input = $('#search-field').val();
	// console.log($('#search-field'))
	console.log(input)
	if( input ){
		get_hero(input)
		.then(hero => show_hero(hero));		
	} else {
		get_all_heroes();
	}
}

function show_hero(hero){
	console.log(hero);
	if ( hero ){
	// place hero in result div
		
	} else {
		// hero not found
	}
}

async function get_hero(name) {
	let hero = null;
	await fetch(`${baseURI}?query=${name}`)
	.then(response => response.json())
	.then(data => hero = data )
	.catch(error => { console.log("Error: ", error)} );

	// await console.log(hero);
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