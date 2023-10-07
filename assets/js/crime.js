$(document).ready(function () {
    $("#crimeListTable").DataTable({
      processing: true,
      serverSide: true,
      ajax: "lib/crime/fetch_data.php",
    });
  });