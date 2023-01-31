<?php namespace App\Models;

use CodeIgniter\Model;

class ReiterModel extends Model {

    public function getReiter($reiter_name = NULL) {
        $this->reiter = $this->db->table('reiter');
        $this->reiter->select('*');

        IF ($reiter_name != NULL)
            $this->reiter->where('reiter.name', $reiter_name);

        $this->reiter->orderBy('name');
        $result = $this->reiter->get();

        if ($reiter_name != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createReiter() {
        $this->reiter = $this->db->table('reiter');
        $this->reiter->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']));
    }

    public function updateReiter($reiter_name = NULL) {
        $this->reiter = $this->db->table('reiter');
        $this->reiter->where('reiter.name', $reiter_name);
        $this->reiter->update(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']));
    }

    public function deleteReiter($reiter_name = NULL) {
        $this->reiter = $this->db->table('reiter');
        $this->reiter->where('reiter.name', $reiter_name);
        $this->reiter->delete();
    }
}
