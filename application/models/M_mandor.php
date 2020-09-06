<?php

class M_mandor extends CI_Model
{

   public function Tampil_mandor()
   {

      $query = "SELECT * FROM `mandor`
             ";
      return $this->db->query($query)->result_array();
   }

   public function insert_mandor($data)
   {
      $this->db->insert('mandor', $data);
   }

   
   
}
