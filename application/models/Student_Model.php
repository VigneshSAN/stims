<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Model extends CI_Model 
{

    function get_students_basic_details()
    {
        $this -> db -> select("*");
        
        $this -> db -> from('student_table');

        $this -> db -> where('student_status', 'basic');

        $this -> db -> where('delete_status', '1');

        $query = $this -> db -> get();
        
        return $query  -> result();  
        
    }

    function delete_students_basic_details($student_register_no)
    {
        $deleteData = array("delete_status" => 0);
        
        $this -> db -> where('student_register_no', $student_register_no);

        $this -> db -> update('student_table', $deleteData);

        if ($this -> db -> affected_rows() >= 0) 
        {
            return TRUE;
        } 
        else 
        {
            return FALSE;
        }
    }

    function get_students_category()
    {
        $this -> db -> select ("*");

        $this -> db -> from ('student_category');

        $this -> db -> where('delete_status','1');

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

    function delete_students_category($categoryData)
    {
        $deleteData = array('delete_status' => 0);

        $this -> db -> where('category_name', $categoryData);

        $this -> db -> update('student_category', $deleteData);

        if ($this -> db -> affected_rows() >= 0) 
        {
            return TRUE;
        } 
        else 
        {
            return FALSE;
        }
    }

    function update_students_category( $categoryId, $categoryData )
    {
        $updateData = array('category_name' => $categoryData);

        $this -> db -> where('category_id', $categoryId);

        $this -> db -> update('student_category', $updateData);

        if ($this -> db -> affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function set_students_basic_details($student_basic_details)
    {
        $this -> db -> trans_begin();

        $this -> db -> insert('student_table', $student_basic_details);
        
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

    function get_student_basic_details($student_register_no)
    {
        $this -> db -> select("*");
        
        $this -> db -> from('student_table');

        $this -> db -> where('student_register_no', $student_register_no);

        $this -> db -> where('student_status', 'basic');

        $this -> db -> where('delete_status', '1');

        $query = $this -> db -> get();
        
        return $query  -> result();  
        
    }

    // set detailed student details
    function set_students_details($student_register_no, $student_data)
    {

        $this -> db -> where('student_register_no', $student_register_no);

        $this -> db -> update('student_table', $student_data);

        if ($this -> db -> affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
        
}

?>


