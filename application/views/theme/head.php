<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi PPDB Online Lembaga Pendidikan Al Amien">
    <meta name="author" content="Mukhammad Yasin">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>
        <?php
        $cek_uri2 = $this->uri->segment(2);
        $cek_uri1 = $this->uri->segment(1);
        if ($cek_uri2 == 'bukti') {
            echo 'Cetak Bukti - ' . $data->nama;
        } else {
            echo 'PPDB Online - ' . $cek_uri1;
        }; ?>

    </title>
    <link rel="shortcut icon" href="<?php echo base_url('') ?>asset/dist/img/logo.png" type="image/x-icon">
    <!-- Font Awesome Icons -->