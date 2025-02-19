<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tbl_PatientModel');
    }
	public function index() {
		$data['patients'] = $this->Tbl_PatientModel->get_all_patients(); 
	
		$this->load->view('layout/__header');
		$this->load->view('user_admin/dashboard_a', $data); 
		$this->load->view('layout/__footer');
	}
	public function add() {
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('middle_name', 'Middle Name', 'required');
		$this->form_validation->set_rules('birth_date', 'Birth Date', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required|numeric');
	
		if ($this->form_validation->run() == FALSE) {
			log_message('error', 'Form validation failed: ' . json_encode($this->form_validation->error_array()));
			echo json_encode([
				'status' => 'error',
				'errors' => $this->form_validation->error_array()
			]);
			return;
		}
		$data = [
			'last_name'      => $this->input->post('last_name'),
			'first_name'     => $this->input->post('first_name'),
			'middle_name'    => $this->input->post('middle_name'),
			'suffix'         => $this->input->post('suffix'),
			'sex'            => $this->input->post('sex'),
			'birth_date'     => $this->input->post('birth_date'),
			'contact_number' => $this->input->post('contact_number')
		];
	
		$this->Tbl_PatientModel->insert_patient($data);

		echo json_encode(['status' => 'success']);
		return;
	}
	public function get_patient() {
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$csrfToken = $this->security->get_csrf_hash(); 
			$patient = $this->Tbl_PatientModel->get_patient_by_id($id);
	
			if ($patient) {
				echo json_encode([
					"status" => "success",
					"data" => $patient,
					"csrf_token" => $csrfToken
				]);
			} else {
				echo json_encode(["status" => "error", "message" => "Patient not found!"]);
			}
		}
	}
	public function update() {
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post("id");
	
			if (empty($id)) {
				echo json_encode(["status" => "error", "message" => "No patient ID provided."]);
				return;
			}
	
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('birth_date', 'Birth Date', 'required');
	
			if ($this->form_validation->run() == FALSE) {
				echo json_encode([
					"status" => "error",
					"errors" => $this->form_validation->error_array(),
					"csrf_token" => $this->security->get_csrf_hash()
				]);
			} else {
				$data = [
					"last_name" => $this->input->post("last_name"),
					"first_name" => $this->input->post("first_name"),
					"middle_name" => $this->input->post("middle_name"),
					"suffix" => $this->input->post("suffix"),
					"sex" => $this->input->post("sex"),
					"birth_date" => $this->input->post("birth_date"),
					"region" => $this->input->post("region"),
					"province" => $this->input->post("province"),
					"city" => $this->input->post("city"),
					"barangay" => $this->input->post("barangay"),
					"contact_number" => $this->input->post("contact_number")
				];
	
				$this->load->model("Tbl_PatientModel"); // Ensure model is loaded
				$updated = $this->Tbl_PatientModel->update_patient($id, $data);
	
				if ($updated) {
					echo json_encode([
						"status" => "success",
						"message" => "Patient updated successfully!",
						"csrf_token" => $this->security->get_csrf_hash()
					]);
				} else {
					echo json_encode([
						"status" => "error",
						"message" => "Failed to update patient!",
						"csrf_token" => $this->security->get_csrf_hash()
					]);
				}
			}
		}
	}
	
	public function delete(){
    $id = $this->input->post('id');
    $result = $this->Tbl_PatientModel->soft_delete_patient($id);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Patient Deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to Delete patient.']);
    }
}

	

}
