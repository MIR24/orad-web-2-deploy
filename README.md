Deploy recipe for [orad-web-2](https://github.com/MIR24/orad-web-2) project, based on [Deployer](https://deployer.org).

Nodejs, npm, gulp, [acl](http://savannah.nongnu.org/projects/acl/), deployer.phar must be installed.

Use to run deploy procedure:
```bash
$ git clone git@github.com:MIR24/orad-web-2-deploy.git
$ dep deploy test --branch=develop
```

First deploy failes because of .env DB configuration lack.<br>
Configure DB connection and add APP_KEY= key after fail and run deploy again. 

Setup `deploy_path at` hosts.yml.<br>
Configure project-path/current/public as web-server's document root.
