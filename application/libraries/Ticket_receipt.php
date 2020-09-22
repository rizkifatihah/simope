<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/// IMPORTANT - Replace the following line with your path to the escpos-php autoload script
require_once APPPATH."third_party/escpos/autoload.php";

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

class Ticket_receipt
{

  private $CI;
  private $connector;
  private $printer;
  // TODO: printer settings
  // Make this configurable by printer (32 or 48 probably)
  private $printer_width = 48;

  public function __construct()
  {
    $this->CI =& get_instance(); // This allows you to call models or other CI objects with $this->CI->...
  }

  function connect($ip_address, $port)
  {
    $this->connector = new NetworkPrintConnector($ip_address, $port);
    $this->printer = new Printer($this->connector);
  }

  private function check_connection()
  {
    if (!$this->connector OR !$this->printer OR !is_a($this->printer, 'Mike42\Escpos\Printer')) {
      throw new Exception("Tried to create receipt without being connected to a printer.");
    }
  }

  public function close_after_exception()
  {
    if (isset($this->printer) && is_a($this->printer, 'Mike42\Escpos\Printer')) {
      $this->printer->close();
    }
    $this->connector = null;
    $this->printer = null;
    $this->emc_printer = null;
  }

  // Calls printer->text and adds new line
  private function add_line($text = "", $should_wordwrap = true)
  {
    $text = $should_wordwrap ? wordwrap($text, $this->printer_width) : $text;
    $this->printer->text($text."\n");
  }

