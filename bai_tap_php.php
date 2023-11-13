<?php
// Bài tập về nhà môn PHP cơ bản

// Câu 1: Viết chương trình PHP để kiểm tra xem một số có phải là số chẵn hay không.

echo "<b> Câu 1: <br> </b>";
// Hàm kiểm tra số chẵn
function kiemTraSoChan($so) {
    if (is_int($so)) {if ($so % 2 == 0) {
        return "$so là số chẵn.";
    } else {
        return "$so không phải là số chẵn.";
    } }
}

// Gán giá trị và in kết quả
echo kiemTraSoChan(12);
echo "<br> <br>";

// Câu 2: Viết chương trình PHP để tính tổng của các số từ 1 đến n.

echo "<b> Câu 2: <br> </b>";
// Hàm tính tổng của các số từ 1 đến n
function tinhTong($n) {
    return $n*($n+1)/2;
}

// Gán giá trị và in kết quả
$n = 10;
echo "Tổng các số từ 1 đến $n là: " . tinhTong($n);
echo "<br> <br>";

// Câu 3: Viết chương trình PHP để in ra bảng cửu chương từ 1 đến 10.

echo "<b> Câu 3: <br> </b>";
// In ra bảng cửu chương từ 1 đến 10
for ($i=1; $i<=10; $i++) {
    echo "Bảng cửu chương $i: <br>";
    for ($j=1; $j<=10; $j++) {
        $ketQua = $i * $j;
        echo "$i x $j = $ketQua <br>";
    }
    echo "<br>";
}

// Câu 4: Viết chương trình PHP để kiểm tra xem một chuỗi có chứa một từ cụ thể hay không.

echo "<b> Câu 4: <br> </b>";
// Sử dụng hàm strpos
function kiemTraChuoi($chuoi, $tuCanKiemTra) {
    $viTri = strpos ($chuoi, $tuCanKiemTra);

    // Kiểm tra 
    if ($viTri == true) {
        echo "Chuỗi '$chuoi' chứa từ '$tuCanKiemTra'.";
    } else {
        echo "Chuỗi '$chuoi' không chứa từ '$tuCanKiemTra'.";
    }
}

// Gán giá trị và in kết quả
kiemTraChuoi("Bài tập thực hành PHP", "PHP");
echo "<br> <br>";

// Câu 5: Viết chương trình PHP để tìm giá trị lớn nhất và nhỏ nhất trong một mảng.

echo "<b> Câu 5: <br> </b>";
function timGiaTriLonNhat($mang) {
    $giaTriLonNhat = max($mang);
    return $giaTriLonNhat;
}

function timGiaTriNhoNhat($mang) {
    $giaTriNhoNhat = min($mang);
    return $giaTriNhoNhat;
}

// Ví dụ một mảng cụ thể
$mangViDu = array(3, 5, 1, 12, 25, 9);

// Tìm giá trị lớn nhất và nhỏ nhất trong mảng
$max = timGiaTriLonNhat($mangViDu);
$min = timGiaTriNhoNhat($mangViDu);

// In kết quả
echo "Giá trị lớn nhất trong mảng là: " . $max . "<br>";
echo "Giá trị nhỏ nhất trong mảng là: " . $min . "<br> <br>";

// Câu 6: Viết chương trình PHP để sắp xếp một mảng theo thứ tự tăng dần.

echo "<b> Câu 6: <br> </b>";
function sapXepTangDan($mang) {
    if (count($mang) < 2) {
        return $mang;
    } else {
        $giaTri = $mang[0];
        $nhoHon = array();
        $lonHon = array();

        for ($i=1; $i<count($mang); $i++) {
            if ($mang[$i] <= $giaTri) {
                $nhoHon[] = $mang[$i];
            } else {
                $lonHon[] = $mang[$i];
            }
        }
        return array_merge(sapXepTangDan($nhoHon), array($giaTri), sapXepTangDan($lonHon));
    }
}

// Ví dụ mảng cần sắp xếp
$mangCanSapXep = array(10, 2, 6, 3, 15);

// Gọi hàm và in kết quả
$mangSapXep = sapXepTangDan($mangCanSapXep);
echo "Mảng sau khi sắp xếp tăng dần là: [";
echo implode(', ', $mangSapXep);
echo "] <br> <br>";

