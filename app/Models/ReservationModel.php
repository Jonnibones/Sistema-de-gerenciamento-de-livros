<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ReservationModel extends Model
    {
        protected $table = 'tb_reservation';
        protected $primaryKey = 'id_reservation';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['id_reservation','id_user', 'id_book', 'date'];
        protected $returnType = 'array';

        
    }
	
?>