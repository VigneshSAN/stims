<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();	   	
    }

	// Get the Student details
	public function get_students_basic_details()
	{
        $this -> load -> model('Student_Model');
        
		$data = $this -> Student_Model -> get_students_basic_details();

		if( !empty ($data) )
		{
			$students_details = array();
			 
			foreach ($data as $item):
					
				$students_details[] = array(
					'Student Id'    	=>  $item -> student_id,
					'Register No'   	=>  $item -> student_register_no,
					'Name'          	=>  $item -> student_name,
					'Date Of Joining' 	=>  $item -> student_date_of_joining,
					'Batch'        		=>  $item -> student_batch,
					'Standard'   		=>  $item -> student_standard,
					'Email'          	=>  $item -> student_email,
					'Mobile'       		=>  $item -> student_mobile
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

	// delete students basic details
	public function delete_students_basic_details()
	{
		$this -> load -> model('Student_Model');
		
		$deleteStudentDetail = ($this -> input -> get('student_register_no'));

		$deleteStudentData = $this -> Student_Model -> delete_students_basic_details($deleteStudentDetail);

		if($deleteStudentDetail != FALSE)
		{
			$result=array('status' => 1,'response' => 'DB Success','message' => 'Students Basic Details Succesfully Deleted ');
			
			echo json_encode($result);
		}
		else
		{
		$result=array('status' => 0,'response' => 'DB Fail','message' => 'Stduents Basic Details Deleted Failed');
		 
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

	// Delete the students category
	public function delete_students_category()
	{
		$this -> load -> model('Student_Model');

		$deleteCategoryName = ($this -> input -> get('category_name'));

		$deleteCategoryData = $this -> Student_Model -> delete_students_category($deleteCategoryName);

		if($deleteCategoryData != FALSE)
		{
			$result=array('status' => 1,'response' => 'DB Success','message' => 'Category Succesfully Deleted ');
			
			echo json_encode($result);
		}
		else
	  	{
			$result=array('status' => 0,'response' => 'DB Fail','message' => 'Category Deleted Failed');
			
			echo json_encode($result);
	    }
	}

	// update the students category
	public function update_students_category() 
	{
		$this -> load -> model('Student_Model');

		$updateCategoryId = ($this -> input -> get('category_id'));

		$updateCategoryName = ($this -> input -> get('category_name'));

		$updateCategoryData = $this -> Student_Model -> update_students_category($updateCategoryId, $updateCategoryName);

		if($updateCategoryData != FALSE)
		{
			$result=array('status' => 1,'response' => 'DB Success','message' => 'Category Succesfully updated ');
			
			echo json_encode($result);
		}
		else
	  	{
			$result=array('status' => 0,'response' => 'DB Fail','message' => 'Category Updated Failed');
			
			echo json_encode($result);
	    }

	}

	// Insert the Basic student details
	public function set_students_basic_details()
	{
		$this -> load -> model('Student_Model');

		$register_no_name = 'STIM';	// Generating Dynamic Register Number Here.
		$register_no_time = round(microtime(true));
		$register_no	  = $register_no_name.''.$register_no_time;

		$roll_no_name = 'SUIT'; //Generating the Dynamic Roll Number Here.
		$roll_no_time = round(microtime(true));
		$roll_no 	  = $roll_no_name.''.$roll_no_time;

		$student_register_no 		= 	$register_no;
		$student_roll_no 			= 	$roll_no;
		$student_name 				= ( $this -> input -> get('student_name') );
		$student_date_of_joining 	= ( $this -> input -> get('student_date_of_joining'));
		$student_batch				= ( $this -> input -> get('student_batch'));
		$student_standard			= ( $this -> input -> get('student_standard'));
		$student_email 				= ( $this -> input -> get('student_email'));
		$student_mobile 			= ( $this -> input -> get('student_mobile'));

		$student_basic_details = array(
			'student_register_no'		=> $student_register_no,
			'student_roll_no'			=> $student_roll_no,
			'student_name' 				=> $student_name,
			'student_date_of_joining' 	=> $student_date_of_joining,
			'student_batch' 			=> $student_batch,
			'student_standard' 			=> $student_standard,
			'student_email'				=> $student_email,
			'student_mobile'			=> $student_mobile 
		);

		$categoryData = $this -> Student_Model -> set_students_basic_details($student_basic_details);

		if($categoryData != FALSE)
		{
			$result=array('status' => 1,'response' => 'DB Success','message' => 'Student Succesfully Added');
			
			echo json_encode($result);
		}
		else
	  	{
			$result=array('status' => 0,'response' => 'DB Fail','message' => 'Student Added Failed');
			
			echo json_encode($result);
	    }
	}

	// get a student detail for the Detailed Admission
	public function get_student_basic_details()
	{
		$this -> load -> model('Student_Model');
		
		$student_register_no = ( $this -> input -> get('student_register_no'));
        
		$data = $this -> Student_Model -> get_student_basic_details($student_register_no);

		if( !empty ($data) )
		{
			$student_details = array();
			 
			foreach ($data as $item):
					
				$student_details[] = array(
					'student_id'    			=>  $item -> student_id,
					'student_register_no'   	=>  $item -> student_register_no,
					'student_roll_no'			=>  $item -> student_roll_no,
					'student_name'          	=>  $item -> student_name,
					'student_date_of_joining' 	=>  $item -> student_date_of_joining,
					'student_batch'        		=>  $item -> student_batch,
					'student_standard'   		=>  $item -> student_standard,
					'student_email'          	=>  $item -> student_email,
					'student_mobile'       		=>  $item -> student_mobile
				);

			endforeach;		
		
			  echo json_encode($student_details);

		  	die;
		}
	  	else
		{
			$result=array('status' => 0,'response'=>'DB fail','message'=>'No Students Found');

			echo json_encode($result);
	  	}
	}

	// update the students full details 
	public function set_students_details()
	{
		$this -> load -> model('Student_Model');

		$student_register_no = ( $this -> input -> get('student_register_no'));

		$student_data		 = ( $this -> input -> get('student_data.student_aadhar'));

		$student_data = array(
			'student_aadhar_number'			=> ( $this -> input -> get('student_aadhar')),
			'student_birth_place'			=> ( $this -> input -> get('student_birth_place')),
			'student_blood_group'			=> ( $this -> input -> get('student_blood_group')),
			'student_caste'					=> ( $this -> input -> get('student_caste')),
			'student_category'				=> ( $this -> input -> get('student_category')),
			'student_city'					=> ( $this -> input -> get('student_city')),
			'student_country'				=> ( $this -> input -> get('student_country')),
			'student_date_of_birth'			=> ( $this -> input -> get('student_date_of_birth')),
			'student_father_email'			=> ( $this -> input -> get('student_father_email')),
			'student_father_mobile'			=> ( $this -> input -> get('student_father_mobile')),
			'student_father_name'			=> ( $this -> input -> get('student_father_name')),
			'student_father_occupation'		=> ( $this -> input -> get('student_father_occupation')),
			'student_gender'				=> ( $this -> input -> get('student_gender')),
			'student_mother_email'			=> ( $this -> input -> get('student_mother_email')),
			'student_mother_mobile'			=> ( $this -> input -> get('student_mother_mobile')),
			'student_mother_name'			=> ( $this -> input -> get('student_mother_name')),
			'student_mother_occupation'		=> ( $this -> input -> get('student_mother_occupation')),
			'student_mother_tongue'			=> ( $this -> input -> get('student_mother_tongue')),
			'student_nationality'			=> ( $this -> input -> get('student_nationality')),
			'student_permanent_address'		=> ( $this -> input -> get('student_permanent_address')),
			'student_pin'					=> ( $this -> input -> get('student_pin')),
			'student_phone'					=> ( $this -> input -> get('student_phone')),
			'student_present_address'		=> ( $this -> input -> get('student_present_address')),
			'student_religion'				=> ( $this -> input -> get('student_religion')),
			'student_status'				=> 'completed'
		);

		$studentData = $this -> Student_Model -> set_students_details($student_register_no, $student_data);

		if($studentData != FALSE)
		{
			$result=array('status' => 1,'response' => 'DB Success','message' => 'Student Succesfully Updated');
			
			echo json_encode($result);
		}
		else
	  	{
			$result=array('status' => 0,'response' => 'DB Fail','message' => 'Student Updated Failed');
			
			echo json_encode($result);
	    }
	}

}

?>
