#JournalApp

## Linux or Mac
### Requirements
 - Nginx or Apache
 - PHP 7.1+
 - Composer
 - Node
 - GIT
 - MySQL or MariaDB

### How to Deploy
1. If you haven't already, Install your preferred website engine such as Nginx or Apache
2. If you haven't already, Install your preferred SQL database engine
3. If you haven't already, Install PHP
4. If you haven't already, Install Composer
5. Clone this repo to the directory you want
6. Open a terminal in the directory you just cloned
7. Modify the .env.example file and enter the database information and save as .env
8. Now type 'php artisan key:generate'
9. Type' Composer Install' and let it install all the dependencies
10. Type 'NPM Install' and let it install all the 'node_modules'
11. Now type 'php artisan serve' and let it Requirements

You should now have a running JournalApp, accessible by localhost:8000 or any custom domain you have setup.


## Windows
### Requirements
 - Laragon

### How to Deploy
1. Right click Laragon icon in the task tray and click quick create -> Laravel and name it JournalApp
2. When the project is newly setup delete all contents in the <laragon_dir>/www/JournalApp directory but keep the folder named JournalApp
3. Clone this repo into the <laragon_dir>/www/JournalApp directory
4. Once Cloned, open the terminal by pressing Ctrl+Alt+T
5. When the terminal opens navigate to the directory
6. Modify the .env.example file and enter the database information and save as .env
7. Now type 'php artisan key:generate'
8. While the terminal is open and you are in the JournalApp Directory type 'Composer Install'
9. After composer is done installing the required dependencies type 'NPM Install' and let it install the node_modules
10. Start all Largon Services
