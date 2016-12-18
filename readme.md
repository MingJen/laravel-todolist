# How to use
## 1. use sqlite
in .env file
  DB_CONNECTION=sqlite
## 2. create sqlite file
  touch database/database.sqlite
## 3. migrate
  php artisan migrate
## 4. create fake user
  php artisan tinker
  
  factory(App\User::class)->create();
  
  user password is "secret"

# How to test
  vender/bin/phpunit
# To Do
- [ ] success/error message
- [ ] finished task readonly
- [ ] use vue
- [ ] add tasks to menu
