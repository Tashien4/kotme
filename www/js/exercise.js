$(document).ready(function () {
    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        styleActiveLine: true,
        matchBrackets: true,
        mode: "text/x-kotlin"
    });
    editor.setOption("theme", "darcula");

    function getExerciseNum() {
        return new URLSearchParams(window.location.search).get('n');
    }

    function getCurrentExercise() {
        $("#status").text("");
        $("#desc").text("");
        editor.setValue("");

        $.ajax({
            type: 'GET',
            url: "getExercise",
            data: ({
                exeNum: getExerciseNum()
            }),
            success: (function (data, textStatus, jqXHR) {
                var json = JSON.parse(data);
                $("#desc").text(json.desc);

                editor.setValue(json.code);
            })
        });
    }


    getCurrentExercise();

    $("#exercise").change(getCurrentExercise);

    $('#submit').click(function () {
        $("#status").text("Проверяем...");
        info = $('#code').val();
        $.ajax({
            type: 'POST',
            url: "check",
            data: ({
                code: info,
                exercise: getExerciseNum()
            }),
            success: (function (data, textStatus, jqXHR) {
                $("#status").text(data);
            })
        });

        return false;
    });
});
