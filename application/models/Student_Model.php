<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Model extends CI_Model 
{

    function get_students_details()
    {
        $this ->db -> select("*");
        
        $this ->db -> from('student_table');

        $query = $this -> db -> get();
        
        return $query  -> result();  
        
    }

    function get_students_category()
    {
        $this -> db -> select ("*");

        $this -> db -> from ('student_category');

        $query = $this -> db -> get();

        return $query -> result();
    }

    function set_students_category($categoryData)
    {
        $this -> db -> trans_begin();
        
        $this -> db -> insert('student_category',$categoryData);

        if($this -> db -> trans_status() === FALSE)
        {
            $this -> db -> trans_rollback();
            return FALSE;
        }
        else
        {
            $this -> db -> trans_commit();
            return TRUE;
        }
    }
        
}

?>


