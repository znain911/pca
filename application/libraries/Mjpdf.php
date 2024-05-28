<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mjpdf{
	private $CI;
	 function __construct()
    {
 		$this->CI =& get_instance();
        $this->CI->load->database();

		require_once APPPATH.'third_party/mpdf/mpdf.php';

    }

	function product_export($html){
		$mpdf= new mPDF('c','A4-L','','',20,15,30,10,0,5);
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("::-PEEPEP-::");
		$mpdf->SetAuthor("Invogue Software.");
		$mpdf->SetWatermarkText("Peepep");
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.07;
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($html);
		$export = $mpdf->Output('invjpdf.pdf','I');
		return $export;

	}

	function product_detail_export($html){
		$mpdf= new mPDF('c','A4','','',20,15,35,10,5,5);
	  //$mpdf= new mPDF('c','A4','','',20,15,48,25,10,10);
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("::-PEEPEP-::");
		$mpdf->SetAuthor("Invogue Software.");
		$mpdf->SetWatermarkText("Peepep");
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.07;
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($html);
		$export = $mpdf->Output('invjpdf.pdf','I');
		return $export;

	}



	function invoice($html){
		$mpdf= new mPDF('c','A4','','',20,15,48,25,10,10);
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("Acme Trading Co. - Invoice");
		$mpdf->SetAuthor("Acme Trading Co.");
		$mpdf->SetWatermarkText("Paid");
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($html);
		$export = $mpdf->Output('invjpdf.pdf','I');
		return $export;
	}



 }// end of class
?>
