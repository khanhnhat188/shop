<?php
require './carbon/vendor/autoload.php';
use Carbon\Carbon;

$now = Carbon::now();
echo $now->toDateTimeString();
?>