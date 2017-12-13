<?php
session_start();
if ($_SESSION['status'] != 'logged-in') {
    header("Location: index.php");
} else {
    $_SESSION['api_token'] = "8cbe8639e1ea286f2e655c5e0be541ef2f0ada7907c185c849";
    $_SESSION['api_token_secret'] = "A9GzZ2qU53Xlc";
    $survey_list_url = "https://restapi.surveygizmo.com/v4/survey?api_token=".$_SESSION['api_token']."&api_token_secret=".$_SESSION['api_token_secret'];
	$survey_list_json = json_decode(file_get_contents($survey_list_url), true);
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
            $survey_count = $survey_list_json['total_count'];
            $survey_data = $survey_list_json['data'];
            for ($x = 0; $x < $survey_count; $x++) {
                $id = $survey_data[$x]['id'];
                $survey_title = $survey_data[$x]['title'];
                echo "<div class = \"surveyBox\">";
                echo "<h3>" . $survey_title . "</h3>";
                echo "<form action=\"results.php\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"survey_id\" value=\"$id\">";
                echo "<input type=\"submit\" value=\"See Results\">";
                echo "</form>";
                echo "</div>";
            }
            ?>
        </div>
    </body>
</html>