// Câu 7: Viết chương trình PHP để tính giai thừa của một số nguyên dương.

echo "<b> Câu 7: <br> </b>";
function tinhGiaiThua($x) {
    if ($x < 0 || filter_var($x, FILTER_VALIDATE_INT) === false) {
        return "Vui lòng nhập một số nguyên dương!";
    } elseif ($x == 0 || $x == 1) {
        return 1;
    } else {
        $giaiThua = 1;
        for ($i=2; $i<=$x; $i++) {
            $giaiThua *= $i;
        }
        return $giaiThua;
    }
}

// Gán giá trị và in kết quả
$x = 10;
$ketQua = tinhGiaiThua($x);
echo "Giai thừa của $x là: $ketQua <br> <br>";

// Câu 8: Viết chương trình PHP để tìm số nguyên tố trong một khoảng cho trước.

echo "<b> Câu 8: <br> </b>";
function laSoNguyenTo($so) {
    if ($so <= 1) {
        return false;
    }
    for ($i=2; $i<=sqrt($so); $i++) {
        if ($so % $i == 0) {
            return false;
        }
    }
    return true;
}

function timSoNguyenToTrongKhoang($batDau, $ketThuc) {
    $soNguyenTo = array();
    for ($i=$batDau; $i<=$ketThuc; $i++) {
        if (laSoNguyenTo($i)) {
            $soNguyenTo[] = $i;
        }
    }
    return $soNguyenTo;
}

// Kiểm tra trong khoảng
$batDau = 5;
$ketThuc = 50;
$soNguyenToTrongKhoang = timSoNguyenToTrongKhoang($batDau, $ketThuc);
echo "Các số nguyên tố trong khoảng từ $batDau đến $ketThuc là: " . implode(', ', $soNguyenToTrongKhoang); // Hàm implode để nối các phần tử mảng thành chuỗi
echo "<br> <br>";

// Câu 9: Viết chương trình PHP để tính tổng của các số trong một mảng.

echo "<b> Câu 9: <br> </b>";
// Hàm tính tổng của một mảng
function tinhTongMotMang($mang) {
    $tong = 0;
    foreach ($mang as $so) {
        $tong += $so;
    }
    return $tong;
}

// Mảng với các số cụ thể
$mangSo = array(1, 4, 6, 9, 25);

// In kết quả
$tongCacSo = tinhTongMotMang($mangSo);
echo "Tổng của các số trong mảng là: " . $tongCacSo;
echo "<br> <br>";

// Câu 10: Viết chương trình PHP để in ra các số Fibonacci trong một khoảng cho trước.

echo "<b> Câu 10: <br> </b>";
// Hàm tạo mảng chứa dãy Fibonacci trong khoảng cho trước
function taoDayFibonacci($batDau, $ketThuc) {
    $dayFibonacci = array();
    $soThuNhat = 0;
    $soThuHai = 1;

    while ($soThuNhat <= $ketThuc) {
        if ($soThuNhat >= $batDau) {
            $dayFibonacci[] = $soThuNhat;
        }
        $soThuBa = $soThuNhat + $soThuHai;
        $soThuNhat = $soThuHai;
        $soThuHai = $soThuBa;
    }
    return $dayFibonacci;
}

// Khoảng cho trước
$batDau = 1;
$ketThuc = 50;

// In kết quả
$dayFibonacci = taoDayFibonacci($batDau, $ketThuc);

echo "Các số Fibonacci trong khoảng [$batDau, $ketThuc] là: ";
echo implode(', ', $dayFibonacci);
echo "<br> <br>";

// Câu 11: Viết chương trình PHP để kiểm tra xem một số có phải là số Armstrong hay không.

echo "<b> Câu 11: <br> </b>";
// Hàm kiểm tra xem một số có phải là số Armstrong hay không.
function laSoArmstrong($so) {
    // Chuyển số thành 1 chuỗi để tính độ dài
    $chuoiSo = (string)$so;
    // Lấy số chữ số
    $soChuSo = strlen($chuoiSo);
    // Khởi tạo biến tổng
    $tong = 0;
    // Tính tổng lũy thừa của các chữ số
    for ($i=0; $i<$soChuSo; $i++) {
        $tong += pow((int)$chuoiSo[$i], $soChuSo);
    }

    // Kiểm tra xem tổng có bằng số ban đầu không
    if ($tong == $so) {
        return true;
    } else {
        return false;
    }
}

