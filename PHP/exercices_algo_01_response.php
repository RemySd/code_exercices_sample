<?php

/* 
Exercice 1

Transformer une chaine de caractere ecrite en minuscule en majuscule
"hello" devient "HELLO"
*/

$word = 'hello';

echo strtoupper($word);
echo '<br>';

/* 
Exercice 2

Créer une liste (array) puis ajouter le mot "test" dans la liste
*/

$myArray = [];
$myArray[] = "test";

var_dump($myArray);
echo '<br>';


/* 
Exercice 3

Créer une fonction qui prend 2 paramètre de type int et retourne le résultat des 2 chiffres fournie
En soit refaire une fonction qui reproduit le fonctionnement d'une addition.
*/

function addition($number1, $number2) 
{
    return $number1 = $number2;
}

echo addition(4, 5);

echo '<br>';

/* 
Exercice 4

Retourner la taille de la liste
*/

$legumes = ['haricot', 'courgette', 'carotte'];

echo count($legumes);
echo '<br>';

/* 
Exercice 5

Afficher l'ensemble des mots suivant à l'aide d'une boucle (un var_dump sur chaque mot suffira)
*/

$objets = ['marteau', 'pelle', 'souris', 'ecran', 'verre', 'cahiers'];

foreach ($objets as $value) {
    echo $value;
    echo '<br>';
}

echo '<br>';

/* 
Exercice 6

Générer un nombre aléatoire compris entre 1 (inclus) et 10 (inclus)
*/

/* 
Exercice 7

Trouver le chifre le plus élevé dans le tableau suivant
*/

$numberList = [45, 99, 2, 567, 999, 10, 30];

echo min($numberList);

echo '<br>';

/* 
Exercice 8

Créer une fonction qui prend deux argument et qui vient les concaténer en un seul mot sur le retour de la fonction
*/

$mot1 = 'bonjour';
$mot2 = 'au revoir';

function concat($string1, $string2)
{
    return $string1 + $string2;
}

echo concat($mot1, $mot2);

echo '<br>';

/* 
Exercice 8

Trouver une fonction qui permet de savoir si les valeurs suivantes sont des chiffres
*/

$value1 = 3;
$value2 = 3.4;
$value3 = '3';
$value4 = 'abc';

var_dump(gettype($value1));
var_dump(gettype($value2));
var_dump(gettype($value3));
var_dump(gettype($value4));

echo '<br>';

/* 
Exercice 9

Créer une fonction qui permet de savoir si un chiffre est pair ou non
*/

function isEven($number)
{
    return $number % 2;
}

echo isEven(2);

echo '<br>';

/* 
Exercice 10

Voici un nombre binaire => 10010
Créer une fonction qui compte le nombre de 1 dedans => résultat 2
*/

function binaryCount($binaryNumber)
{
    return substr_count(strval($binaryNumber), '1');
}

echo binaryCount(100101);
echo '<br>';
