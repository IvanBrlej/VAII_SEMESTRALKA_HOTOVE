<?php
$output = '';
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');

/* Vracia pripsevky z forumajax pouzivatela podla zadaneho mena*/
$sql = "SELECT * FROM forumajax WHERE meno LIKE '%" . $_POST["search"] . "%'";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    $output .= '<div class="row justify-content-center">
					<table class="table table bordered">
						<tr>
							<th>Meno</th>
							<th>Predmet</th>
							<th>Príspevok</th>
						</tr>';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
			<tr>
				<td>' . $row["meno"] . '</td>
				<td>' . $row["predmet"] . '</td>
				<td>' . $row["text"] . '</td>
			</tr>
		';
    }
    echo $output;
} else {

}
?>
