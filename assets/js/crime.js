$(document).ready(function () {
  $("#crimeListTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: "lib/crime/fetch_data.php",
  });

  // function crimeList() {
    
  // }

  // crimeList();

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

});
