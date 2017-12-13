<?php
session_start();
if ($_SESSION['status'] != 'logged-in') {
    header("Location: index.php");
} else {
    $_SESSION['api_token'] = "8cbe8639e1ea286f2e655c5e0be541ef2f0ada7907c185c849";
    $_SESSION['api_token_secret'] = "A9GzZ2qU53Xlc";
    $survey_id = strip_tags(trim($_POST['survey_id']));
	$response_list_url = "https://restapi.surveygizmo.com/v4/survey/" . $survey_id . "/surveyresponse?api_token=".$_SESSION['api_token']."&api_token_secret=".$_SESSION['api_token_secret'];
	$response_list_json = json_decode(file_get_contents($response_list_url), true);
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
        <div class="surveyList">
            <?php
            $response_count = $response_list_json['total_count'];
            $response_data = $response_list_json['data'];
            for ($x = 0; $x < $response_count; $x++) {
                $id = $response_data[$x]['id'];
                $response_date = $response_data[$x]['datesubmitted'];
                $response_status = $response_data[$x]['status'];
                echo "<div class = \"surveyBox\">";
                echo "<h3>" . $response_date . " : " . $response_status . "</h3>";
                echo "<form action=\"testing.php\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"survey_id\" value=\"$survey_id\">";
                echo "<input type=\"hidden\" name=\"response_id\" value=\"$id\">";
                if ($response_status == "Complete") {
                    echo "<input type=\"submit\" value=\"View Spreadsheet\">";
                }
                echo "</form>";
                echo "</div>";
            }
            ?>
        </div>
    </body>
</html>