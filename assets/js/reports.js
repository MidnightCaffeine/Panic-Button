$(document).ready(function () {
  $("#reportsTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: "lib/reports/fetch_data.php",
  });

  $(document).on("click", ".viewReport", function () {
    var crime_id = $(this).attr("id");

    $.ajax({
      url: "lib/reports/fetch_single.php",
      method: "POST",
      data: {
        crime_id,
      },
      dataType: "json",
      success: function (data) {
        // $("#hidden_victim_name").val(data.fullname);
        $("#viewReports").modal("show");
        $("#reportView").text("Report For Case No." + crime_id);
        var audioPath = "evidence/" + data.audio;

        let extension = data.audio;
        var filePath = extension.split(".");
        let ext = filePath[1];
        if(extension == ''){
          $("#noAudio").show();
          $("#evidenceDiv").hide();
        }else{
          $("#noAudio").hide();
          $("#evidenceDiv").show();
        }
        if (ext == "mp3") {
          $("audio #audio_player2").attr("src", audioPath);
        }else{
          $("audio #audio_player1").attr("src", audioPath);
        }

        $("audio").get(0).load();

        $("#caseNo").text(crime_id);
        $("#case_id").val(crime_id);
        $("#victim").text(data.fullname);
        $("#report_date").text(data.date);
        $("#officer").text(data.officer);
        $("#address").text(data.address);
        $("#incident").text(data.incident);
        $("#event_details").text(data.details);
        $("#actions_taken").text(data.action);
        $("#summary").text(data.summary);
      },
    });
  });

  $(document).on("click", ".cls-modal", function () {
    const clears = '';
    $("audio #audio_player1").attr("src", clears);
    $("audio #audio_player2").attr("src", clears);
  });

  // $(document).on("click", "#generate_pdf", function () {
  //   var case_id = $("#caseNo").text();

  //   $.ajax({
  //     url: "generete_pdf.php",
  //     method: "POST",
  //     data: {
  //       case_id,
  //     },
  //     dataType: "json",
  //     success: function (data) {
  //       // $("#hidden_victim_name").val(data.fullname);
  //       $("#viewReports").modal("hide");
  //     },
  //   });
  // });


});
