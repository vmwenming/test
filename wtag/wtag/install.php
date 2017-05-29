<?php
/*
Copyright &copy; 2008 Pippa http://www.spacegirlpippa.co.uk
Contact: sthlm.pippa@gmail.com

This file is part of wTag mini chat - shoutbox.

wTag is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

wTag is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with wTag.  If not, see <http://www.gnu.org/licenses/>.
*/
require_once("conf.php");

// Create table wtagshoutbox 
$result = $sql->query("CREATE TABLE wtagshoutbox (
             messageid    int(11) not null auto_increment PRIMARY KEY,
             name         varchar(30) not null,
             url          varchar(100) not null,
             message      text not null,
             ip           int(11) not null,
             date         datetime not null default '0000-00-00 00:00:00')
            ");

if ($result == true)
{
echo '<p style = "font:14px Arial;color:#333;margin-top:10%;margin-left:10%;">The table <span style="color:blue;">wtagshoutbox</span> has been created successfully!</p>';
}
else
{
echo '<p style = "font:14px Arial;color:#333;margin-top:10%;margin-left:10%;">Can not create the table <span style="color:blue;">wtagshoutbox</span>!</br>'.mysql_error().'</p>';  
}

$result2 = $sql->query("SELECT * FROM wtagshoutbox");

// If the table is empty insert a first message 
if ($sql->count_rows($result2) == 0)
{
// First message is required
$sql->query("INSERT INTO wtagshoutbox SET name= 'Pippa', url='http://www.spacegirlpippa.co.uk', message= 'Welcome to wTag 1.0 Beta!
             Please go to the installation guide - part two: http://spacegirlpippa.co.uk/minichat/shoutbox-installation-2.php for info about
             adding the shoutbox code to your existing pages. You may also want to see http://spacegirlpippa.co.uk/minichat/shoutbox-customising.php
             for info on customising the shoutbox and configuring its anti spam filter.', ip='', date=now()");
}

?>