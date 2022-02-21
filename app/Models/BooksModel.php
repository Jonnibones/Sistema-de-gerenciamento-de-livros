<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class BooksModel extends Model
    {
        protected $table = 'tb_books';
        protected $primaryKey = 'id';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['id','name', 'pub_company', 'description', 'id_user', 'avaliable'];
        protected $returnType = 'array';

        
    }


?>