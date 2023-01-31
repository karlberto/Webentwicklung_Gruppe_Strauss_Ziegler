<?php

namespace App\Controllers;

use App\Models\MitgliederModel;
/**
 * @property IncomingRequest $request
 */

class Mitglieder extends BaseController
{
    public function __construct() {
        $this->MitgliederModel = new MitgliederModel();
    }

    public function index($flag = NULL, $mitglieder_mail = NULL) {
        if (isset($_POST['btnErstellenSpeichern'])) {
            // Button zum Erstellen in mitglieder.php wurde gedrückt
            $this->editMitgliederTable(0);
        }
        else if (isset($_POST['btnBearbeitenSpeichern'])) {
            // Button zum Erstellen in mitglieder_bearbeiten.php wurde gedrückt
            $this->editMitgliederTable(1);
        }
        else if ($flag != NULL && $mitglieder_mail != NULL) {
            // Mitglied soll gelöscht werden
            $this->editMitgliederTable(2, $mitglieder_mail);
        }

        /* if(isset($_POST['projekt_zugeordnet'])){
            $this->editProjekteTable();
        }*/

        $data = $this->getData();

        return view('mitglieder', $data);
    }

    public function bearbeiten_index($mitglieder_mail = NULL){
        // Felder mit Name, E-Mail und Passwort sollen ausgefüllt werden
        if ($mitglieder_mail != NULL) {
            $data = $this->getData();
            $_POST = $this->MitgliederModel->getMitglieder($mitglieder_mail);
            $data['chosenMitglied'] = [
                'name' => $_POST['name'],
                'mail' => $_POST['mail'],
                'passwort' => NULL
            ];
            return view('mitglieder_bearbeiten', $data);
        }

        return ("Fehler");
    }

    public function getData(){
        $data['mitgliederdata'] = $this->MitgliederModel->getMitglieder();
        $count = 0;
        foreach ($data['mitgliederdata'] as $item){
            if ($this->MitgliederModel->mitgliedInProject($item['mail']) != NULL){
                $data['mitgliederdata'][$count]['inProjekt'] = "true";
            }
            else {
                $data['mitgliederdata'][$count]['inProjekt'] = "false";
            }
            $count++;
        }
        $data['mitgliedInProject'] = $this->MitgliederModel->mitgliedInProject();

        return $data;
    }

    public function editMitgliederTable($flag = NULL, $mitglieder_mail = NULL) {
        /*  flag = 0: Mitglied soll erstellt werden
            flag = 1: Mitglied soll bearbeitet werden
            flag = 2: Mitglied soll gelöscht werden   */

        $post = $this->request->getPost(['name', 'mail', 'password']);

        if($flag == 0 && !$this->MitgliederModel->isMitglied($post['mail'])) {
            $this->MitgliederModel->createMitglied();
        }
        else if ($flag == 1){
            $this->MitgliederModel->updateMitglied($_POST['old_mail']);
        }
        else if ($flag == 2 && $mitglieder_mail != NULL) {
            $this->MitgliederModel->deleteMitglied($mitglieder_mail);
        }
    }

    public function editProjekteTable(){
        $projekt_infos = $this->MitgliederModel->getProjektInfos();
        // var_dump($projekt_infos);
        $this->MitgliederModel->createProjekt($projekt_infos);
    }
}


