#JournalApp

## Linux or Mac
### Requirements
 - Nginx or Apache
 - PHP 7.1+
 - Composer
 - Node
 - GIT

### How to Deploy
1. Install your preferred website engine such as Nginx or Apache
2. Install PHP
3. Install Composer
4. Clone this repo to the directory you want
5. Open a terminal in the directory you just cloned
6. Type' Composer Install' and let it install all the dependencies
7. Type 'NPM Install' and let it install all the 'node_modules'
8. now type php artisan serve and let it Requirements

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
6. While the terminal is open and you are in the JournalApp Directory type 'Composer Install'
7. After composer is done installing the required dependencies type 'NPM Install' and let it install the node_modules
8. Open your browser and go to JournalApp.dev (assuming you haven't modified laragon config.).
