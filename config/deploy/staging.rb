server "40.117.91.189", port: 22, roles: [:app], :primary => true, user: 'deployer'
set :application => "dev.newsbyte.org"
set :branch, "staging"
set :deploy_to, "/var/www/vhosts/localhost.localdomain/dev.newsbyte.org"
