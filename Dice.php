<?php



class Dice
{
    private $faces;

    public function __construct($faces)
    {
        $this->faces = $faces;
    }

    public function generateRandomValue()
    {
        return mt_rand(1, $this->faces); // Génère un nombre aléatoire entre 1 et le nombre de faces du dé
    }

    public function chooseValue()
    {
        return $this->generateRandomValue();
    }

    public function getCurrentValue()
    {
        // Pour un dé, la valeur actuelle est la même que la dernière valeur générée
        return $this->chooseValue();
    }
}

// Exemple d'utilisation de la classe Dice
$dice = new Dice(8); // Un dé à 8 faces
$randomValue = $dice->generateRandomValue();
$chosenValue = $dice->chooseValue();
$currentValue = $dice->getCurrentValue();
echo "Dé : Valeur aléatoire : $randomValue, Valeur choisie : $chosenValue, Valeur actuelle : $currentValue\n";
echo "<br>";

