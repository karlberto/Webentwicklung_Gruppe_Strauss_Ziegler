<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function index()
    {
        //helper('form');

        // Checks whether the form is submitted.


            $post = $this->request->getPost(['mail', 'password']);
            $login_model = model(LoginModel::class);
            if(isset($_POST['btnEinloggen'])) {
                // Checks whether the submitted data passed the validation rules.
                if ($this->validation->run($_POST, 'login') && ($login_model->isValidMitglied($post['mail'], $post['password']))) {
                    //Session speichern
                    $login_mitglied = $login_model->getMitglieder(NULL, $_POST['mail']);
                    $mitglieder_name = $login_mitglied[0]['name'];
                    echo($mitglieder_name);
                    $sessionData = [
                        'name' => $mitglieder_name,
                        'mail' => $_POST['mail']
                    ];
                    session()->set($sessionData);
                    return redirect()->to(base_url('ProjektPage'));

                } elseif (!$this->validation->run($_POST, 'login')) {

                    $data['errors'] = $this->validation->getErrors();

                    return view('login', $data);
                }
            }




        // The validation fails, so returns the form.
        return view('login');
    }
}
