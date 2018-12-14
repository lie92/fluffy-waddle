<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author FlorentD
 */
class Lie92Player extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        //je connais pas la bonne stretegie, esperons que le site en go sera plus facile
        $tab = $this->result->getChoicesFor($this->opponentSide);
        $nb_positifs = 0;
        $nb_negatif = 0;
        $length = count($tab);
        for ($i = 0; $i < $length; $i++) {
            if ($tab[$i] == parent::friendChoice()) {
                $nb_positifs++;
            }
            else if ($tab[$i] === parent::foeChoice()) {
                $nb_negatif++;
            }
        }
        if ($nb_negatif != 0 ) {
            $nb_negatif = $nb_negatif / $length;
        }
        if ($nb_positifs != 0) {
            $nb_positifs = $nb_positifs / $length;
        }


        if ($this->result->getNbRound() % 4) {
            return parent::friendChoice();
        }
        else if ($this->result->getNbRound() % 3) {
            return parent::friendChoice();
        }
        // D'après les étoiles, quand c'est impair il faut absolument retourner foe
        else if ($nb_negatif > 0.2) {
            return parent::foeChoice();
        }
        else if ($nb_negatif < 0.4) {
            return parent::foeChoice();
        }
        else {
            return parent::friendChoice();
        }
    }
};
