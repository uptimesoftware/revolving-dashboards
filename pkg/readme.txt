1. Edit the file <uptime_dir>\GUI\ack\ack.php by providing the following:

///////////////////////////////////////////////////////////////
// up.time username and password settings for the acknowledgement to function
$user            = 'admin';
$pass            = 'admin';
$uptime_hostname = 'uptimeserver.company.com';
///////////////////////////////////////////////////////////////

	...where $user & $pass is the credential used to acknowledge the alert.  
	   $uptime_hostname is the up.time monitoring station

2. Configure Alert Profile

Edit an alert profile and include the following link:

	http://<UPTIME_HOSTNAME>/ack/ack.php?host=$HOSTNAME$&monitor=$SERVICENAME$&status=$SERVICESTATE$&msg=$OUTPUT$

Note: Substitute "<UPTIME_HOSTNAME>" for the external IP/hostname of the up.time interface (the other values should not be modified; they will be updated when the alert profile is triggered).
You can also place it on an external web server if required.

If the monitor name and/or alert message have spaces, one should also install the Enhanced Alert Profile Variables (http://support.uptimesoftware.com/the-grid/mod_view.php?mod_id=6&version_id=138).  Replace the above URL in the alert profile with the following:

	http://<UPTIME_HOSTNAME>/ack/ack.php?host=$HOSTNAME$&monitor=$URLSERVICENAME$&status=$SERVICESTATE$&msg=$URLOUTPUT$