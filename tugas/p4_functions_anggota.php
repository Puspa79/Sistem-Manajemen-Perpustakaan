<?php
// 1. Hitung total anggota
function hitung_total_anggota($anggota_list) {
    return count($anggota_list);
}

// 2. Hitung anggota aktif
function hitung_anggota_aktif($anggota_list) {
    $count = 0;
    foreach ($anggota_list as $a) {
        if ($a['status'] === 'Aktif') {
            $count++;
        }
    }
    return $count;
}

// 3. Hitung rata-rata pinjaman
function hitung_rata_rata_pinjaman($anggota_list) {
    $total = 0;
    foreach ($anggota_list as $a) {
        $total += $a['total_pinjaman'];
    }
    return count($anggota_list) > 0 ? round($total / count($anggota_list)) : 0;
}

// 4. Cari anggota berdasarkan ID
function cari_anggota_by_id($anggota_list, $id) {
    foreach ($anggota_list as $a) {
        if ($a['id'] === $id) {
            return $a;
        }
    }
    return null;
}

// 5. Cari anggota teraktif
function cari_anggota_teraktif($anggota_list) {
    $teraktif = $anggota_list[0];
    foreach ($anggota_list as $a) {
        if ($a['total_pinjaman'] > $teraktif['total_pinjaman']) {
            $teraktif = $a;
        }
    }
    return $teraktif;
}

// 6. Filter anggota berdasarkan status
function filter_by_status($anggota_list, $status) {
    return array_filter($anggota_list, function ($a) use ($status) {
        return $a['status'] === $status;
    });
}

// 7. Validasi email
function validasi_email($email) {
    if (empty($email)) return false;
    if (!str_contains($email, '@')) return false;
    if (!str_contains($email, '.')) return false;
    return true;
}

// 8. Format tanggal Indonesia
function format_tanggal_indo($tanggal) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    $exp = explode('-', $tanggal);
    return $exp[2] . ' ' . $bulan[(int)$exp[1]] . ' ' . $exp[0];
}

/* ================= BONUS ================= */

// 9. Sort anggota by nama (A-Z)
function sort_anggota_by_nama($anggota_list) {
    usort($anggota_list, function ($a, $b) {
        return strcmp($a['nama'], $b['nama']);
    });
    return $anggota_list;
}

// 10. Search anggota by nama (partial match)
function search_anggota_by_nama($anggota_list, $keyword) {
    return array_filter($anggota_list, function ($a) use ($keyword) {
        return stripos($a['nama'], $keyword) !== false;
    });
}