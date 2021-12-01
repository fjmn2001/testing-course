<?php

declare(strict_types=1);

namespace Tests\Gibmyx\ScoreKeeperKata;

use Medine\Gibmyx\ScoreKeeperKata\ScoreKeeper;
use PHPUnit\Framework\TestCase;

final class ScoreKeeperKataTest extends TestCase
{
    /**
     * @test
     */
    public function team_score_A_of_three_points()
    {
        $scoreKeeper = ScoreKeeper::make();

        $scoreKeeper->scoreTeamA3();

        self::assertEquals("003:000", $scoreKeeper->getScore());
    }

    /**
     * @test
     */
    public function team_score_B_of_five_points()
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
    public function team_score_B_of_three_points_and_team_score_A_sex_ponts()
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
    public function team_score_a_of_twelve_points_and_team_score_a_of_thirty_points()
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
