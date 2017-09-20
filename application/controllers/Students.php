<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();	   	
    }

	// Get the Student details
	public function get_students_details()
	{
        $this -> load -> model('Student_Model');
        
		$data = $this -> Student_Model -> get_students_details();

		if( !empty ($data) )
		{
			$students_details = array();
			 
			foreach ($data as $item):
					
				$students_details[] = array(
					'Student Id'    =>  $item -> student_id,
					'Register No'   =>  $item -> student_register_no,
					'Roll No'       =>  $item -> student_roll_no,
					'Name'          =>  $item -> student_name,
					'Date Of Birth' =>  $item -> student_DOB,
					'Gender'        =>  $item -> student_gender,
					'Nationality'   =>  $item -> student_nationality,
					'City'          =>  $item -> student_city,
					'Pincode'       =>  $item -> student_pincode
				);

			endforeach;		
		
			  echo json_encode($students_details);

		  	die;
		}
	  	else
		{
			$result=array('status' => 0,'response'=>'DB fail','message'=>'No Students Found');

			echo json_encode($result);
	  	}
	}
	
	// get the students categories
	public function get_students_category()
	{
		$this -> load -> model('Student_Model');
        
		$data = $this -> Student_Model -> get_students_category();

		if( !empty ($data) )
		{
			$students_details = array();
			 
			foreach ($data as $item):
					
				$students_details[] = array(
					'Category Id'    =>  $item -> category_id,
					'Category Name'  =>  $item -> category_name
				);

			endforeach;		
		
			  echo json_encode($students_details);

		  	die;
		}
	  	else
		{
			$result=array('status' => 0,'response'=>'DB fail','message'=>'No Students Found');

			echo json_encode($result);
	  	}
	}

	// set students categories
	public function set_students_category()
	{
		$this -> load -> model('Student_Model');

		$category_id 	= '';
		$category_name 	= ($this -> input -> get('category_name'));

		$student_category = array(
			'category_id'	=> $category_id,
			'category_name' => $category_name
		);

		$categoryData = $this -> Student_Model -> set_students_category($student_category);

		if($categoryData != FALSE)
		{
			$result=array('status' => 1,'response' => 'DB Success','message' => 'Category Succesfully Added');
			
			echo json_encode($result);
		}
		else
	  	{
			$result=array('status' => 0,'response' => 'DB Fail','message' => 'Category Added Failed');
			
			echo json_encode($result);
	    }

	}
}

?>
