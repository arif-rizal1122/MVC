<?php

class Flasher {
    // menggunakan method static agar tidak perlu melakukan instansiasi

    // pesan isinya berhasil atau tidak
    // aksi ini generic bisa berisi (tambah, ubah, hapus)
    // dari class bootstrap yang mana yang akan kita capai

    public static function setFlash($pesan, $aksi, $type)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'type' => $type
        ];
    }

    

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert"> Data Mahasiswa
              <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
              </div>';

            // flash nya hanya muncul satu kali
              unset($_SESSION['flash']);
        }
    }
}
