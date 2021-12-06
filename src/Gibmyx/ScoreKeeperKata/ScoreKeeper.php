<?php

declare(strict_types=1);

namespace Medine\Gibmyx\ScoreKeeperKata;

final class ScoreKeeper
{
    private $scoreTeamA = 0;
    private $scoreTeamB = 0;

    public static function make(): self
    {
        return new self();
    }

    public function getScore(): string
    {
        $scoreTeamA = (string) $this->scoreTeamA;
        $scoreTeamB = (string) $this->scoreTeamB;

        $scoreTeamA = str_pad($scoreTeamA, 3, "0", STR_PAD_LEFT);
        $scoreTeamB = str_pad($scoreTeamB, 3, "0", STR_PAD_LEFT);

        return "{$scoreTeamA}:{$scoreTeamB}";
    }

    public function scoreTeamA1(): void
    {
        $this->scoreTeamA += 1;
    }

    public function scoreTeamA2(): void
    {
        $this->scoreTeamA += 2;
    }

    public function scoreTeamA3(): void
    {
        $this->scoreTeamA += 3;
    }

    public function scoreTeamB1(): void
    {
        $this->scoreTeamB += 1;
    }

    public function scoreTeamB2(): void
    {
        $this->scoreTeamB += 2;
    }

    public function scoreTeamB3(): void
    {
        $this->scoreTeamB += 3;
    }
}
