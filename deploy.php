<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/MIR24/orad-web-2');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

localhost()
    ->stage('test')
    ->roles('test', 'build')
    ->set('http_user','www-data')
    ->set('deploy_path','/home/dmitry/Projects/orad-dep');

// Tasks

task('build', function () {
    run('cd {{release_path}} && npm install');
    run('cd {{release_path}} && gulp');
});

//Build assets
after('deploy:writable', 'build');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

