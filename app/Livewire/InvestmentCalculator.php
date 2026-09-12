<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class InvestmentCalculator extends Component
{
    public int $shares = 5;

    public int $pricePerShare = 25000;

    public function increment(): void
    {
        $this->shares++;
    }

    public function decrement(): void
    {
        if ($this->shares > 1) {
            $this->shares--;
        }
    }

    public function updated(): void
    {
        $this->dispatch('calculator-updated', shares: $this->shares, total: $this->total());
    }

    #[Computed]
    public function total(): int
    {
        return $this->shares * $this->pricePerShare;
    }

    public function render()
    {
        return view('livewire.investment-calculator');
    }
}
