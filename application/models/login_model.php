<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Description of login_model
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

********* MODELS *********
* @property User_model $user_model
* 
 * @author Konrad Kosowski
 */

class login_model extends CI_Model 
{
    public function login_model() 
    {
        parent::__construct();
    }
    
    public function create_user($login, $password)
    {
        $set = array('login' => $login,
            'hash' => password_hash($password, PASSWORD_BCRYPT),
            'level' => 1,
            'active' => 1
            );
        $this->db->insert('users', $set);
        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        return FALSE;
    }
    
    public function auth($username, $password)
    {
        $this->db->select('id, level, login, hash');
        $this->db->from('users');
        $this->db->where('login', $username);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            foreach($query->result() as $result)
            {
                $row = $result;
            }
            if(password_verify($password, $row->hash))
            {
                return $row;
            }
            else
            {
                return FALSE;
            }
        }
        return FALSE;
    }
}
/* End of file login_model.php */
/* Location: ./application/models/login_model.php */
