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

1. Create a Company
2. Register as a user - Must select a company
3. create and edit conversations
4. Edit your user's company from the list
5. Edit user information from navbar dropdown

-------


