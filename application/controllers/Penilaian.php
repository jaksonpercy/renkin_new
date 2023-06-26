<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'Penilaian Strategi Komunikasi Unggulan';
    $this->page_data['page']->menu = 'penilaian';
    // load base_url
  }

  public function index(){
    // load view
    $filtered_get = array_filter($_POST);
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['periodeCount'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ]);
    if(count($this->page_data['periodeCount'])>0){
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
  }
    $this->page_data['user'] = $this->users_model->get();
    if ($this->page_data['roles']->role->role_id == 1) {
        $this->page_data['strakom'] = $this->Strakom_model->getDataByUserId($this->session->userdata('logged')['id']);
    } else {

      $this->page_data['strakom'] = $this->Strakom_model->getListStrakomByStatus("2");

    }

    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);

    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
		$this->page_data['page']->submenu = 'reviewstrakom';

    $this->load->view('penilaian/list', $this->page_data);

  }


  public function view($id){
    // load view
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['user'] = $this->users_model->get();
    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->page_data['strakomList'] = $this->Strakom_model->get();
    $this->page_data['editorialplan'] = $this->Editorial_model->getDataByStrakomId($id);
    $this->page_data['mitigasi'] = $this->Mitigasi_model->getListMitigasiByStrakom($id);
    $this->page_data['penilaian'] = count($this->Penilaian_model->getDataByStrakomIdAndPeriode($id,$this->page_data['periode']->id));

    $this->page_data['penilaianData'] = $this->Penilaian_model->getDataByStrakomIdAndPeriode($id,$this->page_data['periode']->id);
    $this->page_data['datarealisasi'] = $this->Data_Realisasi_model->getListDataRealisasiByStrakomId($id);


    $this->page_data['produkkomunikasi'] = $this->ProdukKomunikasi_model->getByStatusActive(1);
    $this->load->view('penilaian/view', $this->page_data);

  }

  public function download($id=null){
    // load view
    $this->page_data['asisten'] = $this->db->query("select * from tbl_users where skpd_renkin is not null")->result();

    ////////////////////////////////////////////////////////////

    require_once(APPPATH.'libraries/xlsxwriter.class.php');
	  $fname='uploads/penilaian_strakom.xlsx';

    $penilaian = array(
      array("REKAP PENILAIAN STRATEGI KOMUNIKASI RENCANA KINERJA BIDANG PEMERINTAHAN"),
      array(""),
      array(""),
      array("NO.","SKPD/UKPD","Nama Program/Kegiatan Unggulan","Nilai Strakom Unggulan (20%)","Nilai Editorial Plan (20%)","Nilai Uraian Materi Mitigasi Krisis (30%)","Nilai Realisasi (30%)","Total(%)","Keterangan/Catatan")
    );

    foreach ($this->page_data['asisten'] as $row){
      $cekpenilaian = $this->db->query("SELECT * FROM tbl_penilaian inner join tbl_strakom_unggulan on tbl_penilaian.strakom_id=tbl_strakom_unggulan.id inner join opd_upd on tbl_strakom_unggulan.opd_id=opd_upd.id WHERE tbl_penilaian.asisten_id='".$row->id."';")->result();
      if(!empty($id)){
        $cekpenilaian = $this->db->query("SELECT * FROM tbl_penilaian inner join tbl_strakom_unggulan on tbl_penilaian.strakom_id=tbl_strakom_unggulan.id inner join opd_upd on tbl_strakom_unggulan.opd_id=opd_upd.id WHERE tbl_strakom_unggulan.id='".$id."';")->result();
      }
      if(count($cekpenilaian)>0){
        array_push($penilaian,
        array($row->name)
        );
        $no=1;
        foreach($cekpenilaian as $nilai){
          array_push(
            $penilaian,
            array($no,
            $nilai->opd_upd_name,
            $nilai->nama_program,
            $nilai->nilai_strakom,
            $nilai->nilai_editorial,
            $nilai->nilai_mitigasi,
            $nilai->nilai_realisasi,
            $nilai->nilai_strakom+$nilai->nilai_editorial+$nilai->nilai_mitigasi+$nilai->nilai_realisasi,
            $nilai->catatan)
          );
          $no++;
        }
      }
    }

    $writer = new XLSXWriter();
    $styles7 = array( 'border'=>'left,right,top,bottom');

    foreach($penilaian as $row)
	    $writer->writeSheetRow('Rekap Penilaian', $row, $styles7);

      $writer->writeToFile($fname);   // creates XLSX file (in current folder)
      redirect($fname.'?date='.date('Ymdis'));

  }

  public function detaileditorial(){
    // load view
    $this->load->view('penilaian/detail-editorial-plan', $this->page_data);

  }

  public function detailmitigasi(){
    // load view
    $this->load->view('penilaian/detail-mitigasi', $this->page_data);

  }

  public function addNilai(){
    postAllowed();
    $periode = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    // ifPermissions('permissions_add');
    $uuid = uniqid();
    $komponen = $this->input->post('komponen');
    $administratorId = "";
    $asistenId = "";
    $strakom = $this->Strakom_model->getById($this->input->post('strakomId'));
    $this->page_data['user'] = $this->users_model->getById($strakom->user_id);
    $namaOpd = $this->page_data['user']->name;
    $roles = $this->users_model->getById($this->session->userdata('logged')['id']);
    if($roles->role == 2){
      $asistenId = $this->session->userdata('logged')['id'] ;
      if ($komponen == 1) {
      $periode = $this->Penilaian_model->create([
        'id' => $uuid,
        'strakom_id' => $this->input->post('strakomId'),
        'nilai_strakom' => $this->input->post('nilai'),
        'asisten_id' => $asistenId,
        'periode_id' => $periode->id,
        'catatan' => $this->input->post('alasan'),
        'administrator_id' => $administratorId,
        'status' => '2',
      ]);
    } else if($komponen == 2){
      $periode = $this->Penilaian_model->create([
        'id' => $uuid,
        'strakom_id' => $this->input->post('strakomId'),
        'nilai_editorial' => $this->input->post('nilai'),
        'asisten_id' => $asistenId,
        'periode_id' => $periode->id,
        'catatan' => $this->input->post('alasan'),
        'administrator_id' => $administratorId,
        'status' => '2',
      ]);
    } else if($komponen == 3){
      $periode = $this->Penilaian_model->create([
        'id' => $uuid,
        'strakom_id' => $this->input->post('strakomId'),
        'nilai_mitigasi' => $this->input->post('nilai'),
        'asisten_id' => $asistenId,
        'periode_id' => $periode->id,
        'catatan' => $this->input->post('alasan'),
        'administrator_id' => $administratorId,
        'status' => '2',
      ]);
    } else {
      $periode = $this->Penilaian_model->create([
        'id' => $uuid,
        'strakom_id' => $this->input->post('strakomId'),
        'nilai_realisasi' => $this->input->post('nilai'),
        'asisten_id' => $asistenId,
        'periode_id' => $periode->id,
        'catatan' => $this->input->post('alasan'),
        'administrator_id' => $administratorId,
        'status' => '2',
      ]);
    }
    } else if($roles->role == 4){
      $administratorId = $this->session->userdata('logged')['id'] ;
      if ($komponen == 1) {
      $periode = $this->Penilaian_model->create([
        'id' => $uuid,
        'strakom_id' => $this->input->post('strakomId'),
        'nilai_strakom' => $this->input->post('nilai'),
        'asisten_id' => $asistenId,
        'periode_id' => $periode->id,
        'catatan' => $this->input->post('alasan'),
        'administrator_id' => $administratorId,
        'status' => '1',
      ]);
    } else if($komponen == 2){
      $periode = $this->Penilaian_model->create([
        'id' => $uuid,
        'strakom_id' => $this->input->post('strakomId'),
        'nilai_editorial' => $this->input->post('nilai'),
        'asisten_id' => $asistenId,
        'periode_id' => $periode->id,
        'catatan' => $this->input->post('alasan'),
        'administrator_id' => $administratorId,
        'status' => '1',
      ]);
    } else if($komponen == 3){
      $periode = $this->Penilaian_model->create([
        'id' => $uuid,
        'strakom_id' => $this->input->post('strakomId'),
        'nilai_mitigasi' => $this->input->post('nilai'),
        'asisten_id' => $asistenId,
        'periode_id' => $periode->id,
        'catatan' => $this->input->post('alasan'),
        'administrator_id' => $administratorId,
        'status' => '1',
      ]);
    } else {
      $periode = $this->Penilaian_model->create([
        'id' => $uuid,
        'strakom_id' => $this->input->post('strakomId'),
        'nilai_realisasi' => $this->input->post('nilai'),
        'asisten_id' => $asistenId,
        'periode_id' => $periode->id,
        'catatan' => $this->input->post('alasan'),
        'administrator_id' => $administratorId,
        'status' => '1',
      ]);
    }
    }


  if ($komponen == 1) {
    $this->activity_model->add("Data Nilai Strategi Komunikasi Unggulan Telah Dinilai oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Data Nilai Strategi Komunikasi Unggulan Berhasil Dinilai');
    if($roles->role == 2){
    $periode = $this->Notifikasi_model->create([
      'notifikasi_id' => $uuid,
      'judul_notifikasi' => "Strategi Komunikasi Unggulan dengan nama $strakom->nama_program milik SKPD $namaOpd telah dinilai oleh ".logged('name'),
      'user_id' => $strakom->user_id,
      'periode_id' =>  $strakom->periode_id,
      'opd_id' =>  $strakom->opd_id,
    ]);
  }

  redirect('Penilaian/view/'.$this->input->post('strakomId').'#tab_1');


} else if($komponen == 2){
  $this->activity_model->add("Data Nilai Editorial Plan Telah Dinilai oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Data Nilai Editorial Plan Berhasil Dinilai');
  if($roles->role == 2){
  $periode = $this->Notifikasi_model->create([
    'notifikasi_id' => $uuid,
    'judul_notifikasi' => "Editorial Plan dengan nama Strategi Komunikasi Unggulan $strakom->nama_program milik SKPD $namaOpd telah dinilai oleh ".logged('name'),
    'user_id' => $strakom->user_id,
    'periode_id' =>  $strakom->periode_id,
    'opd_id' =>  $strakom->opd_id,
  ]);
}
redirect('Penilaian/view/'.$this->input->post('strakomId').'#tab_2');
} else if($komponen == 3){
  $this->activity_model->add("Data Nilai Uraian Mitigasi Telah Dinilai oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Data Nilai Uraian Mitigasi Berhasil Dinilai');
if($roles->role == 2){
  $periode = $this->Notifikasi_model->create([
    'notifikasi_id' => $uuid,
    'judul_notifikasi' => "Uraian Mitigasi dengan nama Strategi Komunikasi Unggulan $strakom->nama_program milik SKPD $namaOpd telah dinilai oleh ".logged('name'),
    'user_id' => $strakom->user_id,
    'periode_id' =>  $strakom->periode_id,
    'opd_id' =>  $strakom->opd_id,
  ]);
}
redirect('Penilaian/view/'.$this->input->post('strakomId').'#tab_3');
} else {
  $this->activity_model->add("Data Nilai Realisasi Telah Dinilai oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Data Nilai Realisasi Berhasil Dinilai');
if($roles->role == 2){
  $periode = $this->Notifikasi_model->create([
    'notifikasi_id' => $uuid,
    'judul_notifikasi' => "Realisasi dengan nama Strategi Komunikasi Unggulan $strakom->nama_program milik SKPD $namaOpd telah dinilai oleh ".logged('name'),
    'user_id' => $strakom->user_id,
    'periode_id' =>  $strakom->periode_id,
    'opd_id' =>  $strakom->opd_id,
  ]);
}
redirect('Penilaian/view/'.$this->input->post('strakomId').'#tab_4');
}

    // redirect('Penilaian/view/'.$this->input->post('strakomId'));
  }

  public function updateNilai($id){
    postAllowed();
    $periode = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $penilaianData = $this->Penilaian_model->getDataByStrakomIdAndPeriode($this->input->post('strakomId'),$periode->id);

    // ifPermissions('permissions_add');
    $uuid = uniqid();
    $komponen = $this->input->post('komponen');
    $administratorId = "";
    $asistenId = "";
    $strakom = $this->Strakom_model->getById($this->input->post('strakomId'));
    $this->page_data['user'] = $this->users_model->getById($strakom->user_id);
    $namaOpd = $this->page_data['user']->name;
    $roles = $this->users_model->getById($this->session->userdata('logged')['id']);
    $data=array();

    if($roles->role == 2){
      if($penilaianData[0]->asisten_id == $this->session->userdata('logged')['id'] ){
          $asistenId = $penilaianData[0]->asisten_id;
      } else {
          $asistenId = $this->session->userdata('logged')['id'] ;
      }
      if ($komponen == 1) {
        $data = [
          'nilai_strakom'=> $this->input->post('nilai'),
          'catatan' => $this->input->post('alasan'),
          'asisten_id'=> $asistenId,
          'administrator_id' => $administratorId,
          'status' => '2',
    		];
    } else if($komponen == 2){
      $data = [
        'nilai_editorial'=> $this->input->post('nilaiEditorial'),
        'catatan_editorial' => $this->input->post('alasanEditorial'),
        'asisten_id'=> $asistenId,
        'administrator_id' => $administratorId,
        'status' => '2',
      ];
    } else if($komponen == 3){
      $data = [
        'nilai_mitigasi'=> $this->input->post('nilaiMitigasi'),
        'catatan_mitigasi' => $this->input->post('alasanMitigasi'),
        'asisten_id'=> $asistenId,
        'administrator_id' => $administratorId,
        'status' => '2',
      ];
    } else {
      $data = [
        'nilai_realisasi'=> $this->input->post('nilaiRealisasi'),
        'catatan_realisasi' => $this->input->post('alasanRealisasi'),
        'asisten_id'=> $asistenId,
        'administrator_id' => $administratorId,
        'status' => '2',
      ];
    }
    } else if($roles->role == 4){
      if($penilaianData[0]->administrator_id == $this->session->userdata('logged')['id'] ){
          $administratorId = $penilaianData[0]->administrator_id;
      } else {
          $administratorId = $this->session->userdata('logged')['id'] ;
      }

      if ($komponen == 1) {
        $data = [
          'nilai_strakom'=> $this->input->post('nilai'),
          'catatan' => $this->input->post('alasan'),
          'asisten_id'=> $asistenId,
          'administrator_id' => $administratorId,
          'status' => '1'
    		];
    } else if($komponen == 2){
      $data = [
        'nilai_editorial'=> $this->input->post('nilaiEditorial'),
        'catatan_editorial' => $this->input->post('alasanEditorial'),
        'asisten_id'=> $asistenId,
        'administrator_id' => $administratorId,
        'status' => '1',
      ];
    } else if($komponen == 3){
      $data = [
        'nilai_mitigasi'=> $this->input->post('nilaiMitigasi'),
        'catatan_mitigasi' => $this->input->post('alasanMitigasi'),
        'asisten_id'=> $asistenId,
        'administrator_id' => $administratorId,
        'status' => '1',
      ];
    } else {
      $data = [
        'nilai_realisasi'=> $this->input->post('nilaiRealisasi'),
        'catatan_realisasi' => $this->input->post('alasanRealisasi'),
        'asisten_id'=> $asistenId,
        'administrator_id' => $administratorId,
        'status' => '1',
      ];
    }
    }


  $permission = $this->Penilaian_model->update($id, $data);

  if ($komponen == 1) {
    $this->activity_model->add("Data Nilai Strategi Komunikasi Unggulan Telah Diubah oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Data Nilai Strategi Komunikasi Unggulan Berhasil Diubah');
if($roles->role == 2){
    $periode = $this->Notifikasi_model->create([
      'notifikasi_id' => $uuid,
      'judul_notifikasi' => "Strategi Komunikasi Unggulan dengan nama $strakom->nama_program milik SKPD $namaOpd telah dinilai oleh ".logged('name'),
      'user_id' => $strakom->user_id,
      'periode_id' =>  $strakom->periode_id,
      'opd_id' =>  $strakom->opd_id,
    ]);
  }
  redirect('Penilaian/view/'.$this->input->post('strakomId').'#tab_1');
} else if($komponen == 2){
  $this->activity_model->add("Data Nilai Editorial Plan Telah Diubah oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Data Nilai Editorial Plan Berhasil Diubah');
if($roles->role == 2){
  $periode = $this->Notifikasi_model->create([
    'notifikasi_id' => $uuid,
    'judul_notifikasi' => "Editorial Plan dengan nama Strategi Komunikasi Unggulan $strakom->nama_program milik SKPD $namaOpd telah dinilai oleh ".logged('name'),
    'user_id' => $strakom->user_id,
    'periode_id' =>  $strakom->periode_id,
    'opd_id' =>  $strakom->opd_id,
  ]);
}
  redirect('Penilaian/view/'.$this->input->post('strakomId').'#tab_2');
} else if($komponen == 3){
  $this->activity_model->add("Data Nilai Uraian Mitigasi Telah Diubah oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Data Nilai Uraian Mitigasi Berhasil Diubah');
if($roles->role == 2){
  $periode = $this->Notifikasi_model->create([
    'notifikasi_id' => $uuid,
    'judul_notifikasi' => "Uraian Mitigasi dengan nama Strategi Komunikasi Unggulan $strakom->nama_program milik SKPD $namaOpd telah dinilai oleh ".logged('name'),
    'user_id' => $strakom->user_id,
    'periode_id' =>  $strakom->periode_id,
    'opd_id' =>  $strakom->opd_id,
  ]);
}
  redirect('Penilaian/view/'.$this->input->post('strakomId').'#tab_3');
} else {
  $this->activity_model->add("Data Nilai Realisasi Telah Diubah oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Data Nilai Realisasi Berhasil Diubah');
if($roles->role == 2){
  $periode = $this->Notifikasi_model->create([
    'notifikasi_id' => $uuid,
    'judul_notifikasi' => "Realisasi dengan nama Strategi Komunikasi Unggulan $strakom->nama_program milik SKPD $namaOpd telah dinilai oleh ".logged('name'),
    'user_id' => $strakom->user_id,
    'periode_id' =>  $strakom->periode_id,
    'opd_id' =>  $strakom->opd_id,
  ]);
}
  redirect('Penilaian/view/'.$this->input->post('strakomId').'#tab_4');
}


    redirect('Penilaian/view/'.$this->input->post('strakomId'));
  }

  public function delete($id)
  {

    // ifPermissions('users_delete');

    if($id!==1 && $id!=logged($id)){ }else{
      redirect('/','refresh');
      return;
    }

    // $id = $this->users_model->delete($id);
    //
    // $this->activity_model->add("User #$id Deleted by User:".logged('name'));
    //
    // $this->session->set_flashdata('alert-type', 'success');
    // $this->session->set_flashdata('alert', 'User has been Deleted Successfully');
    //
    redirect('penilaian');

  }

}
