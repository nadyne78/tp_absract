
<?php
require_once "Dice.php";
require_once "Coin.php";
require_once "Deck.php";
class GameMaster
{
    private $diceInstances = [];
    private $deckInstances = [];
    private $coinInstances = [];

    public function __construct($diceInstances, $deckInstances, $coinInstances)
    {
        $this->diceInstances = $diceInstances;
        $this->deckInstances = $deckInstances;
        $this->coinInstances = $coinInstances;
    }

    public function pleaseGiveMeACrit($percentage)
    {
        $randomGenerator = $this->getRandomGenerator();
        $result = $randomGenerator->generateRandomValue();

        $maxValue = $randomGenerator->generateRandomValue(); //  calculer le pourcentage

        return ($result / $maxValue * 100) < $percentage;
    }

    private function getRandomGenerator()
    {
        $randomIndex = mt_rand(0, count($this->diceInstances) + count($this->deckInstances) + count($this->coinInstances) - 1);

        if ($randomIndex < count($this->diceInstances)) {
            return $this->diceInstances[$randomIndex];
        } elseif ($randomIndex < count($this->diceInstances) + count($this->deckInstances)) {
            $deckIndex = $randomIndex - count($this->diceInstances);
            return $this->deckInstances[$deckIndex];
        } else {
            $coinIndex = $randomIndex - count($this->diceInstances) - count($this->deckInstances);
            return $this->coinInstances[$coinIndex];
        }
    }
}

// Exemple d'utilisation de la classe GameMaster
$dice1 = new Dice(6);
$dice2 = new Dice(12);
echo "<br>";
$deck1 = new Deck(3, 18);
$deck2 = new Deck(4, 13);
echo "<br>";
$coin1 = new Coin();
$coin2 = new Coin();
echo "<br>";

$gameMaster = new GameMaster([$dice1, $dice2], [$deck1, $deck2], [$coin1, $coin2]);

$percentage = 50; // Pourcentage du coup critique
$result = $gameMaster->pleaseGiveMeACrit($percentage);

if ($result) {
    echo "Coup critique réussi !\n";
} else {
    echo "Coup critique raté.\n";
}
