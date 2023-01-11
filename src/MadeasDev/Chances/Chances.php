<?php

/**
 * @author Querrdenker ( also known as MadeAsDev )
 * @date 11.01.2023
 * @project Chances
 */
namespace Madeasdev\Chances;

require("vendor/autoload.php");

class Chances
{

    /**
     * @param String $chance e.g. "Fourty-Sixty"
     * @param \Closure $onSuccess a closure without params
     * @param ?\Closure $onFailure a closure without params
     */
    public static function chance(string $chance, \Closure $onSuccess, ?\Closure $onFailure) :bool{
        $chances = ["ten" => 10,
            "twenty" => 20,
            "thirdty" => 30,
            "fourty" => 40,
            "fifty" => 50,
            "sixty" => 60,
            "seventy" => 70,
            "eighty" => 80,
            "ninety" => 90,
            "hundred" => 100,
            "zero" => 0
            ];
        $chance = explode("-", strtolower($chance));
        if (count($chance) != 2) return false;
        if (!isset($chances[$chance[0]]) or !isset($chances[$chance[1]])) return false;
        $first = $chances[$chance[0]];
        $sec = $chances[$chance[1]];
        if ($first+$sec != 100) return false;
        if ($first == 100) {
            $onSuccess();
            return true;
        }
        $cube = random_int(0, 100);
        var_dump($cube);
        if ($cube <= $first) $onSuccess();
        if ($cube > $first && !is_null($onFailure)) $onFailure();
        return true;
    }

}