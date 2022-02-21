<?php

namespace App\Controllers;

class Library extends BaseController
{
    /**
     * Método inicial para filtrar níveis de usuário e exibir dados
     */
    public function index()
    {

        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }
         
        $info['title'] = 'Minha área';

        $id = $_SESSION['id'];

        if ($_SESSION['level'] == '1') {

            $BooksModel = new \App\Models\BooksModel();

            $reservs = $BooksModel->db->query("SELECT DISTINCT tb_books.id, tb_books.name, tb_books.pub_company, 
            tb_reservation.id_reservation, tb_reservation.date FROM tb_reservation 
            INNER JOIN tb_books on tb_books.id = tb_reservation.id_book 
            INNER JOIN tb_users ON $id = tb_reservation.id_user ");

            $info['reservs'] = $reservs->getResult('array');

            echo view("library_student_view", $info + $_SESSION);
        }
        else
        {

            $BooksModel = new \App\Models\BooksModel();

            $reservs = $BooksModel->db->query("SELECT DISTINCT tb_books.id, tb_books.name, tb_books.pub_company,
             tb_reservation.id_reservation, tb_reservation.date FROM tb_reservation 
             INNER JOIN tb_books on tb_books.id = tb_reservation.id_book 
             INNER JOIN tb_users ON $id = tb_reservation.id_user ");

            $info['reservs'] = $reservs->getResult('array');

             echo view('library_teacher_view', $info + $_SESSION);
        }
       
    }
    /**
     * Método responsável por listar todos os livros da tabela 
     */
    public function listar_livros()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $BooksModel = new \App\Models\BooksModel();

        $info['books'] = $BooksModel->findAll();
        $info['title'] = 'Gerenciar livros';

        echo view('books_teacher_view', $info + $_SESSION);

    }
    /**
     * Método responsável por cadastrar um livro 
     */
    public function cadastrar_livro()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $BooksModel = new \App\Models\BooksModel();

