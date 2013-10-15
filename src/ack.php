<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
require('uptime_connect_remote_function.php');

///////////////////////////////////////////////////////////////
// up.time username and password settings for the acknowledgement to function
$user            = 'admin';
$pass            = 'admin';
$uptime_hostname = '10.1.40.100';
///////////////////////////////////////////////////////////////

if (! isset($_REQUEST['host']) || ! isset($_REQUEST['monitor'])) {
	die('Error: No host and/or monitor name received');
}
$host = urlencode($_REQUEST['host']);
$monitor = urlencode($_REQUEST['monitor']);
$monitorstatus = '';
$monitormsg = '';
$comment = '';
$msg = '';
if (isset($_REQUEST['status'])) {
	$monitorstatus = $_REQUEST['status'];
}
if (isset($_REQUEST['msg'])) {
	$monitormsg = $_REQUEST['msg'];
}
if (isset($_REQUEST['comment'])) {
	$comment = urlencode($_REQUEST['comment']);
}

// Create url for acknowledging the alert
$ack_uri = "/command?command=ackServiceMonitor&hostName={$host}&serviceName={$monitor}&ackComment={$comment}&username={$user}&password={$pass}";
$ackurl = "http://{$uptime_hostname}:9996{$ack_uri}";

// Try to ack the monitor
if (isset($_REQUEST['comment'])) {
	//print "URI: GET {$ack_uri}<br/><br/>\n\n";
	//print "Full URL: {$ackurl}<br/><br/>\n\n";
	$ack_rv = trim(agentcmd($uptime_hostname, 9996, "GET {$ack_uri}\n"));
	//print "Returned: '{$ack_rv}'<br/><br/>\n\n";
	$monitor = urldecode($monitor);
	if ($ack_rv == '0') {
		print "Monitor '{$monitor}' was acknowledged successfully.";
		exit(0);
	}
	else {
		$msg = "Error: Monitor '{$monitor}' could not be acknowledged.<br/>\nMessage: '{$ack_rv}'";
	}
	$monitor = urlencode($monitor);
}
?>
<html>
<head>
<title>Add acknowledgment to monitor status</title>
<?php //<link href="/styles/uptime.css" rel="stylesheet" type="text/css"> ?>
<style type="text/css">
html,body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #565E6C;
}

table,input,form,select,textarea,button {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #565E6C;
}
</style>
</head>
<body>
<h2>Acknowledge monitor status</h2>
<font color='red'><?php echo $msg; ?></font>
<table>
<tr><td><b>System:</b></td>
<td><?php echo urldecode($host); ?></td></tr>
<tr><td><b>Service:</b></td>
<td><?php echo urldecode($monitor) . " ({$monitorstatus})"; ?></td></tr>
<tr><td><b>Message:</b></td>
<td><?php echo $monitormsg; ?></td></tr>
</table><br/>
<form method="get">
<input type='hidden' name='host' value='<?php echo urldecode($host); ?>'>
<input type='hidden' name='monitor' value='<?php echo urldecode($monitor); ?>'>
<input type='hidden' name='status' value='<?php echo $monitorstatus; ?>'>
<input type='hidden' name='msg' value='<?php echo $monitormsg; ?>'>
Please enter the reason for Acknowledging the status:<br/>
<textarea cols="35" rows="8" name="comment" id="comment"><?php echo urldecode($comment); ?></textarea><br/>
<input type="submit" name="submit" class="FormButton" value="Submit">
</form>

</body>
</html>
