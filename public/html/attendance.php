<?php 
require_once "../../autoload.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $record    = new Record;
    $record_DB = new RecordDB;
    $form_values[] = $_REQUEST['user_id'];
    
    if (isset($_REQUEST['clock_in'])) {
        $form_values[] = $_REQUEST['clock_in'];
        $record->fillEntity($form_values);
        if ($record_DB->selectEntry($record)) {
            echo 'User already clocked in for the day';
        } else {
            $record_DB->newEntry($record);
        }
    }
    
    if(isset($_REQUEST['clock_out'])){
        $form_values[] = $_REQUEST['clock_out'];
        $record->fillEntity($form_values);

        if ($record_DB->selectEntry($record)) {
            $record_DB->updateEntry($record);
        } else {
            echo 'You have not clocked in today.';
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<script>
var d = new Date(<?php echo time() * 1000 ?>);

function updateClock() {
  // Increment the date
  d.setTime(d.getTime() + 1000);

  // Translate time to pieces
  var currentHours = d.getHours();
  var currentMinutes = d.getMinutes();
  var currentSeconds = d.getSeconds();

  // Add the beginning zero to minutes and seconds if needed
  currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
  currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

  // Determine the meridian
  var meridian = (currentHours < 12) ? "am" : "pm";

  // Convert the hours out of 24-hour time
  currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
  currentHours = (currentHours == 0) ? 12 : currentHours;

  // Generate the display string
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + meridian;

  // Update the time
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

window.onload = function() {
  updateClock();
  setInterval('updateClock()', 1000);
}
</script>
</head>

<body>

<form name='attendanceForm' method='POST'>
<div id="clock">&nbsp;</div>
Employee ID:
<input type='text' name='user_id'><br>
<button type='submit' name='clock_in' value=1>Clock In</button>
<button type='submit' name='clock_out' value=0>Clock Out</button>

</form>

</body>

</html>