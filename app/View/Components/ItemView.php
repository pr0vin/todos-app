<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemView extends Component
{

    public $head;
    public $category;

    /**
     * Create a new component instance.
     */
    public function __construct($head = null, $category = null)
    {
        //
        $this->category = $category ?? " Category";
        $this->head = $head ?? " head";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item-view', [
            'head' => $this->head,
            'category' => $this->category,
        ]);
    }
}
