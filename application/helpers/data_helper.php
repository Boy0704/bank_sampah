<?php   

function total_penjualan()
{
    $CI =& get_instance();
    $data = $CI->db->query("SELECT SUM(total) AS total_penjualan FROM penjualan  ")->row()->total_penjualan;
    return $data;
}
function total_pembelian()
{
    $CI =& get_instance();
    $data = $CI->db->query("SELECT SUM(total) AS total_pembelian FROM pembelian  ")->row()->total_pembelian;
    return $data;
}

function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array ( 1 =>    'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
            );
            
    $bulan = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
    $split    = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    
    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function total_tabungan($id_user)
{
    $CI =& get_instance();
    $data = $CI->db->query("SELECT SUM(total) AS total_tabungan FROM pembelian WHERE tabungan='ya' AND id_anggota='$id_user'")->row();
    return $data->total_tabungan - total_penarikan($id_user);
}

function total_penarikan($id_user)
{
    $CI =& get_instance();
    $data = $CI->db->query("SELECT SUM(jumlah) AS total_penarikan FROM penarikan WHERE id_anggota='$id_user'")->row();
    return $data->total_penarikan;
}

function ambil_field_tabel($nama_tabel,$primary,$idnya,$nama_field)
{
    $CI =& get_instance();
    $data = $CI->db->get_where($nama_tabel, array($primary=>$idnya))->row_array();
    return $data[$nama_field];
}

function cari_data_perbulan($tabel,$where ,$tahun, $bulan, $nama_field )
{
    $CI =& get_instance();
    $data = $CI->db->query("SELECT $nama_field FROM $tabel where $where like '$tahun-$bulan-%' ")->num_rows();
    return $data;
}



function cek_status($n)
{
    if ($n == '1') {
        echo '<span class="label label-success">Ya</span>';
    } elseif ($n == '0') {
         echo '<span class="label label-danger">Belum</span>';
    }
}

function get_url_youtube($url)
{
    parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
    
    $id=$vars['v'];
    $dt=file_get_contents("http://www.youtube.com/get_video_info?video_id=$id&el=embedded&ps=default&eurl=&gl=US&hl=en");
    //var_dump(explode("&",$dt));
        
        $x=explode("&",$dt);
        $t=array(); $g=array(); $h=array();
        foreach($x as $r){
            $c=explode("=",$r);
            $n=$c[0]; $v=$c[1];
            $y=urldecode($v);
            $t[$n]=$v;
        }
        $streams = explode(',',urldecode($t['url_encoded_fmt_stream_map']));
        foreach($streams as $dt){ 
            $x=explode("&",$dt);
            foreach($x as $r){
                $c=explode("=",$r);
                $n=$c[0]; $v=$c[1];
                $h[$n]=urldecode($v);
            }
            $g[]=$h;
        }
        //echo json_encode($g[0],JSON_PRETTY_PRINT);
       // var_dump( $g[1]["quality"],true);
        return $g[0]["url"];
}



function upload_gambar_biasa($nama_gambar, $lokasi_gambar, $tipe_gambar, $ukuran_gambar, $name_file_form)
{
    $CI =& get_instance();
    $nmfile = $nama_gambar."_".time();
    $config['upload_path'] = './'.$lokasi_gambar;
    $config['allowed_types'] = $tipe_gambar;
    $config['max_size'] = $ukuran_gambar;
    $config['file_name'] = $nmfile;
    // load library upload
    $CI->load->library('upload', $config);
    // upload gambar 1
    $CI->upload->do_upload($name_file_form);
    $result1 = $CI->upload->data();
    $result = array('gambar'=>$result1);
    $dfile = $result['gambar']['file_name'];

    return $dfile;

}


