Simple Registration/Login Form
==============================
The Following code has been tested on 4.4.1+ Moodle Version Environment
due my lack of knowledge for the subject I had a small research of integrate Moodle on PhP

My steps for installing Moodle was:

Step 1: Download/Install Wamp in order to setup a localhost connection
Step 2: Download Moodle's Latest Version, extract the files on a new folder at /wamp64/www/
Step 3: Accessing localhost on browser and select MariaDB
Step 4: Access lochalhost/NameOfYourMoodleFolder to innitiate the installation
Step 5: Troubleshooting Installation error that acquire

In order to create the plugin:

Step 1: wamp64/www/NameOfYourMoodleFolder/local/CreateNewFolder
Step 2: create 3 new folders classes/db/lang
	Step 2.1: in classes folder create another one named form 
	Step 2.2: inside the the form folder create a PhP File called registration_form.php
	(In this file we are adding or substracting elements that we use or want to delete from our form using moodle's form api)
	Step 2.3: inside the db folder we need to intigrate our permissions and schema of our database therefore
	we need to create an xml file to handle the schema of our database and an php file to define our plugin capabilities)
	Step 2.4: (Almost there I promise) in the lang folder we are going to integrate a new php file that contains the language strings
	for our plugin, make a folder according to the language you want in our case is english so create an en folder and inside that folder
	we will create our php file to handle it
	Step 3: Finally we need 3 more files, a version file to define our plugin metadata, our verify script to handle email verification and our index
	file to handle everything on the front
	
Now that our plugin is ready we can test it out by accessing our moodlepage, it will automatically notify us to install 
the new plugin, after installation we can access it via the Site Administration Tab

Thank you for taking the time reading my handmade guide!