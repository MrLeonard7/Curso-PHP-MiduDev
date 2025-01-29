<?php

declare(strict_types=1);

class SuperHeroe {

    public function __construct(        
    readonly public string $name,
    public array $powers,
    public string $planet
    ){

    
    }

    public function show_all(){
        return get_object_vars($this);
    }


    public function attack(){
        return "Atacando con ".$this->powers;
    }
    
    public function description(){
        $powers = implode(", ", $this->powers);
        return "$this->name tiene el poder de $powers y es de $this->planet";
    }

    public static function random (){
        $names = ["Superman", "Batman", "Spiderman"];
        $powers = [
            ["Superfuerza", "super calzones rojos", "rayos laser"],
            ["Dinero", "tecnología", "inteligencia"],
            ["Telarañas", "sentido arácnido", "trepar paredes"], 
            
        ];
        $planets = ["Krypton", "Tierra", "Asgard", "Gotham", "Metropolis", "Atlantis"];

        $names = $names[array_rand($names)];
        $powers = $powers[array_rand($powers)];
        $planets = $planets[array_rand($planets)];

        return new self($names, $powers, $planets);
    }
}

//Instancia
$hero = new SuperHeroe(
     "Superman",
     ["Superfuerza", "super calzones rojos", "rayos laser"],
     "Krypton"
); // metodo publico

//Estatico
$hero = SuperHeroe::random(); // metodo estatico
echo $hero->description();

?>