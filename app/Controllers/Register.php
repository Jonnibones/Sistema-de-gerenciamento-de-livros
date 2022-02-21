<?php

namespace App\Controllers;

use Config\App;

class Register extends BaseController
{
    public function index()
    {
        
        $info['title'] = 'Registrar usuário';
        

        return view('register_view',$info);
    }

    public function register()
    {
        $session = session();
        
        if($this->request->getPost() != null)
        {

           $inputs_hash = array(
               
            'name' => $this->request->getPost()['name'],
            'level' => $this->request->getPost()['level'],
            'email' => $this->request->getPost()['email'],
            'password' => password_hash($this->request->getPost()['password'], PASSWORD_DEFAULT),
            'school' => $this->request->getPost()['school']
            
           );

           $UserModel = new \App\Models\UsersModel();
            
            $verify = $UserModel->where('email', $this->request->getVar()['email'])->first();
            if ($verify) {
                $session->setFlashdata('msghidden', 'E-mail já existente.');   
                return redirect()->to('/register');
            }

            foreach($inputs_hash as $input)
            {
                if($input == '')
                {
                    $session->setFlashdata('msg', 'Campos não podem ser vazios.');   
                    return redirect()->to('/register');
                }
            } 

            if($UserModel->insert($inputs_hash))
            { 
                $session->setFlashdata('msghidden', 'Cadastro efetuado com sucesso.'); 
                return redirect()->to('/register');
            }
            else
            {
                $session->setFlashdata('msg', 'Registro não inserido');   
                return redirect()->to('/register');
            }

        }

    }
}