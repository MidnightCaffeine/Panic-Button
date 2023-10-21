$(document).ready(function () {
    $.ajax({
        url: "lib/dashboard/fetch_data.php",
        method: "POST",
        data: {
            fetch: "1",
        },
        dataType: "json",
        success: function (data) {
            $("#baler_cases").text(data[0].baler);
            $("#casiguran_cases").text(data[1].casiguran);
            $("#dilasag_cases").text(data[2].dilasag);
            $("#dinalungan_cases").text(data[3].dinalungan);
            $("#dingalan_cases").text(data[4].dingalan);
            $("#dipaculao_cases").text(data[5].dipaculao);
            $("#maria_cases").text(data[6].maria);
            $("#sanLuis_cases").text(data[7].ssanLuis);
        },
    });

    $("#activity").load("lib/dashboard/fetch_log.php");


});
