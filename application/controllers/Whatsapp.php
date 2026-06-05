<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp extends CI_Controller {

    public function kirim_notifikasi($id)
    {
        $this->db->select('
            peminjaman.*,
            anggota.Nama,
            anggota.Telepon
        ');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.Nomor_anggota = peminjaman.anggota_id');
        $this->db->where('peminjaman.id', $id);

        $d = $this->db->get()->row();

        if (!$d) {
            show_404();
        }

        $today = date('Y-m-d');

        $selisih = strtotime($today) - strtotime($d->tanggal_jatuh_tempo);

        $terlambat = $selisih > 0 ? floor($selisih / 86400) : 0;

        if ($terlambat > 0) {

            $target = preg_replace('/[^0-9]/', '', $d->Telepon);

            if (substr($target, 0, 1) == '0') {
                $target = '62' . substr($target, 1);
            }

            $pesan =
                "Halo " . $d->Nama . ", " .
                "Anda terlambat mengembalikan buku selama " .
                $terlambat . " hari. " .
                "Mohon segera dikembalikan ke perpustakaan.";

            $response = $this->kirim_wa($target, $pesan);

            $result = json_decode($response, true);

            if (isset($result['status']) && $result['status'] == true) {
                $this->session->set_flashdata(
                    'success',
                    'Notifikasi WA berhasil dikirim'
                );
            } else {
                $this->session->set_flashdata(
                    'error',
                    'Notifikasi WA gagal dikirim: ' . $response
                );
            }

        } else {
            $this->session->set_flashdata(
                'error',
                'Anggota belum terlambat'
            );
        }

        redirect('peminjaman');
    }

    private function kirim_wa($target, $message)
{
    $token = "NBeNDoWoWsTyjAYR1ADw";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
            'target' => $target,
            'message' => $message
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . $token
        ),

        // Tambahkan ini untuk XAMPP localhost
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        $response = json_encode(array(
            'status' => false,
            'reason' => curl_error($curl)
        ));
    }

    curl_close($curl);

    return $response;
}
}