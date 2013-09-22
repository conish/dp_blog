<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Description of post
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
 * @property komentarze_model $komentarze_model

********* MODELS *********
* @property User_model $user_model
* 
 * @author Konrad Kosowski
 */
class post extends CI_Controller 
{
    
    public function index($id)
    {
        $this->load->model('komentarze_model', '', TRUE);
        $this->load->model('web_model', '', TRUE);
        $this->load->model('post_model', '', TRUE);
        $this->load->model('paginacja_model', '', TRUE);
        
        
        if($this->input->post())
        {
            $this->post_akcja($id);
        }
        require_once(APPPATH . "controllers/blog.php");
        $data = blog::show_top($id);
        $data['konfiguracja'] = $this->web_model->pobierz_konfiguracje();
        $data['posty'] = $this->post_model->pobierz_post($id);
        $data['komentarze'] = $this->komentarze_model->pobirze_komentarze($id);
        $data['title'] = $data['posty'][0]->tytul;
        $data['name'] = 'nieznajomy';
        $data['is_logged'] = TRUE;
        
        $this->load->view('post_view', $data);
    }
    
    private function dodaj_komentarz($post_id)
    {
        
        $autor = $this->input->post('autor');
        $tresc = $this->input->post('komentarz_tresc');
        return $this->komentarze_model->dodaj_komentarz($autor, $tresc, $post_id);
    }
    
    private function post_akcja($id)
    {
        switch($this->input->post('akcja'))
        {
            case 'dodaj_komenatarz':
                return $this->dodaj_komentarz($id);
                break;
            default:
                return TRUE;
                break;
        }
    }
}
/* End of file post.php */
/* Location: ./application/controllers/post.php */
