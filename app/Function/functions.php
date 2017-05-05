<?php
function changeTitle($str, $strSymbol = '-', $case = MB_CASE_LOWER)
{
    $str = trim($str);
    if ($str == "") return "";
    $str = str_replace('"', '', $str);
    $str = str_replace("'", '', $str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str, $case, 'utf-8');
    $str = preg_replace('/[\W|_]+/', $strSymbol, $str);
    return $str;

}

function stripUnicode($str)
{

    if (empty($str))

        return false;

    $unicode = array(

        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

        'd' => 'đ',

        'D' => 'Đ',

        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

        'i' => 'í|ì|ỉ|ĩ|ị',

        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

    );

    foreach ($unicode as $nonUnicode => $uni)

        $str = preg_replace("/($uni)/i", $nonUnicode, $str);

    return $str;

}

    function cutword($str, $number)
    {
        $cut = "";
        $arr = explode(" ", str_replace(",", ", ", $str));
        if (count($arr) < 9){
//            var_dump(count($arr));die;
            $cut = $str;
            return $cut;
        }else {
            for ($i = 0; $i < $number; $i++) {
                $cut .= $arr[$i] . " ";
            }
            return $cut . "...";
        }


    }

//echo stripUnicode('Hàm php chuyển chuỗi tiếng Việt có dấu ra tiếng Việt không dấu');

//ket quả là: Ham php chuyen chuoi tieng Viet co dau ra tieng Viet khong dau

?>