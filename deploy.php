<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'lumen_api');

// Project repository
set('repository', 'git@domain.com:username/repository.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('harryji.com')
    ->user('harryji')
    ->port(234)
    ->set('deploy_path', '~/products.harryji.com/lumenapp');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

