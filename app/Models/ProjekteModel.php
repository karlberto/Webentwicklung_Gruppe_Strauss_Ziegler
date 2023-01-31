<?php namespace App\Models;

use CodeIgniter\Model;

class ProjekteModel extends Model {

    public function getProjekte($projekt_id = NULL) {
        $this->projekte = $this->db->table('projekte');
        $this->projekte->select('*');

        if($projekt_id != NULL){
            $this->projekte->where('projekte.id', $projekt_id);
        }

        $this->projekte->orderBy('id');
        $result = $this->projekte->get();

        if ($projekt_id)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createProjekt() {
        $this->projekte = $this->db->table('projekte');
        $this->projekte->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'mail' => $_SESSION['mail']));
    }

    public function updateProjekt($projekte_id = NULL) {
        $this->projekte = $this->db->table('projekte');
        $this->projekte->where('projekte.id', $projekte_id);
        $this->projekte->update(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'mail' => $_SESSION['mail']));
    }

    public function deleteProjekt($projekte_id = NULL) {
        $this->projekte = $this->db->table('projekte');
        $this->projekte->where('projekte.id', $projekte_id);
        $this->projekte->delete();
    }
}

