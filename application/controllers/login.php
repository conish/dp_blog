<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Description of login
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property CI_Benchmark $benchmark
* @property CI_Calendar $calendar
* @property CI_Cart $cart
* @property CI_Config $config
* @property CI_Controller $controller
* @property CI_Email $email
* @property CI_Encrypt $encrypt
* @property CI_Exceptions $exceptions
* @property CI_Form_validation $form_validation
* @property CI_Ftp $ftp
* @property CI_Hooks $hooks
* @property CI_Image_lib $image_lib
* @property CI_Input $input
* @property CI_Language $language
* @property CI_Loader $load
* @property CI_Log $log
* @property CI_Model $model
* @property CI_Output $output
* @property CI_Pagination $pagination
* @property CI_Parser $parser
* @property CI_Profiler $profiler
* @property CI_Router $router
* @property CI_Session $session
* @property CI_Security $security
* @property CI_Sha1 $sha1
* @property CI_Table $table
* @property CI_Template $template
* @property CI_Trackback $trackback
* @property CI_Typography $typography
* @property CI_Unit_test $unit_test
* @property CI_Upload $upload
* @property CI_URI $uri
* @property CI_User_agent $agent
* @property CI_Validation $validation
* @property CI_Xmlrpc $xmlrpc
* @property CI_Xmlrpcs $xmlrpcs
* @property CI_Zip $zip
* @property Image_Upload $image_upload
* @property Lang_Detect $lang_detect
* @property login_model $login_model Description
********* MODELS *********
* @property User_model $user_model
* 
 * @author Konrad Kosowski
 */
class login extends CI_Controller 
{
    
    public function index()
    {
        $this->load->model('login_model', '', TRUE);
        $username = $this->input->post('login');
        $password = $this->input->post('pass');
        $auth = $this->login_model->auth($username, $password);
        if($auth)
        {
            $config = array('username' => $auth->login, 'level' => $auth->level);
            $this->load->library('session_setter', $config);
            $output = array('status' => 'ok');
        }
        else
        {
            $output = array('status' => 'fail', 'message' => 'Błędny login lub hasło!');
        }
        $output = json_encode($output);
        $this->output->set_content_type('application/json')->set_output($output);
    }
    
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */
