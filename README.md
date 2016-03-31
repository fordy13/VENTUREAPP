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
2. Register as a user - Must select a company
3. create and edit conversations
4. Edit your user's company from the list
5. Edit user information from navbar dropdown

-------

TIL dd() is my log tool

-------

TODOs:

-authenticate user edit route
-create new table migrations, models, repos, policies, routes and controllers for
--Question
---id/title
--Answer
---id/user_id/question_id/value/created_at
-make a Q&A tab 
---which has a button at the top "Ask a Question"
---where it lists questions that have been asked
----if the user is logged in it shows an "Answer Question" button for each question
-Clicking on a company in the /companies view will bring up a view of that company's most recent answers to each question, and the user who answered it. 







