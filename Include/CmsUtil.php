<?php
/*  Date time
 step1: http://php.net/manual/en/timezones.php link acc to country timezone
        Then Set the time zone
 step2: Time() is the function but result will display wrong ...need to convert
 step3: Convert string into time but display acc to computer before that set timezone acc to country
 step4: display date and time
*/
function getCurrentDateTime()
{
  $AustraliaSydney = "Australia/Sydney";
  date_default_timezone_set($AustraliaSydney);
  $CurrentTime=time();

  $DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
  echo $DateTime;
  return $DateTime;

}

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

?>
