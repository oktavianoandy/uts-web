<?php defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
    /**
     * PDF filename
     * @var String
     */

    public $filename;
    public function __construct()
    {
        parent::__construct();
        $this->filename = "laporan.pdf";
    }

    /**
     * Get an instance of CodeIgniter
     * 
     * @access protected
     * @return void
     */
    protected function ci()
    {
        return get_instance();
    }

    public function load_view($view, $data = array())
    {
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);
        //render pdf
        $this->render();
        //output the generated pdf to browser
        $this->stream($this->filename, array("Attachment" => false));
    }
}


/* End of file Controllername.php */
