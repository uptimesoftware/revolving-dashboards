---------------------------------------------
ACKNOWLEDGE ALERTS REMOTELY (from your phone)

---------------------------------------------
FILES

ack.php                            - Page that displays acknowledgement form
uptime_connect_remote_function.php - Sends acknowledgement to up.time API
readme.txt                         - This file


---------------------------------------------
INSTALL

1. Extract the "Remote_ACK.zip" zip file into the uptime "GUI" directory on the monitoring station
-- Make sure the up.time interface is accessible remotely (outside of firewall) or else external link will not work.
-- You can also place the two php files on an external web server and edit the ack.php page to point to the internal up.time server (read point 2 for more info).

2. Configure the user/pass used for acknlowledging
-- The "ack.php" script will need to have an up.time username and password to allow it to acknowledge alerts. To set this just edit the "ack.php" script and modify the following lines:
///////////////////////////////////////////////////////////////
// up.time username and password settings for the acknowledgement to function
$user            = 'admin';
$pass            = 'admin';
$uptime_hostname = '127.0.0.1';
///////////////////////////////////////////////////////////////

Note: If the up.time monitoring station is on another server then feel free to change the "$uptime_hostname" to the correct server hostname.


---------------------------------------------
CONFIGURE ALERTS TO INCLUDE LINK

Now that the functionality is installed, we can simply configure all the alerts to include the new link.

- Edit an alert profile and include the following link:
http://<UPTIME_HOSTNAME>/ack.php?host=$HOSTNAME$&monitor=$SERVICENAME$&status=$SERVICESTATE$&msg=$OUTPUT$

Note: Substitute the "<UPTIME_HOSTNAME>" for the external IP/hostname of the up.time interface (the other values should not be modified; they will be updated when the alert profile is triggered).
You can also place it on an external web server if required.
