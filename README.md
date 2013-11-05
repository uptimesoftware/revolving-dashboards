# Revolving Dashboards (Page Rotator)

See http://uptimesoftware.github.io for more information. 
 
To complete installation of the Revolving Dashboards (Page Rotator) plugin after installing it with the Plugin Manager, follow the steps below.

1. Copy the following text:
 - globalscan.custom.tab.enabled=true
 - balscan.custom.tab.name=Page Rotator
 - balscan.custom.tab.URL=/Page_Rotator/

2. Click on the tab: Config > up.time Configuration

3. Paste the text into the textbox and click the Update button.

That's it! Now go to GlobalScan and check out the new tab that shows up there.

To edit the rotator (adjust refresh frequency, add/remove/change pages to load), you can edit the html file located in: (uptime_dir)\GUI\Page_Rotator\index.html
