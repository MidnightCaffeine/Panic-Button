$(document).ready(function () {
  $("#crimeListTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: "lib/crime/fetch_data.php",
  });


  $(document).on("click", ".setLocation", function () {
    var coordinates = $(this).attr("id");

    window.open("https://www.google.com/maps/place/" + coordinates, '_blank');

    var coor = coordinates.split(",");
    var lat = coor[0];
    var long = coor[1];

    console.log("lat:" + lat);
    console.log("long:" + long);

    var settings = {
      async: true,
      crossDomain: true,
      url: "https://us1.locationiq.com/v1/reverse?key=pk.7fd2e71ba1d253237b5602434f403b9e&lat="+ lat +"&lon="+ long +"&format=json",
      method: "GET",
    };
  
    $.ajax(settings).done(function (response) {
      console.log(response.address.town);
    });



  });

});
