<?php
class Deck
{
    private $numberOfColors;
    private $numberOfValues;
    private $currentColor;
    private $currentValue;

    public function __construct($numberOfColors, $numberOfValues)
    {
        $this->numberOfColors = $numberOfColors;
        $this->numberOfValues = $numberOfValues;
    }

    public function generateRandomValue()
    {
        $this->currentColor = mt_rand(1, $this->numberOfColors);
        $this->currentValue = mt_rand(1, $this->numberOfValues);
        return $this->currentValue + ($this->currentColor - 1) * $this->numberOfValues;
    }

    public function chooseValue()
    {
        //  choix de valeur de carte
        return $this->generateRandomValue();
    }

    public function getCurrentValue()
    {
        // Renvoie la couleur et la valeur actuelle
        return "Couleur : {$this->currentColor}, Valeur : {$this->currentValue}";
    }
}

// Exemple d'utilisation de la classe Deck
$deck = new Deck(3, 18); // Un deck avec 3 couleurs et 18 valeurs
$randomValue = $deck->generateRandomValue();
$chosenValue = $deck->chooseValue();
$currentValue = $deck->getCurrentValue();
echo "Deck de cartes : Valeur aléatoire : $randomValue, Valeur choisie : $chosenValue, Valeur actuelle : $currentValue\n";
echo "<br>";
$deck = new Deck(4, 13); // Un deck avec 4 couleurs et 13 valeurs
$randomValue = $deck->generateRandomValue();
$chosenValue = $deck->chooseValue();
$currentValue = $deck->getCurrentValue();
echo "Deck de cartes : Valeur aléatoire : $randomValue, Valeur choisie : $chosenValue, Valeur actuelle : $currentValue\n";
echo "<br>";


