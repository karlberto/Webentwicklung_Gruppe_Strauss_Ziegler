<?php namespace App\Models;

use CodeIgniter\Model;

class AufgabenModel extends Model {

    public function getAufgaben($aufgaben_name = NULL) {
        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->select('*');

        IF ($aufgaben_name != NULL)
            $this->aufgaben->where('aufgaben.name', $aufgaben_name);

        $this->aufgaben->orderBy('name');
        $result = $this->aufgaben->get();

        if ($aufgaben_name != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function getAufgabenReiter() {
        $this->reiter = $this->db->table('reiter');
        $this->reiter->select('*');

        $result = $this->reiter->get();

        return $result->getResultArray();
    }

    public function getAufgabenMitglieder($zustaendige_mail = NULL) {
        $this->mitglieder = $this->db->table('mitglieder');
        $this->mitglieder->select('*');

        IF ($zustaendige_mail != NULL)
            $this->mitglieder->where('mitglieder.mail', $zustaendige_mail);

        $this->mitglieder->orderBy('name');
        $result = $this->mitglieder->get();

        if ($zustaendige_mail != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createAufgabe() {
        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'erstellungsdatum' => $_POST['erstelldatum'],
            'fälligkeit' => $_POST['fällig'],
            'mail' => $_POST['chosen_zustaendigkeit'],
            'name_r' => $_POST['chosen_reiter']));
    }

    public function updateAufgabe($aufgaben_name = NULL) {
        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->where('aufgaben.name', $aufgaben_name);
        $this->projekte->update(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'erstellungsdatum' => $_POST['erstelldatum'],
            'fälligkeit' => $_POST['fällig'],
            'mail' => $_POST['chosen_zustaendigkeit'],
            'name_r' => $_POST['chosen_reiter']));

    }

    public function deleteAufgabe($aufgaben_name = NULL) {
        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->where('aufgaben.name', $aufgaben_name);
        $this->aufgaben->delete();
    }

}

