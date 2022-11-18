<?php

namespace App\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        View::composer('components.navbar', function () {
            $navLinks = array(
                'beranda' => 'Beranda',
                'tentang' => 'Tentang',
                'infotbc' => 'Info TBC',
                'kasustbc' => 'Kasus TBC',
                'artikel' => 'Artikel',
                'kegiatan' => 'Kegiatan',
            );
            view()->share('navLinks', $navLinks);
        });
        return view('components.navbar');
    }
}
