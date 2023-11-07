<?php
class Coin
{
    private $totalThrows = 0;
    private $headsCount = 0;

    public function generateRandomValue()
    {
        $this->totalThrows++;
        $result = mt_rand(1, 2); // (pile ou face)
        if ($result === 1) {
            $this->headsCount++;
        }
        return $result;
    }

    public function chooseValue()
    {
        // Pour un dé, la valeur actuelle dépend du nombre de fois que "1" a été obtenu
        if ($this->headsCount === $this->totalThrows) {
            return 1;
        } else {
            return 2;
        }
    }

    public function getCurrentValue()
    {
        return $this->chooseValue();
    }
}

// Exemple d'utilisation de la classe Coin
$coin = new Coin();
$randomValue = $coin->generateRandomValue();
$chosenValue = $coin->chooseValue();
$currentValue = $coin->getCurrentValue();
echo "Pièce de monnaie : Valeur aléatoire : $randomValue, Valeur choisie : $chosenValue, Valeur actuelle : $currentValue\n";
echo "<br>";




