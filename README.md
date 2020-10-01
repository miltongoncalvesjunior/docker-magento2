# Docker for Magento2
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
This repository allows the creation of a Docker environment that meets
[Magento 2](http://devdocs.magento.com/guides/v2.2/install-gde/system-requirements-tech.html) requirements.

## Architecture
![Architecture overview](docs/architecture.png "Architecture")

## Usage
### Quick Start
Commands should be executed in cloned target folder 
```
# Build and mount containers (default: php-7.2)
docker-composer up -d
```
### Preparing magento install
```
# Checking and set permissions
docker exec -it web install-magento
```
### Enter a CLI command with options for entering the name, email, ADMIN credentials, URL, and additional information. For a list of all options, see [Installer help commands](https://devdocs.magento.com/guides/v2.3/install-gde/install/cli/install-cli-install.html#instgde-cli-help-cmds). 
```
bin/magento setup:install --backend-frontname=admin --db-host=mysql --db-name=magento --db-user=root --db-password=root --base-url=http://local.domain.com --language=pt_BR --timezone=America/Sao_Paulo --currency=BRL --use-rewrites=1 --use-secure=1 --base-url-secure=https://local.domain.com --admin-user=user --admin-password=senha123 --use-sample-data --admin-firstname=User --admin-lastname=Lastname --admin-email=rsurfings@gmail.com
```
