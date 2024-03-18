<?php

namespace App\View\Components;

use App\Models\Kelana;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class masterkelana extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = Kelana::where('tahun_id', tahun_aktif())->get();
        dd($data);
        // return view('components.masterkelana', compact('data'));
    }
}
