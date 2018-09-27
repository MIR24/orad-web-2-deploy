<?php
namespace Deployer;

require 'recipe/laravel.php';

inventory('hosts.yml');

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/MIR24/orad-web-2');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

//Set releases to keep
set('keep_releases', 2);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', ['public']);

add('clear_paths', ['node_modules']);

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

