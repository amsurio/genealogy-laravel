<?php

namespace App\Filament\Widgets;
// namespace App\Http\Livewire;

use App\Models\Person;
use Filament\Widgets\Widget;
use Livewire\Livewire;

class PedigreeChartWidget extends Widget
{
    protected static string $view = 'livewire.pedigree-chart';

    public $persons;

    public function mount()
    {
        $this->persons = Person::all();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view(static::$view, ['persons' => $this->persons]);
    }
}
