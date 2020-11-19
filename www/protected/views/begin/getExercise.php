<?php

$exeNum = $_GET["exeNum"];

if ($exeNum != NULL) {
    $code = file_get_contents("exercises/code" . $exeNum, false, NULL);
    $desc = file_get_contents("exercises/desc" . $exeNum, false, NULL);

    echo json_encode(
            array(
                "code" => $code,
                "desc" => $desc
            )
    );
} else {
    echo "Номер задачи не указан";
}