// Kiểm tra ví dụ
$soCanKiemTra = 371;

if (laSoArmstrong($soCanKiemTra)) {
    echo "$soCanKiemTra là số Armstrong.";
} else {
    echo "$soCanKiemTra không phải là số Armstrong.";
}
echo "<br> <br>";

// Câu 12: Viết chương trình PHP để chèn một phần tử vào một mảng ở vị trí bất kỳ.

echo "<b> Câu 12: <br> </b>";
// Hàm chèn phần tử vào mảng ở vị trí bất kỳ
function chenPhanTu($mang, $phanTu, $viTri) {
    // Kiểm tra xem vị trí chèn có hợp lệ không
    if ($viTri < 0 || $viTri > count($mang)) {
        echo "Vị trí chèn không hợp lệ!";
        return $mang;
    }

    // Chia mảng thành hai phần: phần trước và phần sau vị trí chèn
    $phanTruoc = array_slice($mang, 0, $viTri);
    $phanSau = array_slice($mang, $viTri);

    // Chèn phần tử vào mảng
    $mangKetQua = array_merge($phanTruoc, array($phanTu), $phanSau);
    return $mangKetQua;
}

// Mảng ban đầu
$mangBanDau = array(1, 2, 3, 4, 5);

// Phần tử cần chèn
$phanTuChen = 15;

// Vị trí cần chèn
$viTriChen = 2;

// Gọi hàm và in kết quả
$mangMoi = chenPhanTu($mangBanDau, $phanTuChen, $viTriChen);
echo "Mảng mới sau khi chèn thêm phần tử là: [";
echo implode(', ', $mangMoi);
echo "] <br> <br>";

// Câu 13: Viết chương trình PHP để loại bỏ các phần tử trùng lặp trong một mảng.

echo "<b> Câu 13: <br> </b>";
function loaiPhanTuTrungLap($mang) {
    // Sử dụng hàm array_unique để loại bỏ các phần tử trùng lặp
    $mangKetQua = array_unique($mang);
    return $mangKetQua;
}

// Mảng có phần tử trùng lặp
$mangTest = array(1, 2, 3, 4, 5, 1, 2);

// Gọi hàm và in kết quả
$mangKetQua = loaiPhanTuTrungLap($mangTest);
echo "Mảng mới sau khi loại bỏ các phần tử trùng lặp là: [";
echo implode(', ', $mangKetQua);
echo "] <br> <br>";

// Câu 14: Viết chương trình PHP để tìm vị trí của một phần tử trong một mảng.

echo "<b> Câu 14: <br> </b>";
function timViTriPhanTu($mang, $phanTuCanTim) {
    // Sử dụng hàm array_search để tìm vị trí của phần tử trong mảng
    $viTri = array_search($phanTuCanTim, $mang);
    if ($viTri == true) {
        return "Vị trí của phần tử $phanTuCanTim trong mảng là: $viTri.";
    } else {
        return "Phần tử $phanTuCanTim không có trong mảng.";
    }
}

// Mảng để tìm kiếm
$mangTimKiem = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
// Phần tử cần tìm vị trí
$phanTuCanTim = 10;

// Gọi hàm và in kết quả
$ketQua = timViTriPhanTu($mangTimKiem, $phanTuCanTim);
echo $ketQua;
echo "<br> <br>";

// Câu 15: Viết chương trình PHP để đảo ngược một chuỗi.

echo "<b> Câu 15: <br> </b>";
function daoNguocChuoi($chuoi) {
    $daoNguoc = strrev($chuoi);
    return $daoNguoc;
}

// Gán giá trị và in kết quả
$chuoi = 'Hello World!';
$daoNguoc = daoNguocChuoi($chuoi);
echo "Chuỗi ký tự đảo ngược là: '$daoNguoc'";
echo "<br> <br>";

// Câu 16: Viết chương trình PHP để tính số lượng phần tử trong một mảng.

echo "<b> Câu 16: <br> </b>";
function tinhSoLuongPhanTu($mang) {
    $soLuong = count($mang);
    return $soLuong;
}

// Mảng ví dụ
$mangCanTinh = array(2, 5, 7, 9, 12, 15);

