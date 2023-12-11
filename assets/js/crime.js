$(document).ready(function () {
  $("#crimeListTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: "lib/crime/fetch_data.php",
  });

  $(document).on("click", ".setLocation", function () {
    var coordinates = $(this).attr("id");
    window.open("https://www.google.com/maps/place/" + coordinates, "_blank");
  });

  $(document).on("click", ".addReport", function () {
    var crime_id = $(this).attr("id");

    $.ajax({
      url: "lib/crime/fetch_crime_data.php",
      method: "POST",
      data: {
        crime_id,
      },
      dataType: "json",
      success: function (data) {
        $("#createReport").modal("show");
        $("#hidden_id").val(crime_id);
        $("#reportTitle").text("Submit Report For Case No."+crime_id);
        $("#victim_name").val(data.fullname);
      },
    });
  });

  $("#createReportForm").submit(function (event) {
    event.preventDefault();

    var crime_id = $("#hidden_id").val();
    var client_name = $("#victim_name").val();
    var reporting_officer = $("#reporting_officer").val();
    var municipality = $("#municipality").val();
    var address = $("#address").val();
    var incident = $("#incident").val();
    var details = $("#details").val();
    var actions = $("#actions").val();
    var summary = $("#summary").val();
    var add_report = $("#add_report").val();

    $(".form-message").load("lib/crime/submit_report.php", {
      crime_id,
      client_name,
      reporting_officer,
      municipality,
      address,
      incident,
      details,
      actions,
      summary,
      add_report,
    });
  });

  $(document).on("click", ".uploadAudio", function () {
    var crime_id = $(this).attr("id");

    $.ajax({
      url: "lib/crime/fetch_single.php",
      method: "POST",
      data: {
        crime_id,
      },
      dataType: "json",
      success: function (data) {
        $("#uploadAudios").modal("show");
        $("#hidden_caseid").val(crime_id);
        $("#hidden_victim_name").val(data.fullname);
        $("#uploads").text("Upload Audio Evidence For Case No."+crime_id);
      },
    });
  });

  $("#form").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      url: "lib/crime/upload_audio.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        //$("#preview").fadeOut();
        $("#err").fadeOut();
      },
      success: function (data) {
        if (data == "invalid file") {
          // invalid file format.
          $("#err").html("Invalid File !").fadeIn();
        } else {
          // view uploaded file.
          $("#preview").html(data).fadeIn();
          $("#form")[0].reset();
        }
      },
      error: function (e) {
        $("#err").html(e).fadeIn();
      },
    });
  });
});
