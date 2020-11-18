function getCurrentExercise() {
    $("#status").text("");
    $("#desc").text("");
    $("#code").text("");

    $.ajax({
        type: 'GET',
        url: "get-exercise.php",
        data: ({
            exeNum: $("#exercise option:selected").val()
        }),
        success: (function (data, textStatus, jqXHR) {
            var json = JSON.parse(data);
            $("#desc").text(json.desc);
            $("#code").text(json.code);
        })
    });
}

$(document).ready(function () {
      var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        styleActiveLine: true,
        matchBrackets: true,
        mode: "text/x-kotlin"
      });
      editor.setOption("theme", "darcula");


    getCurrentExercise();

    $("#exercise").change(getCurrentExercise);

    $('#submit').click(function () {
        $("#status").text("Проверяем...");
        info = $('#code').val();
        $.ajax({
            type: 'POST',
            url: "check.php",
            data: ({
                code: info,
                exercise: $("#exercise option:selected").val()
            }),
            success: (function (data, textStatus, jqXHR) {
                $("#status").text(data);
            })
        });

        return false;
    });
});
