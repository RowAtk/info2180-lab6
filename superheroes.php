<?php

$superheroes = [
  [
      "id" => 1,
      "name" => "Steve Rogers",
      "alias" => "Captain America",
      "biography" => "Recipient of the Super-Soldier serum, World War II hero Steve Rogers fights for American ideals as one of the world’s mightiest heroes and the leader of the Avengers.",
  ],
  [
      "id" => 2,
      "name" => "Tony Stark",
      "alias" => "Ironman",
      "biography" => "Genius. Billionaire. Playboy. Philanthropist. Tony Stark's confidence is only matched by his high-flying abilities as the hero called Iron Man.",
  ],
  [
      "id" => 3,
      "name" => "Peter Parker",
      "alias" => "Spiderman",
      "biography" => "Bitten by a radioactive spider, Peter Parker’s arachnid abilities give him amazing powers he uses to help others, while his personal life continues to offer plenty of obstacles.",
  ],
  [
      "id" => 4,
      "name" => "Carol Danvers",
      "alias" => "Captain Marvel",
      "biography" => "Carol Danvers becomes one of the universe's most powerful heroes when Earth is caught in the middle of a galactic war between two alien races.",
  ],
  [
      "id" => 5,
      "name" => "Natasha Romanov",
      "alias" => "Black Widow",
      "biography" => "Despite super spy Natasha Romanoff’s checkered past, she’s become one of S.H.I.E.L.D.’s most deadly assassins and a frequent member of the Avengers.",
  ],
  [
      "id" => 6,
      "name" => "Bruce Banner",
      "alias" => "Hulk",
      "biography" => "Dr. Bruce Banner lives a life caught between the soft-spoken scientist he’s always been and the uncontrollable green monster powered by his rage.",
  ],
  [
      "id" => 7,
      "name" => "Clint Barton",
      "alias" => "Hawkeye",
      "biography" => "A master marksman and longtime friend of Black Widow, Clint Barton serves as the Avengers’ amazing archer.",
  ],
  [
      "id" => 8,
      "name" => "T'challa",
      "alias" => "Black Panther",
      "biography" => "T’Challa is the king of the secretive and highly advanced African nation of Wakanda - as well as the powerful warrior known as the Black Panther.",
  ],
  [
      "id" => 9,
      "name" => "Thor Odinson",
      "alias" => "Thor",
      "biography" => "The son of Odin uses his mighty abilities as the God of Thunder to protect his home Asgard and planet Earth alike.",
  ],
  [
      "id" => 10,
      "name" => "Wanda Maximoff",
      "alias" => "Scarlett Witch",
      "biography" => "Notably powerful, Wanda Maximoff has fought both against and with the Avengers, attempting to hone her abilities and do what she believes is right to help the world.",
  ], 
];

// tests if key matches hero - based on fixed criteria (name or alias)
function is_match($key, $hero){
  return $key == $hero["name"] || $key == $hero["alias"];
}

// find a hero from array using a given key - must be exact match
function find_hero($key, $superheroes) {
  if($key != ""){
    foreach ($superheroes as $hero) {
      if (is_match($key, $hero)) {
        return $hero;
      }
    }
    return [];
  } else {
    return $superheroes;
  }
}

// convert hero to desired html format
function heroToHTML($hero){
  file_put_contents("log", $hero);
  if($hero === []){
    return "<p class=\"error\">SUPERHERO NOT FOUND<p>";
  } else {
    $alias = strtoupper($hero["alias"]);
    $name = strtoupper($hero["name"]);
    $bio = $hero["biography"];
    return <<< EOT
    <h3>{$alias}</h3>
    <h4>A.K.A. {$name}</h4>
    <p>{$bio}</p>
EOT;
  }
}

// get all heroes in html format
function allHeroes($superheroes){
  $list = "";
  foreach ($superheroes as $superhero){
    $list.="<li>{$superhero['alias']}</li>\n";
  }
  return <<<EOT
  <ul>
    {$list}
  </ul>
EOT;

}

// handle request from client
function handleRequest($superheroes){
  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $key = $_GET["query"];
    file_put_contents("log", $key); // debugging
    if($key) {
      $hero = find_hero($key, $superheroes);
      echo heroToHTML($hero);
    } else {
      echo allHeroes($superheroes);
    }
  }
}


function clog( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}


// actual execution and handling of request
handleRequest($superheroes);
?>

