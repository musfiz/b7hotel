<?php

use App\Livewire\InvestmentCalculator;
use Livewire\Livewire;

beforeEach(function () {
    $this->withoutVite();
});

test('home page renders with the calculator component', function () {
    $this->get(route('site.home'))
        ->assertOk()
        ->assertSee('Calculate Your Investment', false)
        ->assertSeeLivewire(InvestmentCalculator::class);
});

test('investment page renders with the calculator component', function () {
    $this->get(route('site.investment'))
        ->assertOk()
        ->assertSee('Choose Your', false)
        ->assertSeeLivewire(InvestmentCalculator::class);
});

test('calculator computes the total from shares', function () {
    Livewire::test(InvestmentCalculator::class)
        ->assertSet('shares', 5)
        ->assertSee('125,000')
        ->call('increment')
        ->assertSet('shares', 6)
        ->assertSee('150,000')
        ->call('decrement')
        ->call('decrement')
        ->assertSet('shares', 4)
        ->assertSee('100,000');
});

test('calculator never drops below one share', function () {
    Livewire::test(InvestmentCalculator::class)
        ->set('shares', 1)
        ->call('decrement')
        ->assertSet('shares', 1);
});
