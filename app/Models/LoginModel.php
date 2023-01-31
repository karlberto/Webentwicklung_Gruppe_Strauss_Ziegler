<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model {

    public function getMitglieder($mitglieder_name = NULL, $mitglieder_mail = NULL){
        $this->mitglieder = $this->db->table('mitglieder');
        $this->mitglieder->select('*');

        if ($mitglieder_name != NULL){
            $this->mitglieder->where('mitglieder.name', $mitglieder_name);
        }
        if ($mitglieder_mail != NULL){
            $this->mitglieder->where('mitglieder.mail', $mitglieder_mail);
        }

        $result = $this->mitglieder->get();

        if ($mitglieder_name != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function isValidMitglied($mitglieder_mail = NULL, $mitglieder_passwort = NULL){
        $this->mitglieder = $this->db->table('mitglieder');
        $this->mitglieder->select('*');

        if($mitglieder_mail != NULL){
            $this->mitglieder->where('mitglieder.mail', $mitglieder_mail);

            $resultArray = $this->mitglieder->get()->getResultArray();
            $resultMitglied = $resultArray[0];
            $databasePassword = $resultMitglied['passwort'];

            if(password_verify($mitglieder_passwort, $databasePassword)) {
                return true;
            }
        }

        return false;
    }

    /*public function createMitglied() {
        $this->mitglieder = $this->db->table('mitglieder');
        $this->mitglieder->insert(array('id' => $_POST['id'],
            'name' => $_POST['name'],
            'mail' => $_POST['mail'],
            password_hash('passwort', PASSWORD_DEFAULT) => $_POST['passwort']));
    }*/
}