VENTUREAPP

-------

This project was created based on the laravel intermediate quickstart: https://github.com/laravel/quickstart-intermediate

-------

Install vagrant, virtualbox, and homestead.  Add laravel and vagrant to your path.

edit ~/.homestead/Homestead.yaml to look like this:
  ---
  ip: "192.168.10.10"
  memory: 2048
  cpus: 1
  provider: virtualbox
  
  authorize: ~/.ssh/id_rsa.pub
  
  keys:
      - ~/.ssh/id_rsa
 
  folders:
      - map: ~/path/to/projectDirectory
        to: /home/vagrant/Code
  
  sites:
      - map: homestead.app
        to: /home/vagrant/Code/public  <---Made an edit here to remove /Laravel from the path
        
  databases:
      - homestead


-------

php artisan migrate

php artisan db:seed (optional)

-------
How to use it:

1. Create a Company
2. Ask a question in the Q&A tabl
3. Register as a user - Must select a company
4. create and edit conversations
5. Answer questions for your company in the Q&A tab
6. Edit your user's company name from the list
7. Edit user information from navbar dropdown
8. Click your company's name from the list to view the most 
recent answer (from that company's user pool) to each of the questions

-------

TIL dd() is my log tool

-------

TODOs:

-clean up that last query (8.) (research table joins)
-authenticate user edits on the back end







