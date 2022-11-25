<?php

namespace App\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class AdminNav extends Component
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
        $navLinks = array(
            'admin.dashboard' => ['Dashboard', 'fas fa-tachometer-alt'],
            'admin.sekawans' => ['Tentang', 'fas fa-users'],
            'admin.infotbc' => ['Informasi TBC', 'fas fa-circle-info'],
            'admin.patients' => ['Data Pasien TBC', 'fas fa-database'],
            'admin.fasyankes' => ['Fasyankes', 'fas fa-notes-medical'],
            'admin.articles' => ['Artikel', 'fas fa-newspaper'],
            'admin.kegiatan' => ['Kegiatan', 'fas fa-square-person-confined']
        );

        return view('components.admin-nav', compact('navLinks'));
    }
}
