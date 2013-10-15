# Remote Acknowledge Alerts
## Tags : plugin   alerts  

## Category: plugin

##Version Compatibility<br/>Module Name</th><th>up.time Monitoring Station Version</th>


  
    * Remote Acknowledge Alerts 2.1 - 7.1, 7.0, 6.0, 5.5
  


### Description: Allows alerts to be acknowledged remotely from an alert email via a quick web page (login not required). It acknowledges the alert using the built-in API.

### Supported Monitoring Stations: 7.1, 7.0, 6.0, 5.5
### Supported Agents: None; no agent required
### Installation Notes: <p><a href="https://github.com/uptimesoftware/uptime-plugin-manager">Install using the up.time Plugin Manager</a></p>

<ol>
<li>Edit the file [uptime_dir]\GUI\ack\ack.php by providing the following:</li>
</ol>


<p>///////////////////////////////////////////////////////////////
// up.time username and password settings for the acknowledgement to function
$user = 'admin';
$pass = 'admin';
$uptime_hostname = 'uptimeserver.company.com';
///////////////////////////////////////////////////////////////</p>

<p>...where $user &amp; $pass is the credential used to acknowledge the alert.
$uptime_hostname is the up.time monitoring station</p>

<ol>
<li>Configure Alert Profile</li>
</ol>


<p>Edit an alert profile and include the following link:</p>

<p>http://[UPTIME_HOSTNAME]/ack/ack.php?host=$HOSTNAME$&amp;monitor=$SERVICENAME$&amp;status=$SERVICESTATE$&amp;msg=$OUTPUT$</p>

<p>Note: Substitute "[UPTIME_HOSTNAME]" for the external IP/hostname of the up.time interface (the other values should not be modified; they will be updated when the alert profile is triggered).
You can also place it on an external web server if required.</p>

<p>If the monitor name and/or alert message have spaces, one should also install the Enhanced Alert Profile Variables. Replace the above URL in the alert profile with the following:</p>

<p>http://[UPTIME_HOSTNAME]/ack/ack.php?host=$HOSTNAME$&amp;monitor=$URLSERVICENAME$&amp;status=$SERVICESTATE$&amp;msg=$URLOUTPUT$</p>

### Dependencies: <p>n/a</p>

### Input Variables: 
### Output Variables: 
### Languages Used: * PHP

