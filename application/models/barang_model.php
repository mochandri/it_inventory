<?php
class barang_model extends ci_model{

    function data()
    {
        $this->db->order_by('id_barang','DESC');
        return $query = $this->db->get('barang');
    }

    // public function dataJoin()
    // {
    //   $this->db->select('*');
    //   $this->db->from('barang as b');
    //   $this->db->join('jenis as j', 'j.id_jenis = b.id_jenis');
    //   $this->db->join('satuan as s', 's.id_satuan = b.id_satuan');

    //   $this->db->order_by('b.id_barang','DESC');
    //   return $query = $this->db->get();
    // }

    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('barang as b');
      $this->db->join('cabang as c', 'c.id_cabang = b.id_cabang');
      $this->db->order_by('b.id_barang', 'DESC');
      return $query = $this->db->get();
    }

    public function totalStok()
    {
      $data=$this->db
    ->select_sum('stok')
    ->from('barang')
    ->get();
      $stok = $data->row();
      return $stok->stok;
    }

    public function transaksiTerakhir()
    {
      $this->db->select('*');
      $this->db->from('barang as b');
      $this->db->order_by('b.id_barang','DESC');
      $this->db->limit(5);
      return $query = $this->db->get();
    }

    public function detail_join($where)
    
      {
        $this->db->select('*');
        $this->db->from('barang as b');
        // $this->db->join('cabang as c', 'c.id_cabang = b.id_cabang');
        $this->db->where('b.id_barang', $where);
        $this->db->order_by('b.id_barang', 'DESC');
        return $query = $this->db->get();
      }

    public function dataJoinLike($tahun)
    {
      $this->db->select('*');
      $this->db->from('barang as b');
    
      $this->db->join('cabang as c', 'c.id_cabang = b.id_cabang');
  
      $this->db->like('b.tgl_keluar', $tahun);
      $this->db->order_by('b.id_barang', 'DESC');
      return $query = $this->db->get();
    }

    public function ambilFoto($where)
    {
      $this->db->order_by('id_barang','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('barang', $where);   
      
      $data = $query->row();
      $foto= $data->foto;
      
      return $foto;
    }

    public function ambil_stok($where){
      $this->db->order_by('id_barang','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('barang',$where);
      $data = $query->row();
      $stok = $data->stok;
      return $stok;
    }

    public function ambilId($table, $where)
   {
       return $this->db->get_where($table, $where);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }


    public function detail_data($where, $table)
    {
       return $this->db->get_where($table,$where);
    }

    public function tambah_data($data, $table)
    {
       $this->db->insert($table, $data);
    }

    public function ubah_data($where, $data, $table)
    {
       $this->db->where($where);
       $this->db->update($table, $data);

    }


    public function buat_kode()   {
		  $this->db->select('RIGHT(barang.id_barang,4) as kode', FALSE);
		  $this->db->order_by('id_barang','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('barang');      //cek dulu apakah ada sudah ada kode di tabel.
		  if($query->num_rows() <> 0){
		   //jika kode ternyata sudah ada.
		   $data = $query->row();
		   $kode = intval($data->kode) + 1;
		  }
		  else {
		   //jika kode belum ada
		   $kode = 1;
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
      $tgl = date("d-m-y");
		  $kodejadi = "BRG-".$kodemax; 

		  return $kodejadi;

	}

  public function ubah_aktif(){
    $this->db->select('RIGHT(barang.id,4) as status', FALSE);
    $this->db->order_by('status','DESC');
		$this->db->limit(1);

    $statusAktif = "Aktif";

    return $statusAktif;
  }

  function lapdata($tglAwal, $tglAkhir)
  {
    $this->db->select('*');
    $this->db->from('barang as b');
    $this->db->where('b.tgl_keluar >=', $tglAwal);
    $this->db->where('b.tgl_keluar <=', $tglAkhir);
    return $query = $this->db->get();
  }


  public function get_cabang(){
		$query = $this->db->get('cabang');
		return $query->result_array();
	}

  public function auto_code($a){
    $query = $this->db->query("SELECT MAX(id_barang) as max_code FROM barang WHERE id_cabang='$a'");
		return $query->row_array();
  }

  public function get_inisial($a){
    $query = $this->db->get_where('cabang', ['id_cabang' =>  $a]);
    return $query->row_array();
  }

//   public function buat_id(){
  
// $a = $kode['max_code'];
// $b = $in['no'];
// $c = $in['id_cabang'];
// $hari = date('y');
// $urutan = (int)substr($a, 4, 4);
// $urutan++;

// $kd = $b . "/" . $hari . sprintf("%04s", $urutan);
// var_dump($kd);
// die;


//   }

public function plus(){
  $id = $this->input->post('id');
  
}

}


