<?

// find the tag '<img'
function findTagImg($string) {
    $position = stripos($string, "<img");
    $string = substr($string, $position);
    if($position === FALSE){ $string = ''; }
    return $string;
}

// next, find the attribyte 'src="'
function findAtrrSrc($string) {
    $position2 = stripos($string, 'src="');
    $string = substr($string, $position2+5);
    return $string;
}

// find the tag 'url("'
function findUrl($string) {
    $position2 = stripos($string, 'url(');
    $string = substr($string, $position2+4);
    if($position2 === FALSE){ $string = ''; }
    return $string;
}
 
function isCheckRepeat(Array $arr, $string) {
    foreach ($arr as $key => $value) {
        if($string == $value){
            return $key;
        }
    }
    return 0;
}


function main($string){
    $html = $string;
    $copy = $html;
    $copy2 = $html;

    $allResultsImgArr[] = "";
    $resultsImgArr[] = "";
    $processedImgArr[] = "";

    $allResultsBgArr[] = "";
    $resultsBgArr[] = "";
    $processedBgArr[] = "";

    // find img
    if( isset($copy) ){
        while ($copy !== ''){
            $copy = findTagImg($copy);
            $copy = findAtrrSrc($copy);
            $position3 = stripos($copy, '"');
            if ($position3 !== false) {
                $index = count($allResultsImgArr);
                $allResultsImgArr[$index] = mb_strimwidth($copy, 0, $position3, "");
            }
            $copy = substr($copy, $position3);
        }

        for($i = 0; $i < count($allResultsImgArr); $i++) {
            $index = isCheckRepeat($resultsImgArr, $allResultsImgArr[$i]);
            if( $index ){
            } else{
                if($allResultsImgArr[$i] !== "") {
                    $resultsImgArr[count($resultsImgArr)] = $allResultsImgArr[$i];
                }
            }
        }

        for($i = 1; $i < count($resultsImgArr); $i++){
            // $processedImgArr[$i] = "https://ext-dev.42clouds.com$resultsImgArr[$i]";
            $processedImgArr[$i] = "$resultsImgArr[$i]";
        }

        for($i = 1; $i < count($processedImgArr); $i++){
            $html = str_replace($resultsImgArr[$i], $processedImgArr[$i], $html);
        }
    }

    // find bg
    if( isset($copy2) ){

        while ($copy2 !== ''){
            $copy2 = findUrl($copy2);
            $position3 = stripos($copy2, ')');
            if ($position3 !== false) {
                $index = count($allResultsBgArr);
                $allResultsBgArr[$index] = mb_strimwidth($copy2, 0, $position3, "");
            }
            $copy2 = substr($copy2, $position3);
        }

        for($i = 0; $i < count($allResultsBgArr); $i++) {
            $index = isCheckRepeat($resultsBgArr, $allResultsBgArr[$i]);
            if( $index ){
            } else{
                if($allResultsBgArr[$i] !== "") {
                    $resultsBgArr[count($resultsBgArr)] = $allResultsBgArr[$i];
                }
            }
        }

        for($i = 1; $i < count($resultsBgArr); $i++){
            // $processedBgArr[$i] = "https://ext-dev.42clouds.com$resultsBgArr[$i]";
            $processedBgArr[$i] = "$resultsBgArr[$i]";
        }

        for($i = 1; $i < count($processedBgArr); $i++){
            $html = str_replace($resultsBgArr[$i], $processedBgArr[$i], $html);
        }
    }

    $html = trim($html);
    echo "$html";
}



if (isset($_POST['action'])) {
    echo main($_POST['action']);
    exit;
}

?>