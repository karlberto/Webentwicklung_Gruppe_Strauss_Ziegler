<?php namespace App\Models;

use CodeIgniter\Model;

class IndexModel extends Model {

    public function getAktuelleReiter($reiter_name = NULL) {
        $this->reiter = $this->db->table('reiter');
        $this->reiter->select('reiter.name');

        IF ($reiter_name != NULL)
            $this->reiter->where('reiter.name', $reiter_name);

        $result = $this->reiter->get();

        if ($reiter_name != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function getAktuelleAufgaben($aufgaben_name = NULL) {
        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->select('aufgaben.name');
        $this->aufgaben->select('aufgaben.name_r');     // zugehöriger Reiter

        IF ($aufgaben_name != NULL)
            $this->aufgaben->where('aufgaben.name', $aufgaben_name);

        $result = $this->aufgaben->get();

        if ($aufgaben_name != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function getAktuellesProjekt($projekt_id = NULL) {
        $this->projekte = $this->db->table('projekte');
        $this->projekte->select('*');

        IF ($projekt_id != NULL)
            $this->projekte->where('projekte.id', $projekt_id);

        $this->projekte->orderBy('id');
        $result = $this->projekte->get();

        if ($projekt_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }
}