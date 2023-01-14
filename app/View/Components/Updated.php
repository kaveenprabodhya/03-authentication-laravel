<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Updated extends Component

{

    /**
     * created date
     * 
     * @var date
     */
    public $date;

    /**
     * updated name
     * 
     * @var name;
     */
    public $name;

    /**
     * updated date
     * 
     * @var edited
     */
    public $edited;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($date = null, $name = null, $edited = null)
    {
        $this->date = $date;
        $this->name = $name;
        $this->edited = $edited;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.updated');
    }
}