// Gọi hàm và in kết quả
$ketQua = tinhSoLuongPhanTu($mangCanTinh);
echo "Số lượng phần tử trong mảng là: " . $ketQua;
echo "<br> <br>";

// Câu 17: Viết chương trình PHP để kiểm tra xem một chuỗi có phải là chuỗi Palindrome hay không.

echo "<b> Câu 17: <br> </b>";
function laChuoiPalindmore($chuoi) {
    // Chuyển chuỗi về chữ thường để kiểm tra không phân biệt chữ hoa chữ thường
    $chuoi = mb_strtolower($chuoi, 'UTF-8');
    // Loại bỏ các ký tự không phải chữ cái hoặc số
    $chuoi = preg_replace('/[^a-z0-9]/', '', $chuoi);
    // Đảo ngược chuỗi
    $daoNguoc = strrev($chuoi);
    return ($chuoi == $daoNguoc);
}

// Kiểm tra chuỗi cụ thể
$chuoiCanKiemTra = "Now, sir, a war is won!";
if (laChuoiPalindmore($chuoiCanKiemTra)) {
    echo "Chuỗi này là chuỗi Palindmore.";
} else {
    echo "Chuỗi này không phải là chuỗi Palindmore.";
}
echo "<br> <br>";

// Câu 18: Viết chương trình PHP để đếm số lần xuất hiện của một phần tử trong một mảng.

echo "<b> Câu 18: <br> </b>";
function demSoLanXuatHien($mang, $phanTuCanDem) {
    $soLanXuatHien = 0;
    foreach ($mang as $phanTu) {
        if ($phanTu == $phanTuCanDem) {
            $soLanXuatHien++;
        }
    }
    return $soLanXuatHien;
}

// Mảng cần kiểm tra
$mangKiemTra = array(1, 2, 3, 4, 5, 1, 6, 7, 1, 8);
// Phần tử cần đếm
$phanTuCanDem = 1;

// Gọi hàm và in kết quả
$soLanXuatHien = demSoLanXuatHien($mangKiemTra, $phanTuCanDem);
echo "Phần tử $phanTuCanDem xuất hiện $soLanXuatHien lần trong mảng.";
echo "<br> <br>";

// Câu 19: Viết chương trình PHP để sắp xếp một mảng theo thứ tự giảm dần.

echo "<b> Câu 19: <br> </b>";
function sapXepGiamDan($mang) {
    $soPhanTu = count($mang);

    for ($i = 0; $i < $soPhanTu-1; $i++) {
        for ($j = $i+1; $j < $soPhanTu; $j++) {
            if ($mang[$i] < $mang[$j]) {
                // Hoán đổi giá trị của hai phần tử
                $giaTri = $mang[$i];
                $mang[$i] = $mang[$j];
                $mang[$j] = $giaTri;
            }
        }
    }
    return $mang;
}

// Mảng cần sắp xếp
$mangVD = array(5, 3, 9, 6, 2, 10);

// Gọi hàm và in kết quả
$mangDaSapXep = sapXepGiamDan($mangVD);
echo "Mảng sau khi sắp xếp giảm dần là: [";
echo implode(', ', $mangDaSapXep);
echo "] <br> <br>";

// Câu 20: Viết chương trình PHP để thêm một phần tử vào đầu hoặc cuối của một mảng.

echo "<b> Câu 20: <br> </b>";
// Hàm để thêm một phần tử vào đầu mảng
function themPhanTuVaoDau($mang, $phanTu) {
    array_unshift($mang, $phanTu);
    return $mang;
}

// Hàm để thêm một phần tử vào cuối mảng
function themPhanTuVaoCuoi($mang, $phanTu) {
    array_push($mang, $phanTu);
    return $mang;
}

// Mảng muốn thêm phần tử
$mangThemPhanTu = array(1, 2, 3, 4);

// Thêm phần tử vào đầu và cuối mảng
$mangThemPhanTu = themPhanTuVaoDau($mangThemPhanTu, 0);
$mangThemPhanTu = themPhanTuVaoCuoi($mangThemPhanTu, 5);

// In kết quả
echo "Mảng sau khi thêm phần tử là: [";
echo implode(', ', $mangThemPhanTu);
echo "] <br> <br>";

// Câu 21: Viết chương trình PHP để tìm số lớn thứ hai trong một mảng.

