<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'PatientController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/** Patients */
$route['dashboard'] = 'PatientController/index';
$route['patient/add'] = 'PatientController/add';
$route['patient/get_patient'] = 'PatientController/get_patient';
$route['patient/update'] = 'PatientController/update';
$route['patient/delete'] = 'PatientController/delete';



