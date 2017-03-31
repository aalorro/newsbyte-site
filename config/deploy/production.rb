server "40.117.91.189", port: 22, roles: [:app], :primary => true, user: 'deployer'
set :application => "m.newsbyte.org"
set :branch, "master"
set :deploy_to, "/var/www/vhosts/localhost.localdomain/m.newsbyte.org"