echo "<b> Câu 21: <br> </b>";
function timSoLonThuHai($mang) {
    $soLonNhat = $soLonThuHai = PHP_INT_MIN;

    foreach ($mang as $so) {
        if ($so > $soLonNhat) {
            $soLonThuHai = $soLonNhat;
            $soLonNhat = $so;
        } elseif ($so > $soLonThuHai && $so < $soLonNhat) {
            $soLonThuHai = $so;
        }
    }
    return $soLonThuHai;
}

// Mảng ví dụ
$mangCanTim = array(20, 15, 10, 25, 40);

// Gọi hàm và in kết quả
$soLonThuHai = timSoLonThuHai($mangCanTim);
echo "Số lớn thứ hai trong mảng là: $soLonThuHai";
echo "<br> <br>";

// Câu 22: Viết chương trình PHP để tìm ước số chung lớn nhất và bội số chung nhỏ nhất của hai số nguyên dương.

echo "<b> Câu 22: <br> </b>";
// Hàm kiểm tra số nguyên dương
function kiemTraSoNguyenDuong($so) {
    return is_int($so) && $so > 0;
}

// Hàm tìm ước số chung lớn nhất của hai số nguyên dương
function timUSCLN($a, $b) {
    while ($b != 0) {
        $giaTri = $a % $b;
        $a = $b;
        $b = $giaTri;
    }
    return $a;
}

// Hàm tìm bội số chung nhỏ nhất của hai số nguyên dương
function timBSCNN($a, $b) {
    return ($a * $b) / timUSCLN($a, $b);
}

// Gán giá trị và kiểm tra kết quả
$so1 = 24;
$so2 = 36;
if (kiemTraSoNguyenDuong($so1) && kiemTraSoNguyenDuong($so2)) {
    $uscln = timUSCLN($so1, $so2);
    $bscnn = timBSCNN($so1, $so2);
    echo "Ước số chung lớn nhât của $so1 và $so2 là: $uscln <br>";
    echo "Bội số chung nhỏ nhất của $so1 và $so2 là: $bscnn";
} else {
    echo "Hai số trên không thỏa mãn!";
} 
echo "<br> <br>";

// Câu 23: Viết chương trình PHP để kiểm tra xem một số có phải là số hoàn hảo hay không.

echo "<b> Câu 23: <br> </b>";
function kiemTraSoHoanHao($so) {
    $tongUoc = 0;
    for ($i=1; $i<=$so/2; $i++) {
        if ($so % $i == 0) {
            $tongUoc += $i;
        }
    }
    if ($tongUoc == $so) {
        return true;
    } else {
        return false;
    }
}

// Kiểm tra số hoàn hảo
$soCanKT = 28;
if (kiemTraSoHoanHao($soCanKT)) {
    echo "$soCanKT là số hoàn hảo.";
} else {
    echo "$soCanKT không phải là số hoàn hảo.";
} 
echo "<br> <br>";

// Câu 24: Viết chương trình PHP để tìm số lẻ lớn nhất trong một mảng.

echo "<b> Câu 24: <br> </b>";
function timSoLeLonNhat($mang) {
    $soLeLonNhat = null;
    foreach ($mang as $so) {
        if ($so % 2 != 0 && ($soLeLonNhat === null || $so > $soLeLonNhat)) {
            $soLeLonNhat = $so;
        }
    }
    return $soLeLonNhat;
}

// Mảng ví dụ
$mangKT = array(0, 2, 3, 7, 11, 15, 8, 20);

// Gọi hàm và kiểm tra kết quả
$soLeLonNhat = timSoLelonNhat($mangKT);
if ($soLeLonNhat) {
    echo "$soLeLonNhat là số lẻ lớn nhất trong mảng.";
} else {
    echo "Không có số lẻ trong mảng.";
}
echo "<br> <br>";

// Câu 25: Viết chương trình PHP để kiểm tra xem một số có phải là số nguyên tố hay không.

echo "<b> Câu 25: <br> </b>";
function kiemTraSoNguyenTo($so) {
    if ($so <= 1) {
        return false;
    }
    for ($i=2; $i<=sqrt($so); $i++) {
        if ($so % $i == 0) {
            return false;
        }
    }
    return true;
}

// Gán giá trị và in kết quả
$soMuonKT = 19;
if (kiemTraSoNguyenTo($soMuonKT)) {
    echo "$soMuonKT là số nguyên tố.";
} else {
    echo "$soMuonKT không phải là số nguyên tố.";
}
echo "<br> <br>";

