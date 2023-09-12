<?php
function load_HTML($url) {
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36'); // Set a user agent header to mimic a browser
    $html = curl_exec($curl_handle);
    if (curl_errno($curl_handle)) {
        // $error = curl_error($curl_handle);
        echo "\nError Loading HTML\n";
        curl_close($curl_handle);
        return NULL;
    }
    // Check if the HTML content is empty
    if (empty($html)) {
        echo "\nEmpty HTML content.\n";
        curl_close($curl_handle);
        return NULL;
    }
    curl_close($curl_handle);
    return $html;
}

function extract_facebook_page($url) {
    $html = load_HTML($url);
    if (!$html) {
        return null;
    }
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML($html);
    libxml_clear_errors();
    $xpath = new DOMXPath($dom);
    $facebookLink = $xpath->query('//a[contains(@href, "facebook.com")]');
    if ($facebookLink->length > 0) {
        return $facebookLink[0]->getAttribute('href');
    }
    return null;
}

function extract_email_addresses($url) {
    $html = load_HTML($url);
    if (!$html) {
        return [];
    }
    preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $html, $matches);
    return $matches[0];
}

function contact_page_url($url) {
    $html = load_HTML($url);
    if (!$html) {
        return null;
    }
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML($html);
    libxml_clear_errors();
    $xpath = new DOMXPath($dom);
    $contactLinks = $xpath->query('//a[contains(@href, "/contact")]');
    if ($contactLinks->length > 0) {
        $contactPageUrl = $contactLinks[0]->getAttribute('href');
        // Check if the contact page URL includes 'http'
        if (strpos($contactPageUrl, 'http') === false) {
            $contactPageUrl = rtrim($url, '/') . '/' . ltrim($contactPageUrl, '/');
        }
        return $contactPageUrl;
    }
    return null;
}

function process_websites($websites) {
    $eline = array();
    $output = '';
    foreach ($websites as $website) {
        $website = trim($website);
        //$output .= "\nProcessing website: $website\n\n";

        try {
            $facebookPage = extract_facebook_page($website);
            if ($facebookPage) {
                $line = "$website	$facebookPage\n";
                $output .= $line;
            }

            $emails = extract_email_addresses($website);
            if (!empty($emails)) {
                foreach ($emails as $email) {
                    $line = "$website	$email\n";
                    if (!in_array($line, $eline)) {
                        $output .= $line;
                        array_push($eline, $line);
                    }
                }
            } else {
                $contactPageUrl = contact_page_url($website);
                if ($contactPageUrl) {
                    $emails = extract_email_addresses($contactPageUrl);
                    if (!empty($emails)) {
                        foreach ($emails as $email) {
                            $line = "$website	$email\n";
                            if (!in_array($line, $eline)) {
                                $output .= $line;
                                array_push($eline, $line);
                            }
                        }
                    }
                }
            }
            if (empty($facebookPage) && empty($emails)) {
                $output .= "$website\n";
            }
            if ($contactPageUrl) {
                $line = $website . "	" . $contactPageUrl . "\n";
                $output .= $line;
            }
        } catch (Exception $e) {
            // Ignore the error and continue processing the next website
            continue;
        }
    }
    file_put_contents('email_and_facebook.txt', $output, FILE_APPEND | LOCK_EX);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $websites = $_POST['websites'];
    $websites = explode(',', $websites);
    $websites = array_map('trim', $websites);
    process_websites($websites);
    echo "Extraction completed.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email and Facebook Page Extractor</title>
</head>
<body>
    <form method="post" action="">
        <textarea name="websites" rows="10" cols="50" placeholder="Enter websites (separated by commas)"></textarea><br>
        <input type="submit" value="Extract">
    </form>
</body>
</html>
