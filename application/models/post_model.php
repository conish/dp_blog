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

********* MODELS *********
* @property User_model $user_model
* 
 * @author Konrad Kosowski
 */

class post_model extends CI_Model 
{
    public function post() 
    {
        parent::__construct();
    }
    
    public function pobierz_posty($offset, $limit)
    {
        if($offset == "")
        {
            $offset = 0;
        }
        $this->db->select('id, tytul, status, autor, data_dodania, data_publikacji, lead, post_url');
        $this->db->from('posty');
        $this->db->where('status', 'public');
        $this->db->where('usuniety', 0);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $result)
            {
                $row[] = $result;
            }
            return $row;
        }
        return FALSE;
    }
    public function pobierz_wszystkie_posty()
    {
        $this->db->select('id, tytul, status, autor, data_dodania, data_publikacji, lead, post_url');
        $this->db->from('posty');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $result)
            {
                $row[] = $result;
            }
            return $row;
        }
        return FALSE;
    }
        
    public function pobierz_post($id)
    {
        $this->db->select('id, tytul, status, autor, data_dodania, data_publikacji, tresc, post_url, lead');
        $this->db->from('posty');
        $this->db->where('status', 'public');
        $this->db->where('usuniety', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            foreach($query->result() as $result)
            {
                $row[] = $result;
            }
            return $row;
        }
        return FALSE;
    }
    public function aktualizuj_post($id, $tytul = '', $tresc = '', $lead = '')
    {
        $set = array();
        if($tytul != '')
        {
            $set['tytul'] = $tytul;
        }
        if($tresc != '')
        {
            $set['tresc'] = $tresc;
        }
        if($lead != '')
        {
            $set['lead'] = $lead;
        }
        $this->db->where('id', $id);
        $this->db->update('posty', $set);
        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
    }
    public function dodaj_post($tytul, $tresc, $autor, $data_dodania, $lead, $post_url = FALSE)
    {
        $tytul = trim($tytul);
        if(!$post_url)
        {
            $post_url = str_replace(" ", "_", $tytul);
            $post_url = str_replace(",", "", $post_url);
        }
        $set = array(
            'tytul' => $tytul,
            'tresc' => trim($tresc),
            'status' => 'draft',
            'autor' => $autor,
            'data_dodania' => $data_dodania,
            'lead' => trim($lead),
            'post_url' => $post_url
        );
        return $this->db->insert('posty', $set);
    }
    
    public function publikuj_post($id)
    {
        $set = array('status' => 'public', 'data_publikacji' => date("Y-m-d G:i:s"));
        $this->db->where('id', $id);
        return $this->db->update('posty', $set);
    }
    
}
/* End of file post_model.php */
/* Location: ./application/models/post_model.php */
