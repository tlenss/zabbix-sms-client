zabbix-sms-client
=================

zabbix sms client script

example:
./sms.ph +3111122333 "Subject" "Message"


1. Move all file to your Zabbix AlertScripts path
2. chmod +x sms.php
3. In Zabbix admin go to Administration > Media Types add new media type called `sms.php` set type to `acript` and set the script name
4. In Zabbix admin go to Administration > Users edit a user and add the new media type
