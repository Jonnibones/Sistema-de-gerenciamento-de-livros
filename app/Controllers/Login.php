<?php

namespace App\Controllers;

class Login extends BaseController
{
    
    /**
     * Método inicial para retornar o form de login
     */
    public function index()
    {
        $info['title'] = 'Login';
        return view('login_view', $info);
       
    }

    
    /**
     * Método de autenticação para acesso do sistema
     */
    public function auth()
    {
        $session = session(); 

        if ($this->request->getMethod() === 'post') 
        {
            $usersModel = new \App\Models\UsersModel();

                $email = $this->request->getPost()['email'];
                $password = $this->request->getPost()['password'];

                if($email == '' || $password == '')
                {
                    $session->setFlashdata('msg', 'Campos não podem ser vazios.');
                    return redirect()->to('/login');
                }

                $data = $usersModel->where('email', $email)->first();

            if($data) 
            {
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);

                if ($verify_pass) 
                {

                    $new_data = [

                        'id' => $data['id'],
                        'email' => $data['email'],
                        'password' => $data['password'],
                        'name' => $data['name'],
                        'school' => $data['school'],
                        'logged' => TRUE,
                        'level' => $data['level']

                    ];

                    $session->set($new_data);
                    return redirect()->to('/library');
                }
                else
                {
                    //exibir uma mensagem de senha errada e redirecionar para o formulário de login
                    $session->setFlashdata('msg', 'Senha errada.');
                    return redirect()->to('/login');
                }
            }
            else
            {
                //exibir uma mensagem de nenhum usuário encontrado e redirecionar para o formulário de login
                $session->setFlashdata('msg', 'Nenhum registro com este e-mail.');
                return redirect()->to('/login');
            }
        }
    }

    
    /**
     * Método para deslogar do sistema
     */
    public function logoff()
    {
        $session = session();

        $new_data = [

            'id' => null,
            'email' => null,
            'password' => null,
            'name' => null,
            'logged' => FALSE

        ];

        $session->set($new_data);
        $session->setFlashdata('msg', 'Deslogado com sucesso!');
        return redirect()->to('/login');

    }

}