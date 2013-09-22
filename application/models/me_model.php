<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Description of me_model
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

class me_model extends CI_Model 
{
    public function me_model() 
    {
        parent::__construct();
    }
    
    
    public function get_user()
    {
        $user = $this->session->userdata('username');
        $this->db->select('id, login, opis');
        $this->db->from('users');
        $this->db->join('user_levels', ('user_levels.level = users.level'));
        $this->db->where('login', $user);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            foreach($query->result() as $result)
            {
                $row = $result;
            }
            return $row;
        }
        return FALSE;
    }
}
/* End of file me_model.php */
/* Location: ./application/models/me_model.php */
