zabbix-sms-client
=================

Zabbix SMS alert script, using an internet gateway (Clickatell, ...)

example:
./sms.php +3111122333 "Subject" "Message"


1. Move all file to your Zabbix AlertScripts path
2. chmod +x sms.php
3. In Zabbix admin go to Administration > Media Types add new media of type `Script` with script name `sms.php` with the following parameters
     - `{ALERT.SENDTO}`
     - `{ALERT.SUBJECT}`
     - `{ALERT.MESSAGE}`
4. In Zabbix GUI, go to Administration > Users, edit a user, make sure it has a mobile phone number and assign the new SMS media.

![Zabbix SMS media config](zabbix_sms_script_config.png)
