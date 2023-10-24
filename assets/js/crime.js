$(document).ready(function () {
  var coor;
  $("#crimeListTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: "lib/crime/fetch_data.php",
  });

  // $(".municipality").load("lib/crime/update_status.php", {
  //   // $("#crimeListTable").DataTable().ajax.reload();
  // });

  $(document).on("click", ".setLocation", function () {
    var coordinates = $(this).attr("id");
    coor = coordinates;

    window.open("https://www.google.com/maps/place/" + coordinates, "_blank");
  });

  $(document).on("click", ".sets", function () {
    var id = $(this).attr("id");

    $.ajax({
      url: "lib/crime/update_status.php",
      method: "POST",
      data: {
        id: id,
        coordinates: coor
      },
      success: function (data) {
        $("#crimeListTable").DataTable().ajax.reload();
        
      },
    });
  });
});
