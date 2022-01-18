<?php

declare(strict_types=1);

namespace Tests\Gibmyx\ContarOvejas;

use PHPUnit\Framework\TestCase;

final class ContarOvejasTest extends TestCase
{

    /**
     * @test
     */
    public function contarOvejasTest()
    {
        $ovejas = [];
        $ovejasObtenidas = [
            ["name" => 'Noa', "color" => 'azul'],
            ["name" => 'Euge', "color" => 'rojo'],
            ["name" => 'Navidad', "color" => 'rojo'],
            ["name" => 'Ki Na Ma', "color" => 'rojo'],
            ["name" => 'AAAAAaaaaa', "color" => 'rojo'],
            ["name" => 'Nnnnnnnn', "color" => 'rojo']
        ];
        $ovejasDeseadas = [
            ["name" => 'Navidad', "color" => 'rojo'],
            ["name" => 'Ki Na Ma', "color" => 'rojo']
        ];

        foreach ($ovejasObtenidas as $oveja) {
            if ($oveja['color'] == "rojo"
                &&
                (
                    strpos(strtolower($oveja['name']), "a") !== false
                    &&
                    strpos(strtolower($oveja['name']), "n") !== false
                )
            ) {
                $ovejas[] = $oveja;
            }
        }

        self::assertSame($ovejasDeseadas, $ovejas);
        self::assertEquals(count($ovejasDeseadas), count($ovejas));
    }
}
