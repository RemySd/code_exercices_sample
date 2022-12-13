<?php 

/* 
 * Créer une class Animal qui prend 2 proprietés (nom et age)
 * Créer une class Chien qui va hérité de la class animal. La class Chien aura une fonction qui s'appelera "Parler()" et affichera "Wouaf"
 * Créer une class Chat qui va hérité de la class animal. La class Chat aura une fonction qui s'appelera "Parler()" et affichera "Miaou"
 */

 class Animal {
    private string $name;

    function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
 }

 class Chien extends Animal
 {
    private string $vaccin;

    function __construct(string $name, string $vaccin)
    {
        parent::__construct($name);
        $this->vaccin = $vaccin;
    }

    public function Speak()
    {
        return 'Waouf';
    }
 }

 class Chat 
 {
    public function Speak()
    {
        return 'Miaou';
    }
 }

 $chien = new Chien('Toto', 'test');
 echo $chien->getName();
 