    public function print_ticket($id_transaction)
    {
        $connector = new WindowsPrintConnector("kasir1");
        //$connector = new FilePrintConnector($order_id);
        $this->printer = new Printer($connector);

		$transaction = $this->CI->GeneralModel->get_by_id_general('tb_transaction','id_transaction',$id_transaction);
		$order = $this->CI->TransactionModel->getDetailOrder($id_transaction,$this->CI->session->userdata('uuid_outlet'));

						$this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $logo = EscposImage::load('assets/logo/logo240.png');
            $this->printer->graphics($logo);
            $this->add_line("------------------------------------------------");
						$this->printer->setJustification(Printer::JUSTIFY_LEFT);
						$this->add_line('ID Transaksi : ' . $transaction[0]->id_transaction);
						$this->add_line('Pelanggan : ' . $transaction[0]->bill_name);
						if ($transaction[0]->payment_status == 'pending'):
						 $this->add_line('Status : Belum dibayar');
						 elseif($transaction[0]->payment_status == 'payed'):
						 $this->add_line('Status : LUNAS');
						 elseif($transaction[0]->payment_status == 'cancel'):
						 $this->add_line('Status : Batal');
						 endif;
						$this->printer->selectPrintMode();
						$this->printer->setJustification(Printer::JUSTIFY_LEFT);
						$this->add_line("------------------------------------------------"); // line
						 foreach ($order as $key):
						 $this->add_line('Nama Produk          : '.$key->nama_product);
						 $this->add_line('Jumlah : '.number_format($key->qty,0,'.','.').' x Rp'.number_format($key->selling_price,0,'.','.'));
						 if ($key->promo_potongan != '0'):
						 $this->add_line('Potongan : '.number_format($key->qty,0,'.','.').' x - Rp.'.number_format($key->promo_potongan,0,'.','.'));
						 endif;
						 endforeach;
						$this->add_line("------------------------------------------------"); // line
					  $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $getMember = $this->CI->GeneralModel->get_by_id_general('tb_member','id_member',$transaction[0]->id_member);
                 if($getMember == TRUE){
                   $getTipeMember = $this->CI->GeneralModel->get_by_id_general('tb_tipe_member','id_tipe_member',$getMember[0]->tipe_member);
                   if($getTipeMember == TRUE){
                     $potongan_member = $getTipeMember[0]->potongan_member;
                     $nama_tipe_member = $getTipeMember[0]->nama_tipe_member.' potongan ('.$potongan_member.'%)';
                     $this->add_line($nama_tipe_member);
                   }
            }
						$this->add_line('TOTAL Rp.'.number_format($transaction[0]->total,0,'.','.'));
						$this->add_line('DIBAYAR Rp.'.number_format($transaction[0]->payment_total,0,'.','.'));
						$this->add_line('KEMBALIAN Rp.'.number_format($transaction[0]->change_money,0,'.','.'));
            $this->add_line('Catatan :'.$transaction[0]->notes);
						$this->printer->selectPrintMode();
						$this->add_line("------------------------------------------------"); // line
                        $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                        $this->printer->selectPrintMode();
						$this->printer->pulse();
                        $this->printer->cut();
                        $this->printer->close();

        $ticket = $this->CI->GeneralModel->get_by_id_general('tb_barcode_order','id_order',$order[0]->id_order);
        foreach($ticket AS $row)
        {
            //--------------------------------- PRINT TULISAN PADA PRODUK TIKET --------------------------------//
            foreach ($order AS $key)
            {
                $product = $this->CI->GeneralModel->get_by_id_general('tb_product','id_product',$key->id_product);
                foreach ($product AS $prd)
                {
                    //--------------------------------- PRINT TULISAN PADA PRODUK TIKET --------------------------------//
                    if($prd->print_ticket_status=='1')
                    {
                        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
                        $logo = EscposImage::load('assets/logo/logo240.png');
                        $this->printer->graphics($logo);
                        $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                        $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                        $this->add_line("Tiket Masuk");
                        // $this->add_line($prd->print_ticket_description);
                        $this->add_line("(".$prd->nama_product.")");
                        $this->printer->selectPrintMode();
                        $this->add_line(date('d-m-Y H:i:s'));
                        $this->add_line('________________________________________________'); // line
                        $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                        $this->add_line("(".$row->id_barcode_order.")");
                        $this->printer->selectPrintMode();
                        // $this->add_line("(".$key->remark.")");
                        // Set to something sensible for the rest of the examples
                        $this->add_line('------------------------------------------------'); // line
                        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
                        $logo = EscposImage::load('assets/logo/logo240.png');
                        $this->printer->graphics($logo);
                        $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                        $this->add_line("Tiket Keluar");
                        $this->printer->selectPrintMode();
                        $this->add_line(date('d-m-Y H:i:s'));
                        $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                        $this->add_line("(".$row->id_barcode_order.")");
                        $this->printer->selectPrintMode();
                        // $this->add_line("(".$key->remark.")");
                        $this->printer->setJustification(Printer::JUSTIFY_LEFT);
                        $this->add_line('________________________________________________'); // line
                        $this->add_line('  Syarat dan ketentuan :');
                        $this->add_line('- Wajib berpakaian renang');
                        $this->add_line('- Dilarang membawa makan/minum dari luar');
                        $this->add_line('- Kendaraan harap dikunci ganda');
                        $this->add_line('- Tas dan barang lain dibawa masuk');
                        $this->add_line('  (Menjadi tanggung jawab pribadi)');
                        $this->add_line('- Segala kehilangan/kerusakan dan');
                        $this->add_line('  kecelakaan diluar tanggung jawab managemen');
                        $this->add_line('________________________________________________'); // line
                        $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
                        $this->add_line('Jangan Sampai Hilang!!!');
                        $this->printer->selectPrintMode();
                        $this->add_line('________________________________________________');
                        $this->add_line('Powered by : medandigitalinnovation.com');
                        $this->add_line('------------------------------------------------');
                        /// Set to something sensible for the rest of the examples
						            $this->printer->pulse();
                        $this->printer->cut();
                        $this->printer->close();
                    }
                }
            }
        }
    }

}
/* End of file production_receipt.php */
/* Location: ./application/libraries/production_receipt.php */
