<?php namespace App\Models;

use CodeIgniter\Model;

class MitgliederModel extends Model {

    public function getMitglieder($mitglieder_mail = NULL) {
        $this->mitglieder = $this->db->table('mitglieder');
        $this->mitglieder->select('*');

        IF ($mitglieder_mail != NULL)
            $this->mitglieder->where('mitglieder.mail', $mitglieder_mail);

        $this->mitglieder->orderBy('name');
        $result = $this->mitglieder->get();

        if ($mitglieder_mail != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function isMitglied($mitglieder_mail = NULL){
        $this->mitglieder = $this->db->table('mitglieder');
        $this->mitglieder->select('*');

        if($mitglieder_mail != NULL){
            $this->mitglieder->where('mitglieder.mail', $mitglieder_mail);

            $result = $this->mitglieder->get();

            if(! empty($result->getResult())){
                return true;
            }
        }
        return false;
    }

    public function mitgliedInProject($mitglieder_mail = NULL){
        $this->projekte = $this->db->table('projekte');
        $this->projekte->select('projekte.mail');

        if($mitglieder_mail != NULL){

            $this->projekte->where('projekte.id', $_SESSION['aktuelles_projekt']);
            $this->projekte->where('projekte.mail', $mitglieder_mail);
        }

        $result = $this->projekte->get();

        return $result->getRowArray();
    }

    public function getProjektInfos(){
        $this->projekte = $this->db->table('projekte');
        $this->projekte->select('*');

        $this->projekte->where('projekte.id', $_SESSION['aktuelles_projekt']);

        $this->projekte->orderBy('id');
        $result = $this->projekte->get();

        return $result->getRowArray();
    }

    public function createMitglied() {
        $this->mitglieder = $this->db->table('mitglieder');
        $this->mitglieder->insert(array('name' => $_POST['name'],
            'mail' => $_POST['mail'],
            'passwort' => password_hash($_POST['password'], PASSWORD_DEFAULT)));
    }

    public function updateMitglied($mitglieder_mail = NULL) {
        $this->mitglieder = $this->db->table('mitglieder');
        $this->mitglieder->where('mitglieder.mail', $mitglieder_mail);
        // Passwort nur bedingt anzeigen und updaten
        if (($_SESSION['mail'] != $mitglieder_mail)
            || (isset($_POST['passwort']) && $_POST['passwort'] == NULL)){
            $this->mitglieder->update(array('name' => $_POST['name'],
                'mail' => $_POST['mail']));
        } else {
            $this->mitglieder->update(array('name' => $_POST['name'],
                'mail' => $_POST['mail'],
                'passwort' => password_hash($_POST['passwort'], PASSWORD_DEFAULT)));
        }
    }

    public function deleteMitglied($mitglieder_mail) {
        $this->mitglieder = $this->db->table('mitglieder');
        $this->mitglieder->where('mitglieder.mail', $mitglieder_mail);
        $this->mitglieder->delete();
    }

    public function createProjekt($projekt_infos = NULL){
        $this->projekte = $this->db->table('projekte');
        $this->projekte->insert(array('name' => $projekt_infos['name'],
            'beschreibung' => $projekt_infos['beschreibung'],
            'mail' => $_POST['mail']));
    }
}
