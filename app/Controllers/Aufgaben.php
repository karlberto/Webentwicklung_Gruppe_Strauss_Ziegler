<?php

namespace App\Controllers;

use App\Models\AufgabenModel;

class Aufgaben extends BaseController
{
    public function __construct() {
        $this->AufgabenModel = new AufgabenModel();
    }

    public function index($flag = NULL, $aufgaben_name = NULL)
    {
        if(isset($_POST['btnErstellenSpeichern'])){
            // Button zum Erstellen in aufgaben.php wurde gedrückt
            $this->editAufgabenTable('0');
        }
        else if(isset($_POST['btnBearbeitenSpeichern'])){
            // Button zum Erstellen in aufgaben_bearbeiten.php wurde gedrückt
            $this->editAufgabenTable('1', $_POST['old_name']);
        }
        else if($flag == 2){;
            // Die Aufgabe soll gelöscht werden
            $this->editAufgabenTable('2', $aufgaben_name);
        }

        $data['aufgabendata'] = $this->AufgabenModel->getAufgaben();
        $data['reiter_option'] = $this->AufgabenModel->getAufgabenReiter();
        $data['zustaendigkeit_option'] = $this->AufgabenModel->getAufgabenMitglieder();

        return view('aufgaben', $data);
    }

    public function bearbeiten_index($aufgaben_name = NULL){
        // Felder mit den Projekt-Infos des ausgewählten Projekts sollen ausgefüllt werden
        $data['aufgabendata'] = $this->AufgabenModel->getAufgaben();
        $data['reiter_option'] = $this->AufgabenModel->getAufgabenReiter();
        $data['zustaendigkeit_option'] = $this->AufgabenModel->getAufgabenMitglieder();

        $zustaendige_r = $this->AufgabenModel->getAufgaben($aufgaben_name)['mail'];
        $data['chosenAufgabe'] = [
            'name' => $aufgaben_name,
            'beschreibung' => $this->AufgabenModel->getAufgaben($aufgaben_name)['beschreibung'],
            'erstelldatum' => $this->AufgabenModel->getAufgaben($aufgaben_name)['erstellungsdatum'],
            'fällig' => $this->AufgabenModel->getAufgaben($aufgaben_name)['fälligkeit'],
            'chosen_reiter' => $this->AufgabenModel->getAufgaben($aufgaben_name)['name_r'],
            'chosen_zustaendigkeit' => $this->AufgabenModel->getAufgabenMitglieder($zustaendige_r)['name']
        ];

        return view('aufgaben_bearbeiten', $data);
    }

    public function editAufgabenTable($flag = NULL, $aufgaben_name = NULL){
        /*  flag = 0: Aufgabe soll erstellt werden
            flag = 1: Aufgabe soll bearbeitet werden
            flag = 2: Aufgabe soll gelöscht werden   */

        if($flag == 0){
            $this->AufgabenModel->createAufgabe();
        }
        else if($flag == 1){
            $this->AufgabenModel->updateAufgabe($aufgaben_name);
        }
        else if($flag == 2){
            $this->AufgabenModel->deleteAufgabe($aufgaben_name);
        }
    }
}
