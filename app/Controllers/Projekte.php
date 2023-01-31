<?php

namespace App\Controllers;

use App\Models\ProjekteModel;

class Projekte extends BaseController
{
    public function __construct() {
        $this->ProjekteModel = new ProjekteModel();
    }

    public function index($flag = NULL)
    {
        if(isset($_POST['btnAuswaehlen'])) {
            // Button zum Auswählen in projekte.php wurde gedrückt
            $this->projekt_auswaehlen();
        }
        else if(isset($_POST['btnLoeschen'])) {
            // Button zum Löschen in projekte.php wurde gedrückt
            $this->editProjekteTable('2');
        }
        if(isset($_POST['btnErstellenSpeichern'])) {
            // Button zum Speichern in projekte.php wurde gedrückt
            $this->editProjekteTable('0');
        }
        else if(isset($_POST['btnBearbeitenSpeichern'])) {
            // Button zum Speichern in projekte_bearbeiten.php wurde gedrückt
            $this->editProjekteTable('1');
        }

        $data['projektedata'] = $this->ProjekteModel->getProjekte();

        if(isset($_POST['btnBearbeiten'])) {
            // Button zum Bearbeiten in projekte.php wurde gedrückt
            $data['chosenProjekt'] = [
                'id' => $_POST['chosen_projekt'],
                'name' => $this->ProjekteModel->getProjekte($_POST['chosen_projekt'])['name'],
                'beschreibung' => $this->ProjekteModel->getProjekte($_POST['chosen_projekt'])['beschreibung']
            ];

            return view('projekte_bearbeiten', $data);
        }

        return view('projekte', $data);
    }

    public function projekt_auswaehlen(){
        // Die ID des ausgewählten Projekts soll in der Session gespeichert werden
        $session_id = $this->ProjekteModel->getProjekte($_POST['chosen_projekt'])['id'];
        session()->set('aktuelles_projekt', $session_id);
        // var_dump($_SESSION['aktuelles_projekt']);
    }

    public function editProjekteTable($flag = NULL) {
        /*  flag = 0: Projekt soll erstellt werden
            flag = 1: Projekt soll bearbeitet werden
            flag = 2: Projekt soll gelöscht werden   */

        if ($flag == 0) {
            $this->ProjekteModel->createProjekt();
        }
        else if($flag == 1){
            $this->ProjekteModel->updateProjekt($_POST['id']);
        }
        else if($flag == 2){
            $this->ProjekteModel->deleteProjekt($_POST['chosen_projekt']);
        }

    }
}