        if($this->request->getPost() != null)
        {
            $inputs = array(

                'name' => $this->request->getPost()['name'],
                'pub_company' => $this->request->getPost()['pub_company'],
                'description' => $this->request->getPost()['description'],
                
            );

            foreach($inputs as $input)
            {
                if($input == '')
                {
                    $session->setFlashdata('msg', 'Campos não podem ser vazios.');   
                    return redirect()->to('/library/listar_livros');
                }
            }

            

            if ($BooksModel->insert($inputs)) 
            {
                $session->setFlashdata('msghidden', 'Livro cadastrado com sucesso.'); 
                return redirect()->to('/library/listar_livros');
            }
        }

    }
    /**
     * Método responsável por receber os dados passados através do iD passado via get
     * E assim carregar os inputs para que possa ser realizado o update. 
     */
    public function editar_livros()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $info['title'] = 'Minha área';

        $info['hidden'] = '';

        $id = $this->request->getUri()->getSegment(3);

        $BooksModel = new \App\Models\BooksModel();

        $info['books'] = $BooksModel->findAll();
       
        $info['book_edit'] = $BooksModel->find($id);

        echo view('books_teacher_view', $info + $_SESSION);

    }
    /**
     * Método responsável para editar os dados dos livros 
     */
    public function edit_livros()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        if($this->request->getPost() != null)
        {
            $inputs = array(

                'id' => $this->request->getPost()['id'],
                'name' => $this->request->getPost()['name'],
                'pub_company' => $this->request->getPost()['pub_company'],
                'description' => $this->request->getPost()['description'],
                
            );

            $BooksModel = new \App\Models\BooksModel();

            if($BooksModel->update($inputs['id'], $inputs))
            {

                $session->setFlashdata('msghidden', 'Registro editado.');
                return redirect()->to('/library/listar_livros');

            }
        }
        return redirect()->to('/library');
    }
    /**
     * Método responsável por listar todos os alunos
     */
    public function listar_alunos()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        } 

        $info['title'] = 'Lista de alunos';
        $UsersModel = new \App\Models\UsersModel();

        $info['alunos'] = $UsersModel->where('level', '1');
        $info['alunos'] = $UsersModel->findAll();

        echo view('students_teacher_view', $info + $_SESSION);
    }
    /**
     * Método responsável por listar todos os livros
     */
    public function listar_livro_aluno()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $info['title'] = 'Lista de livros';

        session();

        $BooksModel = new \App\Models\BooksModel();

        $info['books'] = $BooksModel->findAll();

        echo view('books_student_view', $info + $_SESSION);
    }
      /**
     * Método responsável por listar todos os livros
     */
    public function listar_livro_professor()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $info['title'] = 'Lista de livros';

        $BooksModel = new \App\Models\BooksModel();

        $info['books'] = $BooksModel->findAll();

        echo view('bookslist_teacher_view', $info + $_SESSION);
    }
      /**
     * Método responsável por fazer a reserva de um livro
     */
    public function reservar_livro()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $BooksModel = new \App\Models\BooksModel();

        $info['title'] = 'Minha área';

        $info['books'] = $BooksModel->findAll();

        $id = $this->request->getUri()->getSegment(3);

        $ReservationModel = new \App\Models\ReservationModel();

        $fields = [

            'id_user' => $_SESSION['id'],
            'id_book' => $id, 
            'date' => date('Y-m-d')

        ];
        
        if($ReservationModel->insert($fields))
        {
            $data = ['avaliable' => false];
            $BooksModel->update($id, $data);
            
            $session->setFlashdata('msghidden', 'Reserva efetuada.');

            if($_SESSION['level'] == '1')
            {
                $session->setFlashdata('msghidden', 'Reserva efetuada.');
                return redirect()->to('/library/listar_livro_aluno');
            }

            return redirect()->to('/library/listar_livro_professor');
        }
        
        
            echo view('bookslist_teacher_view', $info + $_SESSION);
    

       
    }
    /**
     * Método responsável por receber os dados passados através do iD passado via get
     * E assim carregar os inputs para que possa ser realizado o update. 
     */
    public function editar()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $id = $_SESSION['id'];

        $BooksModel = new \App\Models\BooksModel();

        $reservs = $BooksModel->db->query("SELECT DISTINCT tb_books.id, tb_books.name, tb_books.pub_company,
            tb_reservation.id_reservation, tb_reservation.date FROM tb_reservation 
            INNER JOIN tb_books on tb_books.id = tb_reservation.id_book 
            INNER JOIN tb_users ON $id = tb_reservation.id_user ");

        $info['reservs'] = $reservs->getResult('array');

        $info['title'] = 'Minha área';

        $info['hidden'] = '';

        $id = $this->request->getUri()->getSegment(3);

        $UsersModel = new \App\Models\UsersModel();
        $ReservsModel = new \App\Models\ReservationModel();
        $info['books'] = $ReservsModel->findAll();
       
        $info['user'] = $UsersModel->find($id);

        echo view('library_teacher_view', $info + $_SESSION);

    }
    /**
     * Método responsável por editar os dados dos professores
     */
    public function edit()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        if($this->request->getPost() != null)
        {
            $inputs = array(

                'id' => $this->request->getPost()['id'],
                'name' => $this->request->getPost()['name'],
                'email' => $this->request->getPost()['email'],
                'school' => $this->request->getPost()['school'],
                
            );

            $UsersModel = new \App\Models\UsersModel();

            if($UsersModel->update($inputs['id'], $inputs))
            {

                $session->set($inputs);
                $session->setFlashdata('msghidden', 'Registro editado.');
                return redirect()->to('/library');

            }
        }
        return redirect()->to('/library');
    }
    /**
     * Método responsável por receber os dados passados através do iD passado via get
     * E assim carregar os inputs para que possa ser realizado o update. 
     */
    public function editarAluno()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $id = $_SESSION['id'];

        $BooksModel = new \App\Models\BooksModel();

        $reservs = $BooksModel->db->query("SELECT DISTINCT tb_books.id, tb_books.name, tb_books.pub_company, 
        tb_reservation.id_reservation, tb_reservation.date FROM tb_reservation 
        INNER JOIN tb_books on tb_books.id = tb_reservation.id_book 
        INNER JOIN tb_users ON $id = tb_reservation.id_user ");

        $info['reservs'] = $reservs->getResult('array');

        $info['title'] = 'Minha área';

        $info['hidden'] = '';

        $id = $this->request->getUri()->getSegment(3);

        $UsersModel = new \App\Models\UsersModel();
       
        $info['user'] = $UsersModel->find($id);

        echo view('library_student_view', $info + $_SESSION);

    }
    /**
     * Método responsável por editar os dados dos alunos 
     */
    public function editAluno()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        if($this->request->getPost() != null)
        {
            $inputs = array(

                'id' => $this->request->getPost()['id'],
                'name' => $this->request->getPost()['name'],
                'email' => $this->request->getPost()['email'],
                'school' => $this->request->getPost()['school'],
                
            );

            $UsersModel = new \App\Models\UsersModel();

            if($UsersModel->update($inputs['id'], $inputs))
            {

                $session->set($inputs);
                $session->setFlashdata('msghidden', 'Registro editado.');
                return redirect()->to('/library');

            }
        }
        return redirect()->to('/library');
    }
    /**
     * Método responsável por deletar uma reserva
     */
    public function deletar_reserva()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $info['title'] = 'Minha área';

        $info['hidden'] = '';

        $id_reserv = $this->request->getUri()->getSegment(3);

        $ReservModel = new \App\Models\ReservationModel();

        $query = $ReservModel->db->query("SELECT DISTINCT tb_books.id FROM tb_books
        INNER JOIN tb_reservation ON tb_books.id = $id_reserv LIMIT 1");

        $id_book = $query->getResult('array');

        $new_value = ["avaliable" => true];

        $BooksModel = new \App\Models\BooksModel();

        
        $BooksModel->update($id_book, $new_value);

        if($ReservModel->delete($id_reserv))
        {
            $session->setFlashdata('msghidden', 'Reserva cancelada.');
            return redirect()->to('/library');
        }
        
    }
    /**
     * Método responsável por deletar um livro 
     */
    public function deletar_livros()
    {
        $session = session();

        if (!isset($_SESSION['logged']) || $_SESSION['logged'] === false) 
        {
            $session->setFlashdata('msg', 'Acesso restrito');
            return redirect()->to('/login');
        }

        $info['title'] = 'Minha área';

        $info['hidden'] = '';

        $id_book = $this->request->getUri()->getSegment(3);

        $BooksModel = new \App\Models\BooksModel();
        $info['books'] = $BooksModel->findAll();
        
        if ($BooksModel->delete($id_book)) 
        {
            $session->setFlashdata('msghidden', 'Livro deletado.');
            return redirect()->to('/library/listar_livros');
        }


        

    }


}
    