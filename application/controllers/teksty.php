<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Description of teksty
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
 * @property post_model $post_model

********* MODELS *********
* @property User_model $user_model
* 
 * @author Konrad Kosowski
 */
class teksty extends CI_Controller 
{
    
    public function __construct() 
    {
        parent::__construct();
        if(!$this->session->userdata('username'))
        {
            header("Location: ".base_url());
        }
        $this->load->model('post_model', '', TRUE);
    }
    
    public function index()
    {
        require_once(APPPATH . "controllers/blog.php");
        $data = blog::show_top(NULL);
    }
    
    public function all()
    {
        require_once(APPPATH . "controllers/blog.php");
        $data = blog::show_top(NULL);
        $data['posty'] = $this->post_model->pobierz_wszystkie_posty();

        $this->load->view('teksty/all_tekst_view', $data);
    }
    
    public function add()
    {
        require_once(APPPATH . "controllers/blog.php");
        $data = blog::show_top(NULL);
        $this->load->view('teksty/add_tekst_view', $data);
    }
    
    public function edit($id)
    {
        if(is_null($id))
        {
            header("Location: ".base_url());
            return;
        }
        require_once(APPPATH . "controllers/blog.php");
        $data = blog::show_top($id);
        $data['post'] = $this->post_model->pobierz_post($id);
        $data['post'][0]->tresc = $this->convert_save_to_body($data['post'][0]->tresc);
        $data['post'][0]->lead = $this->convert_save_to_body($data['post'][0]->lead);
        $data['post_id'] = $data['post'][0]->id;
        $this->load->view('teksty/add_tekst_view', $data);
    }
    
    public function save()
    {
        if($this->input->post())
        {
            $post_id = $this->input->post('post_id');
            $tytul = $this->input->post('title');
            $lead = $this->convert_body_to_save($this->input->post('lead'));
            $tresc = $this->convert_body_to_save($this->input->post('tresc'));
            $autor = $this->session->userdata('username');
            $data_dodania = date("Y-m-d G:i:s");
            if($post_id != '')
            {
                if($this->post_model->aktualizuj_post($post_id, $tytul, $tresc, $lead))
                {
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }
                else
                {
                    echo 'Wystąpil okropny, brzydki błąd!';
                }
            }
            else
            {
                if($this->post_model->dodaj_post($tytul, $tresc, $autor, $data_dodania, $lead))
                {
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }
                else
                {
                    echo 'Wystąpil okropny, brzydki błąd!';
                }
            }
        }
    }
    public function convert_save_to_body($text)
    {
        $to = array(
            '[i]',
            '[/i]',
            '[b]',
            '[/b]',
            '[u]',
            '[/u]',
            '[h2]',
            '[/h2]',
            '[h3]',
            '[/h3]',
            '[url="$1"]$2[/url]');
        $from = array(
            '/<i>/is',
            '/<\/i>/is',
            '/<strong>/is',
            '/<\/strong>/is',
            '/<u>/is',
            '/<\/u>/is',
            '/<h2>/is',
            '/<\/h2>/is',
            '/<h3>/is',
            '/<\/h3>/is',
            '/<a href="(.*?)" target="_blank">(.*?)<\/a>/is'
        );
        return preg_replace($from, $to, $text);
    }
    public function convert_body_to_save($text)
    {
        $from = array(
            '/\[i\]/si',
            '/\[\/i\]/si',
            '/\[b\]/si',
            '/\[\/b\]/si',
            '/\[u\]/si',
            '/\[\/u\]/si',
            '/\[h2\]/si',
            '/\[\/h2\]/si',
            '/\[h3\]/si',
            '/\[\/h3\]/si',
            '/\[url\="(.*?)"\](.*?)\[\/url\]/is');
        $to = array(
            '<i>',
            '</i>',
            '<strong>',
            '</strong>',
            '<u>',
            '</u>',
            '<h2>',
            '</h2>',
            '<h3>',
            '</h3>',
            '<a href="$1" target="_blank">$2</a>'
        );
        return preg_replace($from, $to, $text);
    }
}
/* End of file teksty.php */
/* Location: ./application/controllers/teksty.php */
