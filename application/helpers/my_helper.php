<?php
    function formattimestamp($tanggal)
    {
        $pecah = explode(" ", $tanggal);
        return formattanggalstring($pecah[0]) . " Pukul " . $pecah[1];
    }

    function formattanggalstring($tanggal)
    {
        if ($tanggal == "0000-00-00" || $tanggal == "00-00-0000" || $tanggal == "") {
            return "-";
        }
        $pecah = explode("-", $tanggal);
        return $pecah[2] . " " . bulan($pecah[1]) . " " . $pecah[0];
    }

    function bulan($bulan)
    {
        $databulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", 10 => "Oktober", 11 => "November", 12 => "Desember");
        return $databulan[$bulan];
    }

?>