<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Description of helper
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
class helper extends CI_Controller 
{
    
    public function index()
    {
        
    }
    
    public function add_posts()
    {
        $dzis = time();
        $tresc = ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere quam ac orci eleifend tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae tristique urna. Phasellus sagittis egestas varius. Vestibulum luctus bibendum fringilla. Donec lacinia elementum sollicitudin. Sed tortor ante, varius in magna at, volutpat ornare tellus. Nam a egestas augue. Aenean pulvinar nulla vitae scelerisque consectetur. Maecenas molestie, ligula non egestas condimentum, metus tortor sollicitudin tortor, sit amet egestas nulla metus non odio. Nunc faucibus viverra sagittis. Nam quis mi pretium, mollis nunc id, fringilla urna. Integer molestie nulla a ligula imperdiet interdum. Duis fermentum lacinia augue, iaculis vehicula augue vestibulum suscipit.

Aliquam erat volutpat. Duis lobortis, leo sit amet pretium viverra, ante neque consequat dui, sed cursus enim risus nec dolor. Quisque purus tellus, scelerisque sed libero vel, volutpat interdum metus. Pellentesque et ipsum malesuada tortor euismod egestas at at massa. Cras sodales sodales elit, vel volutpat odio varius nec. Mauris sodales orci a augue feugiat commodo. Proin tellus urna, malesuada sed tempus ut, tincidunt et nulla. Suspendisse justo erat, ultrices vel lobortis id, sagittis sed nisl. Quisque rhoncus lectus sit amet accumsan molestie. Nulla et erat est. Sed id accumsan dolor. Duis dapibus urna eget fermentum ullamcorper. Praesent at felis vitae elit tincidunt dictum ut dapibus lacus. Suspendisse consectetur nisi eget ipsum pharetra interdum. Nulla sed turpis sed augue tempus tempor a et urna. Proin auctor dolor sit amet enim pellentesque semper.

Donec tincidunt semper porta. Pellentesque pulvinar erat id tellus bibendum faucibus. Duis eu ante dictum, suscipit urna eget, aliquam lorem. Vivamus fringilla tortor convallis ipsum gravida feugiat nec vel justo. Vestibulum eget pretium arcu. Cras sollicitudin faucibus leo. In lacus ipsum, condimentum sit amet mauris quis, porta elementum libero. Integer dignissim purus lacus, euismod tempor dolor iaculis non. Praesent nec ante enim. Nulla auctor nulla quis tellus pellentesque facilisis. Maecenas fermentum id dui id ultricies. ';
        $tytul = 'Etiam in lobortis nibh. Fusce. ';
        $jeden_dzien_mniej = 60*60*24;
        $wczoraj = $dzis - $jeden_dzien_mniej;
        $autor = 'tfl';
        $lead = ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere quam ac orci eleifend tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae tristique urna. Phasellus sagittis egestas varius. Vestibulum luctus bibendum fringilla. Donec lacinia elementum sollicitudin. Sed tortor ante, varius in magna at, volutpat ornare tellus. Nam a egestas augue. Aenean pulvinar nulla vitae scelerisque consectetur. Maecenas molestie, ligula non egestas condimentum, metus tortor sollicitudin tortor, sit amet egestas nulla metus non odio. Nunc faucibus viverra sagittis. Nam quis mi pretium, mollis nunc id, fringilla urna. Integer molestie nulla a ligula imperdiet interdum. Duis fermentum lacinia augue, iaculis vehicula augue vestibulum suscipit.';
        $this->load->model('post_model', '', TRUE);
        for($i=1;$i<90;$i++)
        {
            $data_dodania = date("Y-m-d G:i:s", $dzis-($i*$jeden_dzien_mniej));
            //echo $data_dodania."<br />";
            $this->post_model->dodaj_post($tytul, $tresc, $autor, $data_dodania, $lead);
            $this->post_model->publikuj_post($this->db->insert_id());
        }
    }
}
/* End of file helper.php */
/* Location: ./application/controllers/helper.php */
