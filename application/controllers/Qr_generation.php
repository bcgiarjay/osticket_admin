<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr_generation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("QrGeneration_model", "qrgeneration");
        $this->load->library('phpqrcode/qrlib');
    }

    public function index()
    {
        $data = [
            'title'  => 'QR Generation',
            'topics' => $this->qrgeneration->getTopics(),
            'items'  => $this->qrgeneration->getItems(),
        ];
        $this->load->view('template/header',     $data);
        $this->load->view('qr_generation/index', $data);
        $this->load->view('template/footer',     $data);
    }

    public function saveQrCode()
    {
        $action               = $this->input->post("action") ?? null;
        $qrcodeID             = $this->input->post("qrcodeID") ?? null;
        $client               = $this->input->post("client") ?? null;
        $topicID              = $this->input->post("topicID") ?? null;
        $topicName            = $this->input->post("topicName") ?? null;
        $description          = $this->input->post("description") ?? null;
        $datePurchase         = $this->input->post("datePurchase") ?? null;
        $validityDate         = $this->input->post("validityDate") ?? null;
        $systemName           = $this->input->post("systemName") ?? null;
        $subscriptionType     = $this->input->post("subscriptionType") ?? null;
        $ticketCount          = $this->input->post("ticketCount") ?? null;
        $supportCount         = $this->input->post("supportCount") ?? null;
        $subscriptionRenewed  = $this->input->post("subscriptionRenewed") ?? null;
        $noValidityExpiration = $this->input->post('noValidityExpiration') ?? null;
        $noTicketExpiration   = $this->input->post('noTicketExpiration') ?? null;
        $noSupportExpiration  = $this->input->post('noSupportExpiration') ?? null;

        // QR KEY - BLACKCODERS | TOPIC NAME | DATE PURCHASED | VALIDITY DATE | TICKET COUNT | SUPPORT COUNT
        $text = "BLACKCODERS|$topicName|$datePurchase|$validityDate|$ticketCount|$supportCount"; 
        $qrKey = encryptString($text);

        $filename  = $topicName.time().".png";
        $targetDir = "uploads/qrcodes/$filename";
        QRcode::png($qrKey, $targetDir);

        $data = [
            "topicID"              => $topicID,
            "topicName"            => $topicName,
            "description"          => $description,
            "datePurchase"         => $datePurchase,
            "validityDate"         => $validityDate,
            "systemName"           => $systemName,
            "subscriptionType"     => $subscriptionType,
            "ticketCount"          => $ticketCount,
            "supportCount"         => $supportCount,
            "subscriptionRenewed"  => $subscriptionRenewed,
            "filename"             => $filename,
            'qrKey'                => $qrKey,
            "noValidityExpiration" => $noValidityExpiration,
            "noTicketExpiration"   => $noTicketExpiration,
            "noSupportExpiration"  => $noSupportExpiration,
        ];

        $saveQrCode = $this->qrgeneration->saveQrCode($action, $qrcodeID, $data);

        $result = [
            'status' => $saveQrCode ? "true" : "false",
            'id'     => $saveQrCode,
            'data'   => $data,
        ];
        echo json_encode($result);
    }

    public function getTableData()
    {
        $table = $this->input->post('table');
        $columns = $this->input->post('columns');
        $where = $this->input->post('where');
        echo json_encode($this->qrgeneration->getTableData($table, $columns, $where));
    }

}

