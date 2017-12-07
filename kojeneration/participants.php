<?php
session_start();
if ($_SESSION['status'] != 'logged-in') {
    header("Location: index.php");
} else {
    $_SESSION['api_token'] = "8cbe8639e1ea286f2e655c5e0be541ef2f0ada7907c185c849";
    $_SESSION['api_token_secret'] = "A9GzZ2qU53Xlc";
    $response_list_url = "https://restapi.surveygizmo.com/v4/survey/".$_GET['survey_id']."/surveyresponse?api_token=".$_SESSION['api_token']."&api_token_secret=".$_SESSION['api_token_secret'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Cody Kealy">
    <title>Kojeneration || Welcome</title>
    <link rel="stylesheet " href="./css/style.css">
</head>
<body>
<h2>Surveys</h2>
<div class="loginBox">
<?php
$response_list_json = file_get_contents($response_list_url);
$response_list = json_decode($response_list_json,true);
$response_count = $response_list['total_count'];
$response_data = $response_list['data'];
for ($x = 0; $x < $response_count; $x++) {
	$status = $response_data[$x]['id'];
	$id=$response_data[$x]['id'];
    $response_date = $response_data[$x]['datesubmitted'];
	echo "<div class = \"surveyBox\">";
        echo "<h3>".$response_date."</h3>";
	echo "<h3>".$status."</h3>";
        echo "<form action=\"testing.php?response_id=".$id."\" method=\"get\">";
	echo "<input type=\"submit\" value=\"See Response\">";
	echo "</form>";
	echo "</div>";
}
?>
</div>
</body>
</html>