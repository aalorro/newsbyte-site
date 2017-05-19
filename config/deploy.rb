set :stages, %w(production staging)
set :default_stage, "production"
set :repo_url, "git@gitlab.com:incubixtech/newsbyte.git"
set :scm, :git

set :user, "deployer"
set :pty, true

set :ssh_options, { :auth_methods => ["publickey"], forward_agent: true, user: fetch(:user), :keys => [
        "C:\\Users\\IncubixTech\\Workspace\\_keys\\newsbyte\\newsbyte.pem",
        "C:\\Users\\CK\\Documents\\pem-keys\\newsbyte.pem"
    ]
}

set :keep_releases, 3

set :linked_dirs, %w{storage public/images public/fonts public/font-awesome public/css public/js}

namespace :git do
    desc "Make sure local git is in sync with remote."
    task :check_revision do
        on roles(:app) do
            unless `git rev-parse HEAD` == `git rev-parse origin/master`
                puts "WARNING: HEAD is not the same as origin/master"
                puts "Run `git push` to sync changes."
                exit
            end
        end
    end
end

namespace :environment do

    desc "Copy Environment Variables"
    task :sync do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path do
                if fetch(:stage).to_s.eql? "staging"
                    upload!(".env.staging", "#{current_path}/.env")
                else
                    upload!(".env.production", "#{current_path}/.env")
                end
            end
        end
    end
end

namespace :composer do

    desc "Running Composer Install"
    task :install do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                if fetch(:stage).to_s.eql? "staging"
                    execute :composer, "install --quiet"
                else
                    execute :composer, "install --no-dev --quiet"
                end
            end
        end
    end

    desc "Running Composer Update"
    task :update do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                if fetch(:stage).to_s.eql? "staging"
                    execute :composer, "install --quiet"
                else
                    execute :composer, "install --no-dev --quiet"
                end
            end
        end
    end

end

namespace :laravel do

    desc "Setup Laravel folder permissions"
    task :permissions do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                if test("[ ! -d #{current_path}/storage/framework ]")
                    execute :mkdir, "#{current_path}/storage/framework/"
                end
                if test("[ ! -d #{current_path}/storage/framework/cache ]")
                    execute :mkdir, "#{current_path}/storage/framework/cache/"
                end
                if test("[ ! -d #{current_path}/storage/framework/sessions ]")
                    execute :mkdir, "#{current_path}/storage/framework/sessions/"
                end
                if test("[ ! -d #{current_path}/storage/framework/views ]")
                    execute :mkdir, "#{current_path}/storage/framework/views/"
                end
                if test("[ ! -d #{current_path}/storage/json ]")
                    execute :mkdir, "#{current_path}/storage/json/"
                end
                if test("[ ! -d #{current_path}/storage/logs ]")
                    execute :mkdir, "#{current_path}/storage/logs/"
                end
                execute :sudo, :chmod, "u+x artisan"
                execute :sudo, :chmod, "-R 777 storage/framework/cache"
                execute :sudo, :chmod, "-R 777 storage/framework/sessions"
                execute :sudo, :chmod, "-R 777 storage/framework/views"
                execute :sudo, :chmod, "-R 777 storage/logs"
                execute :sudo, :chmod, "-R 777 storage/"
                execute :sudo, :chmod, "-R 777 ."
            end
        end
    end

    desc "Run Laravel Artisan migrate task."
    task :migrate do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                execute :php, "artisan migrate --no-interaction"
            end
        end
    end

    desc "Run Laravel Artisan seed task."
    task :seed do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                execute :php, "artisan migrate:refresh --seed --no-interaction"
            end
        end
    end

    desc "Optimize Laravel Class Loader"
    task :optimize do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                execute :php, "artisan clear-compiled"
                execute :php, "artisan optimize"
            end
        end
    end

    desc "Publish vendor files"
    task :vendor_publish do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                execute :php, "artisan vendor:publish"
            end
        end
    end
end

namespace :assets do
    desc "Copy Change Manifest"
    task :copy do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path do
                if test("[ ! -L #{current_path}/public/images ]")
                    execute :mkdir, "#{current_path}/public/images/"
                end
                if test("[ ! -L #{current_path}/public/fonts ]")
                    execute :mkdir, "#{current_path}/public/fonts/"
                end
                if test("[ ! -L #{current_path}/public/font-awesome ]")
                    execute :mkdir, "#{current_path}/public/font-awesome/"
                end
                if test("[ ! -L #{current_path}/public/css ]")
                    execute :mkdir, "#{current_path}/public/css/"
                end
                if test("[ ! -L #{current_path}/public/js ]")
                    execute :mkdir, "#{current_path}/public/js/"
                end
                upload!("public/images", "#{current_path}/public/", recursive: true)
                upload!("public/fonts", "#{current_path}/public/", recursive: true)
                upload!("public/font-awesome", "#{current_path}/public/", recursive: true)
                upload!("public/css", "#{current_path}/public/", recursive: true)
                upload!("public/js", "#{current_path}/public/", recursive: true)
            end
        end
    end
end

namespace :plesk do
    desc "Change deploy folder's ownership to psacln"
    task :group_ownership do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path do
                execute :sudo, :chown, "-R", "deployer:psacln", "#{current_path}"
            end
        end
    end
end

namespace :housekeeping do
    desc "Change permissions for deletion"
    task :permissions do
        on release_roles :all do |host|
            releases = capture(:ls, '-x', releases_path).split
                if releases.count >= fetch(:keep_releases)
                    info "Cleaning permissions on old releases"
                    directories = (releases - releases.last(1))
                    if directories.any?
                        directories.each do |release|
                            within releases_path.join(release) do
                                execute :sudo, :chmod, '-R', '777', "storage/"
                            end
                        end
                    end
                else
                  info t(:no_old_releases, host: host.to_s, keep_releases: fetch(:keep_releases))
            end
        end
    end
end

namespace :deploy do
    # after :published, "git:check_revision"
    # after :published, "composer:update"
    after :published, "composer:install"
    after :published, "environment:sync"
    after :published, "laravel:optimize"
    after :published, "laravel:permissions"
    # after :published, "laravel:migrate"
    # after :published, "laravel:seed"
    # after :published, "laravel:vendor_publish"
    # after :published, "assets:copy"
    after :published, "plesk:group_ownership"
    # before :cleanup, "housekeeping:permissions"
end