// Câu 26: Viết chương trình PHP để tìm số dương lớn nhất trong một mảng.

echo "<b> Câu 26: <br> </b>";
function timSoDuongLonNhat($mang) {
    $soDuongLonNhat = null;
    foreach ($mang as $so) {
        if ($so > 0 && ($soDuongLonNhat === null || $so > $soDuongLonNhat)) {
            $soDuongLonNhat = $so;
        }
    }
    return $soDuongLonNhat;
}

// Mảng ví dụ
$mangTimSoDuong = array(3, -5, 7, -10, 0, 4, 1);

// Gọi hàm và in kết quả
$ketQua = timSoDuongLonNhat($mangTimSoDuong);
if ($ketQua !== null) {
    echo "Số dương lớn nhất trong mảng là: $ketQua.";
} else {
    echo "Không có số dương nào trong mảng.";
}
echo "<br> <br>";

// Câu 27: Viết chương trình PHP để tìm số âm lớn nhất trong một mảng.

echo "<b> Câu 27: <br> </b>";
function timSoAmLonNhat($mang) {
    $soAmLonNhat = null;
    foreach ($mang as $so) {
        if ($so < 0 && ($soAmLonNhat === null || $so > $soAmLonNhat)) {
            $soAmLonNhat = $so;
        }
    }
    return $soAmLonNhat;
}

// Mảng ví dụ
$mangTimSoAm = array(-3, 0, 2, 18, -9, -25);

// Gọi hàm và in kết quả
$ketQua = timSoAmLonNhat($mangTimSoAm);
if ($ketQua !== null) {
    echo "Số âm lớn nhất trong mảng là: $ketQua.";
} else {
    echo "Không có số âm trong mảng.";
}
echo "<br> <br>";

// Câu 28: Viết chương trình PHP để tính tổng các số lẻ từ 1 đến n.

echo "<b> Câu 28: <br> </b>";
function tinhTongSoLe($n) {
    $tong = 0;
    for ($i=1; $i<=$n; $i++) {
        if ($i % 2 !== 0) {
            $tong += $i;
        }
    }
    return $tong;
}

// Gán giá trị và in kết quả
$n = 10;
$ketQua = tinhTongSoLe($n);
echo "Tổng các số lẻ từ 1 đến $n là: $ketQua";
echo "<br> <br>";

// Câu 29: Viết chương trình PHP để tìm số chính phương trong một khoảng cho trước.

echo "<b> Câu 29: <br> </b>";
function timSoChinhPhuong($batDau, $ketThuc) {
    echo "Các số chính phương trong khoảng từ $batDau đến $ketThuc là: <br>";
    for ($i = $batDau; $i <= $ketThuc; $i++) {
        $canBacHai = sqrt($i);
        if ($canBacHai == (int)$canBacHai) {
            echo "$i <br>";
        }
    }
}

// Sử dụng hàm để tìm số chính phương trong khoảng từ 1 đến 100
timSoChinhPhuong(1, 50);
echo "<br>";

// Câu 30: Viết chương trình PHP để kiểm tra xem một chuỗi có phải là chuỗi con của một chuỗi khác hay không.

echo "<b> Câu 30: <br> </b>";
function kiemTraChuoiCon($chuoiCon, $chuoiCha) {
    $doDaiChuoiCon = strlen($chuoiCon);
    $doDaiChuoiCha = strlen($chuoiCha);
    for ($i = 0; $i <= $doDaiChuoiCha - $doDaiChuoiCon; $i++) {
        $j = 0;
        while ($j < $doDaiChuoiCon && $chuoiCha[$i + $j] == $chuoiCon[$j]) {
            $j++;
        }
        if ($j == $doDaiChuoiCon) {
            return true;
        }
    }
    return false;
}

// Kiểm tra chuỗi con và in kết quả
$chuoiCha = "Hoàng Thị Quỳnh Nga - K57SD2";
$chuoiCon = "Nga - K57SD2";
if (kiemTraChuoiCon($chuoiCon, $chuoiCha)) {
    echo "'$chuoiCon' là chuỗi con của '$chuoiCha'.";
} else {
    echo "'$chuoiCon' không phải là chuỗi con của '$chuoiCha'.";
}

?>