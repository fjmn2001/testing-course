<?php

namespace Tests\Gibmyx\ScoreKeeperKata;

use Medine\Gibmyx\ScoreKeeperKata\ScoreKeeper;
use PHPUnit\Framework\TestCase;

class ScoreKeeperKataTest extends TestCase
{
    /**
     * @test
     */
    public function teamScoreAOfThreePoints()
    {
        $scoreKeeper = ScoreKeeper::make();

        $scoreKeeper->scoreTeamA3();

        self::assertEquals("003:000", $scoreKeeper->getScore());
    }

    /**
     * @test
     */
    public function teamScoreBOfFivePoints()
    {
        $scoreKeeper = ScoreKeeper::make();

        $scoreKeeper->scoreTeamB1();
        $scoreKeeper->scoreTeamB1();
        $scoreKeeper->scoreTeamB3();

        self::assertEquals("000:005", $scoreKeeper->getScore());
    }

    /**
     * @test
     */
    public function teamScoreBOfThreePointsAndTeamScoreASexPonts()
    {
        $scoreKeeper = ScoreKeeper::make();

        $scoreKeeper->scoreTeamA2();
        $scoreKeeper->scoreTeamA2();
        $scoreKeeper->scoreTeamA2();

        $scoreKeeper->scoreTeamB3();

        self::assertEquals("006:003", $scoreKeeper->getScore());
    }

    /**
     * @test
     */
    public function teamScoreAOfTwelvePointsAndTeamScoreAOfThirtyPoints()
    {
        $scoreKeeper = ScoreKeeper::make();

        $scoreKeeper->scoreTeamA2();
        $scoreKeeper->scoreTeamB3();
        $scoreKeeper->scoreTeamB3();

        $scoreKeeper->scoreTeamA2();
        $scoreKeeper->scoreTeamB3();
        $scoreKeeper->scoreTeamB3();

        $scoreKeeper->scoreTeamA1();
        $scoreKeeper->scoreTeamB3();
        $scoreKeeper->scoreTeamB3();

        $scoreKeeper->scoreTeamA3();
        $scoreKeeper->scoreTeamB3();
        $scoreKeeper->scoreTeamB3();

        $scoreKeeper->scoreTeamA2();
        $scoreKeeper->scoreTeamB3();
        $scoreKeeper->scoreTeamB3();

        $scoreKeeper->scoreTeamA2();

        self::assertEquals("012:030", $scoreKeeper->getScore());
    }
}
