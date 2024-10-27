<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MovieCard extends Component
{
    public $movie;


    /**
     * Crie uma nova instância de componente.
     *
     * @return void
     */
    public function __construct($movie)
    {
        $this->movie = $movie;

    }

    /**
     * Obtenha a visualização/conteúdo que representa o componente.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.movieCard');
    }
}
