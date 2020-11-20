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

    $('#submit').click(function () {
        $("#status").text("Проверяем...");
        info = editor.getValue();
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
