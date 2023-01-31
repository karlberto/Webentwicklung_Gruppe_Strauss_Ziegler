<?php

namespace App\Controllers;

use App\Models\ReiterModel;

class Reiter extends BaseController
{
    public function __construct() {
        $this->ReiterModel = new ReiterModel();
    }

    public function index($flag = NULL, $reiter_name = NULL)
    {
        if(isset($_POST['btnErstellenSpeichern'])){
            // Button zum Speichern in reiter.php wurde gedrückt
            $this->editReiterTable('0', NULL);
        }
        else if(isset($_POST['btnBearbeitenSpeichern'])) {
            // Button zum Speichern in reiter_bearbeiten.php wurde gedrückt
            $this->editReiterTable('1', $_POST['old_name']);
        }
        else if($flag != NULL && $reiter_name != NULL){
            // Reiter soll gelöscht werden
            $this->editReiterTable('2', $reiter_name);
        }

        $data['reiterdata'] = $this->ReiterModel->getReiter();
        return view('reiter', $data);
    }

    public function bearbeiten_index($reiter_name = NULL){
        // Felder mit Name und Beschreibung sollen ausgefüllt werden
        $data['reiterdata'] = $this->ReiterModel->getReiter();
        $data['chosenReiter'] = [
            'name' => $this->ReiterModel->getReiter($reiter_name)['name'],
            'beschreibung' => $this->ReiterModel->getReiter($reiter_name)['beschreibung']
        ];
        return view('reiter_bearbeiten', $data);
    }

    public function editReiterTable($flag = NULL, $reiter_name = NULL){
        /*  flag = 0: Reiter soll erstellt werden
            flag = 1: Reiter soll bearbeitet werden
            flag = 2: Reiter soll gelöscht werden   */

        if($flag == 0){
            $this->ReiterModel->createReiter();
        }
        else if($flag == 1){
            $this->ReiterModel->updateReiter($reiter_name);
        }
        else if($flag == 2){
            $this->ReiterModel->deleteReiter($reiter_name);
        }
    }
}
