<?php

namespace App\View\Components;

use App\Models\Dekela;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class masterdekela extends Component
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
        $data = Dekela::where('tahun_id', tahun_aktif())->get();
        dd($data);
        // return view('components.masterdekela', compact('data'));
    }
}
