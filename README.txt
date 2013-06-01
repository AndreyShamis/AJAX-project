===============================================================================	
===============================================================================	
===============================================================================	

						AJAX WEB PROJECT
						
===============================================================================	

	Sdtudents:
	Ilia Gaysinsky	apalon83@gmail.com		309480051
	Andrey Shamis	lolnik@gmail.com		321470882
	
===============================================================================	
===============================================================================		
===============================================================================	

	Welcome to our Project guid!
	In that guid you will find all neseserly data about our site: 
		-	how to install the site
		-	sql sqript instalation guid(ajax.sql) 
		-	setting sql connection.
		-	Mail settings (include SMTP configuration in case there is some problem with it)
		-	description of our great features that we have maid.
		-	security coverege description
		-	Validation status - suported browsers.
		-	Our personal information and ways to contact as
		

	
	Note that whole the neseserly configuration files located at the sub folder named: "conf" 	
		
	:::::::::::::::::::::::::::::::::		:::::::::::::::::::::::::::::::
								     Features
	
	1) Mail confirmation - 
		XAMPP`s bag fix on SSL error see explaination above
		Work in both cases:
			- on XAMPP local site
			- in our hosting
	
	2) Cool interface build on jQuery


			+++++++++++++++++++      SECURITY		++++++++++++++++++++++++++++
	3) Preventing MYSQL injection
	4) Preventing XSS injection
	
	5) Admin interface - advanced features
		a) Confirm registration
		b) Lock user
		c) Delete User
		d) Unlock user
	
	6) Simple Template usage in page sended to eMail
	
	7) Our public hosting
		http://werdpc.dyndns.org/ajax/
		Inspite the fact that this requirement was canceled
		
===============================================================================	
===============================================================================	
===============================================================================			
		
	NOTE: 	This installation guide describe installation for XAMPP or
			any other localhost server or web-hosting.
			
			
	
	INSTALLATION GUIDE:::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	
	---------------------------------------------------------------------------
	Please perform all the nessacery steps on this manual for succsefull work
	---------------------------------------------------------------------------
	For BODEK.
	
	Our public version of site located on
	
				http://werdpc.dyndns.org/ajax 
		
	(it is home server) In case that our home computer/server doesn't work
	we have an aditional mirror server that should work. in that please follow 
	that address: 
				
				http://ajax.infoamper.com/
	
	For both domains use the folow username and password. That user have an 
	admin privileges - that give the full acess for the site.

	
	User Name(email)- only for bodek:	tester
	Password						:	password
	
===============================================================================
	Mail settings for use with XAMPP
	From :
		http://www.leoganda.net/how-to-enable-xampp-ssl-socket-transport/

	Hi today I have an experiment with GData in Zend Framework PHP , and found 
	an error that myXAMPP prevent SSL socket transport and return this error.

	Fatal error: Uncaught exception 'Zend_Gdata_App_HttpException' with message 
	'Unable to Connect to ssl://www.google.com:443. Error #24: Unable to find 
	the socket transport "ssl" - did you forget to enable it when you 
	configured PHP?'

	**** Here’s the solution to make your XAMPP support socket transport SSL.**** 
		1. First stop your Apache service
		2. Find libeay32.dll and ssleay32.dll in xampp\php\ folder, 
			and copy it into xampp\apache\bin\ folder. 
			Just overwrite the older files in there!!!!.
		3. Edit php.ini file in xampp\php\, 
			remove the semicolon in “;extension=php_openssl.dll”
			!!!!	If you can’t find this line, just insert 
			“extension=php_openssl.dll” in your php.ini
			AND SAVE FILE - save the changes
		4. Start the Apache service
	*****************************************************************************
	
	
	That’s it, your SSL transport socket in 
	your XAMPP has been activated.
	
	IMPOTANT!!!
	############
	To change MAIL SERVER configurations: 	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	go to /ajax/conf/mail.conf.php file
	and change there.
	
	Also you have more spicific options, like ssl or port server
	 in new_user_reciver.php file
	
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	NOTE:	By default you can use ours mail account that written in this file.
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

===============================================================================
	Setting site:
	1) Go to project path then open folder conf
	2) In folder conf you will see site.conf.php file - open it
	
	Change this strings
	
	a )		Site URL
		$siteURL =   "http://<YOUR DOMAIN>/SITE PATH/";
		For example
			$siteURL =   "http://werdpc.dyndns.org/ajax/";
		or (for sub folder)
			$siteURL =   "http://localhost/ajax/";
		or (for main root)
			$siteURL =   "http://localhost/";
		
		*** WERY IMPORTANT TO PROVIDE "/" (Slash) on end of site url string ***
	
	Now, open XAMPP direcktory (usualy it is C:\XAMPP)
	1.	go to htdocs directory
	2.  copy project directory (AJAX) to that folder (htdocs)
	3. in this case in site.conf.php file you must provide
		$siteURL =   "http://localhost/ajax/";
	
	
===============================================================================
	Setting MySQL connection.
	1) Go to project path then open folder conf
	2) In folder conf you will see mysql.conf.php file - open it
	3) Set your settings such 
		a) User Name of database
		b) Password
		c) hostname - tupicaly it`s localhost/ if your mysql server runs on 
			same mashine
		d) Data base name
			(By default the data base name is db_ajax) So if you want to 
				change it see how install sql script.
			
===============================================================================	
	Install *.sql script.
	
	For install project db sql file please use this tools:
	1) phpMyAdmin
	2) MySQL Tools - MySQLAdministrator
	3) Navicat
	4) or other program wich can run sql files.
	
	The archive file include "ajax.sql" file. This file contain creation of 
	one table and also insert too users.
	IF YOU WANT USE ANOTHER DB_NAME open and edit this file i this way:
	This rows 
		CREATE DATABASE IF NOT EXISTS db_ajax;
		USE db_ajax;
	CHange to 
		CREATE DATABASE IF NOT EXISTS <YOUR_DB_NAME>;
		USE <YOUR_DB_NAME>;
	
	And then run this file in one of your program for mysql administration.
	
	In phpmyAdmin:
	
		1) Enter phpMyAdmin by http://localhost/phpMyAdmin/ 
				(if you use local mashine)
		2) Click on Import(TAB)
		3) Choose file -> ajax.sql
		4) Press go.
		

		**** Adding user to MySQL server:
		1) phpMyAdmin
		2) Click on your <data base name>
		3) Click on Privilegies
		4) Click Add new User
		5) Enter user name and password and also provide 
===============================================================================	
	Validation:
		On the next Browsers the site work great:
		-	Google Chrome
		-	FireFox
		-	Internet Explorer (v 8.0 and higher)
===============================================================================	
	In any case if have problem , you don`t understind something please
	feel free to contact us on
	apalon83@gmail.com
	lolnik@gmail.com
	
	Thank you
	
