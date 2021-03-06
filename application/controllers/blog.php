<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Description of blog
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
 * @property web_model $web_model
 * @property post_model $post_model
 * @property paginacja_model $paginacja_model Description

********* MODELS *********
* @property User_model $user_model
* 
 * @author Konrad Kosowski
 */
class blog extends CI_Controller 
{
    
    public function index($id = NULL)
    {
        
        $this->load->model('web_model', '', TRUE);
        $this->load->model('post_model', '', TRUE);
        $this->load->model('paginacja_model', '', TRUE);
        $data['konfiguracja'] = $this->web_model->pobierz_konfiguracje();
        $data['posty'] = $this->post_model->pobierz_posty($id, $data['konfiguracja']['show_per_page']);
        $data['title'] = $data['konfiguracja']['header'];
        $data['konfiguracja']['paginacja'] = $this->paginacja_model->przygotuj_linki();
        $this->load->view('header_view', $data);
        $this->load->view('blog_view', $data);
    }
    
}
/* End of file blog.php */
/* Location: ./application/controllers/blog.php */
