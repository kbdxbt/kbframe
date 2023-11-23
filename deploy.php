<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'kbframe');

// Project repository
set('repository', 'https://gitee.com/kbdxbt/kbframe');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false);

// Allow anonymous stats
set('allow_anonymous_stats', false);

// Shared files/dirs between deploys keep_releases
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

// 根据操作系统设置 ssh_multiplexing
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    // 在 Windows 下禁用 ssh_multiplexing
    set('ssh_multiplexing', false);

    desc('Upload .env file');
    task('env:upload', function (): void {
        run("cp -f {{release_path}}/.env.example {{deploy_path}}/shared/.env");
    });
} else {
    set('ssh_multiplexing', true);

    desc('Upload .env file');
    task('env:upload', function (): void {
        upload('.env', '{{release_path}}/.env');
    });
}

host('kbframe')
    ->setHostname('127.0.0.1')
    ->set('labels', ['stage' => 'develop'])
    ->set('branch', '10.x')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '/var/www/html/{{application}}')
    ->setIdentityFile('~/.ssh/deployerkey');

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'deploy:publish',
]);

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

after('deploy:shared', 'env:upload');

after('deploy:failed', 'deploy:unlock');

