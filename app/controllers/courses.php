<?php
	class Courses extends Controller {

    public function index() {
			check_permissions();
		$course = $this->model('Course');
		$departments = $course->get_all_departments();
		$programs = $course->get_all_programs();
	    $this->view('courses/index', ['departments' => $departments, 'programs' =>$programs]);
		die;
    }
	public function display ($department = null, $program = null) {
		if($department && $program == null) {
 			$course = $this->model('Course');
 			$courseList =  $course->get_all_programs_by_department($department);
			$programs = [];
 			$this->view('courses/display', ['$courseList' => $courseList, 'programs' =>$programs]);
 			die;
		}
		if($program){
			$course = $this->model('Course');
			$programs =  $course->get_all_courses($department,$program);
			$courseList =  [];
 			$this->view('courses/display', ['$courseList' => $courseList, 'programs' => $programs]);
 			die;
			
		}
	}
	public function insertData() {
			$insert = $this->model('Insert');
			$InsertData = $insert->InsertData();
			$this->view('courses/insert', [':id' => $id, ':course_id' => $course_id, ':course_name' => $course_name, ':department' 	=>$department, ':program' => $program]);
			die;
		}
	}
?>