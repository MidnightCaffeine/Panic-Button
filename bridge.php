<?php

require_once 'lib/databaseHandler/connection.php';

if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
    $coordinates = $_POST['coordinates'];

?>

    <script>
        var coordinates = "<?php echo $coordinates; ?>";
        var coor = coordinates.split(",");
        var lat = coor[0];
        var long = coor[1];

        console.log("lat:" + lat);
        console.log("long:" + long);

        var settings = {
            async: true,
            crossDomain: true,
            url: "https://us1.locationiq.com/v1/reverse?key=pk.7fd2e71ba1d253237b5602434f403b9e&lat=" + lat + "&lon=" + long + "&format=json",
            method: "GET",
        };

        $.ajax(settings).done(function(response) {
            var village = response.address.village;
            var phone = "<?php echo $phone; ?>";


            $.ajax({ 
                url: "lib/bridge/insert_data.php",
                method: "POST",
                data: {
                    phone: phone,
                    coordinates: coordinates,
                    village: village
                }
            });
        });
    </script>

<?php
}
