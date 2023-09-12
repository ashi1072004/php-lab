<?php

// $data_string = array();
// $curl = curl_init();
// $test = http_build_query($data_string);
// curl_setopt_array($curl, array(
// CURLOPT_URL => 'https://www.prevalent.net/',
// CURLOPT_POSTFIELDS => $test,
// CURLOPT_RETURNTRANSFER => true,
// CURLOPT_ENCODING => '',
// CURLOPT_MAXREDIRS => 10,
// CURLOPT_TIMEOUT => 0,
// CURLOPT_FOLLOWLOCATION => true,
// CURLOPT_USERAGENT => 'MyAgent/1.0',
// CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// CURLOPT_CUSTOMREQUEST => 'POST',
// ));
// $response = curl_exec($curl);
// curl_close($curl);
// echo $response;

$urls = array('https://www.180smoke.ca/', 'https://www.prevalent.net/', 'https://www.socialmediacalendar.co/', 'https://figbytes.com/', 'https://blog.feedspot.com/mobile_blogs/', 'https://feedly.com/i/top/mobile-blogs/', 'https://www.fonearena.com/blog/', 'https://www.businessprotech.com/category/tech/mobile-phones/');
foreach($urls as $url){
    $curl_handle=curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36'); // Set a user agent header to mimic a browser);
    $html = curl_exec($curl_handle);
    if(curl_errno($curl_handle)) {
        // $error = curl_error($curl_handle);
        echo "\nError Loading HTML\n";
        echo $url;
        curl_close($curl_handle);
        continue;
    }
    // Check if the HTML content is empty
    if (empty($html)) {
        echo "\nEmpty HTML content.\n";
        echo $url;
        curl_close($curl_handle);
        continue;
    }
    curl_close($curl_handle);

    $dom = new DOMDocument;
    libxml_use_internal_errors(true); // Disable libxml errors and warnings
    $dom->loadHTML($html);
    libxml_clear_errors(); // Disable libxml errors and warnings
    $xpath = new DOMXPath($dom);
    $facebookLink = $xpath->query('//a[contains(@href, "facebook.com")]');
    if ($facebookLink->length > 0) {
        $facebookPage =  $facebookLink[0]->getAttribute('href');
        $line = "\n$url, $facebookPage\n";
        echo $line;
    }else{
        echo "\n$url";
    }
}

// function get_fcontent( $url,  $javascript_loop = 0, $timeout = 5 ) {
//     $url = str_replace( "&amp;", "&", urldecode(trim($url)) );

//     $cookie = tempnam ("/tmp", "CURLCOOKIE");
//     $ch = curl_init();
//     curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
//     curl_setopt( $ch, CURLOPT_URL, $url );
//     curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
//     curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
//     curl_setopt( $ch, CURLOPT_ENCODING, "" );
//     curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
//     curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
//     curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
//     curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
//     curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
//     curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
//     $content = curl_exec( $ch );
//     $response = curl_getinfo( $ch );
//     curl_close ( $ch );

//     if ($response['http_code'] == 301 || $response['http_code'] == 302) {
//         ini_set("user_agent", "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");

//         if ( $headers = get_headers($response['url']) ) {
//             foreach( $headers as $value ) {
//                 if ( substr( strtolower($value), 0, 9 ) == "location:" )
//                     return get_url( trim( substr( $value, 9, strlen($value) ) ) );
//             }
//         }
//     }

//     if (    ( preg_match("/>[[:space:]]+window\.location\.replace\('(.*)'\)/i", $content, $value) || preg_match("/>[[:space:]]+window\.location\=\"(.*)\"/i", $content, $value) ) && $javascript_loop < 5) {
//         return get_url( $value[1], $javascript_loop+1 );
//     } else {
//         return array( $content, $response );
//     }
// }

// $lurl=get_fcontent("http://ip2.cc/?api=cname&ip=84.228.229.81");
// echo"cid:".$lurl[0]."<BR>";
?>