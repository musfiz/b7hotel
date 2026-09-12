<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * Investment planner: amount + period sliders with ILLUSTRATIVE projections.
 *
 * IMPORTANT: projected figures use a placeholder assumed rate and are labelled
 * "Projected estimate" in the view. They are not guaranteed returns — actual
 * terms only per official B7HOTEL project documents and executed agreements.
 */
class InvestmentPlanner extends Component
{
    /** Placeholder assumed annual rate for illustrations only — not a promise. */
    public const ILLUSTRATIVE_RATE = 0.12;

    public int $amount = 2500000;

    public int $years = 5;

    public int $minAmount = 500000;

    public int $maxAmount = 10000000;

    public int $stepAmount = 100000;

    public int $minYears = 1;

    public int $maxYears = 10;

    public function updated(): void
    {
        $this->amount = max($this->minAmount, min($this->maxAmount, (int) $this->amount));
        $this->years = max($this->minYears, min($this->maxYears, (int) $this->years));
    }

    #[Computed]
    public function projectedAnnual(): int
    {
        return (int) round($this->amount * self::ILLUSTRATIVE_RATE);
    }

    #[Computed]
    public function totalProjectedReturns(): int
    {
        return $this->projectedAnnual * $this->years;
    }

    #[Computed]
    public function totalProjectedValue(): int
    {
        return $this->amount + $this->totalProjectedReturns;
    }

    /** Indian digit grouping: 2500000 → 25,00,000. */
    public static function inr(int $n): string
    {
        $s = (string) abs($n);
        if (strlen($s) <= 3) {
            return ($n < 0 ? '-' : '').$s;
        }
        $last3 = substr($s, -3);
        $rest = substr($s, 0, -3);
        $rest = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $rest);
        return ($n < 0 ? '-' : '').$rest.','.$last3;
    }

    public function render()
    {
        return view('livewire.investment-planner');
    }
}
