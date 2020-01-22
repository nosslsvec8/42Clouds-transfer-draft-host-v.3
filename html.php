<?

// find the tag '<img'
function findTagImg($string) {
    $position = stripos($string, '<style');
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

        $string = str_replace($allResultsImgArr[1], "", $string);
        $string = str_replace('<style type="text/css">', "", $string);
        $string = str_replace('<style>', "", $string);
        $string = str_replace('</style>', "", $string);

        echo '<link rel="stylesheet" href="css/bootstrap.min.css">';
        echo "\n";
        echo '<link rel="stylesheet" href="https://ext-dev.42clouds.com/local/templates/42clouds_ru-ru/styles.css">';
        echo "\n";
        echo '<link rel="stylesheet" href="https://ext-dev.42clouds.com/local/templates/42clouds_ru-ru/css/cld-styles.css">';
        echo "\n";
        echo '<link rel="stylesheet" href="css/main.css">';
        echo "\n";
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">';
        echo "\n";
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">';


        echo $string;

        echo "\n";
        echo '<script src="js/jquery.min.js"></script>';
        echo "\n";
        echo '<script src="js/bootstrap.min.js"></script>';
        echo "\n";
        echo '<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>';
        echo "\n";
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>';
        echo "\n";
        echo '<script src="https://ext-dev.42clouds.com/local/templates/42clouds_ru-ru/js/main.js"></script>';
    }
}



if (isset($_POST['action'])) {
    echo main($_POST['action']);
    exit;
}

?>