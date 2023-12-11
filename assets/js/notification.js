$(document).ready(function () {
  function load_unseen_notification() {
    $("#noti_count").load("lib/notif/get_count.php");
    $("#notif_count").load("lib/notif/gets_count.php");
    $("#notifications_item").load("lib/notif/load_notification.php");

  }

  load_unseen_notification();

  // load notification every 5 sec
  setInterval(function () {
    load_unseen_notification();
  }, 5000);
});
