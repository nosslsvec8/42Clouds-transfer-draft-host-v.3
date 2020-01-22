<?

// find the tag '<img'
function findTagImg($string) {
    // $position = stripos($string, '<style type="text/css"');
    $position = stripos($string, '<style');
    // if($position == null){ 
    //    $position = stripos($string, '<styl'); 
    // }
    $string = substr($string, $position);
    if($position === FALSE){ $string = ''; }
    return $string;
}

// next, find the attribyte 'src="'
function findAtrrSrc($string) {
    $position2 = stripos($string, '>');
    $string = substr($string, $position2+1);
    return $string;
}


function main($string){
    $code = $string;

    $allResultsImgArr[] = "";
    $resultsImgArr[] = "";

    // find css
    if( isset($code) ){
        while ($code !== ''){
            $code = findTagImg($code);
            $code = findAtrrSrc($code);
            $position3 = stripos($code, '</style>');
            if ($position3 !== false) {
                $index = count($allResultsImgArr);
                $allResultsImgArr[$index] = mb_strimwidth($code, 0, $position3, "");
            }
            $code = substr($code, $position3);
        }
    }

    echo "$allResultsImgArr[1]";
}


if (isset($_POST['action'])) {
    echo main($_POST['action']);
    exit;
}

?>