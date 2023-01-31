<?php

namespace App\Controllers;

use App\Models\IndexModel;

class ProjektPage extends BaseController
{
    public function __construct() {
        $this->IndexModel = new IndexModel();

        $aktuellesProjekt = $this->IndexModel->getAktuellesProjekt();
        session()->set('aktuelles_projekt', $aktuellesProjekt[0]['id']);
    }

    public function index()
    {
        $data['aktuelleReiter'] = $this->IndexModel->getAktuelleReiter();
        $data['aktuelleAufgaben'] = $this->IndexModel->getAktuelleAufgaben();

        return view('index_page', $data);
    }
}