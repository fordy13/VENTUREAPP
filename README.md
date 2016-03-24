VENTUREAPP

-------

This project was created based on the laravel intermediate quickstart: https://github.com/laravel/quickstart-intermediate

-------

Install vagrant, virtualbox, and homestead.  Add laravel and vagrant to your path.

edit ~/.homestead/Homestead.yaml to look like this:
  1 ---
  2 ip: "192.168.10.10"
  3 memory: 2048
  4 cpus: 1
  5 provider: virtualbox
  6 
  7 authorize: ~/.ssh/id_rsa.pub
  8 
  9 keys:
 10     - ~/.ssh/id_rsa
 11 
 12 folders:
 13     - map: ~/path/to/projectDirectory
 14       to: /home/vagrant/Code
 15 
 16 sites:
 17     - map: homestead.app
 18       to: /home/vagrant/Code/public  <---Made an edit here to remove /Laravel from the path
 19 
 20 databases:
 21     - homestead


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


