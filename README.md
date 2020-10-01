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
