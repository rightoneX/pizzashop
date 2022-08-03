
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport", initial-scale=1.0">
    <title>SITEHOST - Developer Challenge #1</title>
</head>
<body>
<h1>SITEHOST - Developer Challenge #1</h1>

<?php
    $client_id = 293785;
    $api_key = "d17261d51ff7046b760bd95b4ce781ac";

    $ch = curl_init();
  
    echo "<div class='client_id'>Client ID: <span>$client_id<span></div>";
    echo "<div class='client_list'>List of Domains: <span>";

    $curl = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.sitehost.nz/1.0/dns/list_domains.json?apikey=".$api_key."&client_id=".$client_id, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    echo $response. "</span></div>";
    echo curl_error($curl);
    curl_close($ch);
?>

</body>
</html>
