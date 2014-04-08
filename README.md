1. Create Database using using create_db.sql
	-This will create a database fb_login with a single table, users.  Here the facebook info for the user will be stored including, id, picture, email, ect.

2. Create the facebook app (1)
	-https://developers.facebook.com/apps/
	-Click 'Create New App' (2)
		-Enter a Display Name and Namespace
		-Choose Category
		-Create App

	-Add Cavas and a website and reference the domain in the app settings (3)



3. Set Credentials in app

	- In the /app folder set the db credentials in /inc/db_con.php
	- In the /app folder set the appId, secret, and redirect_url to the /app index in the index.php file.

4.  Thats it, when users login, they will see a request to authorize app, authrize it and it will be logged in your table and checked at every login. (4)



Notes:

If you receive error: 'Given URL is not allowed by the Application configuration.: One or more of the given URLs is not allowed by the App's settings. It must match the Website URL or Canvas URL, or the domain must be a subdomain of one of the App's domains.'  Add the domain you are using to the app config.

Can't use localhost anymore as an app domain.  A workaround is to edit the /private/etc/hosts file and add a domain Ex: 127.0.0.1 dev.thestoll.com to it.  This puts dev.thestoll.com to loopback to local.