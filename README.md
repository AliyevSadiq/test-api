Installation
============

### Requirements
- Download **docker** and **docker-compose** binaries for initialization
- **make** executable

**Step 1:**
- Executing docker as regular user: **(only for linux)**

**Note:** If your docker executable already running by your user then, you can skip this step.

```shell
sudo groupadd docker
sudo usermod -aG docker ${USER}
su -s ${USER}

# For testing
docker --version
```

**Step 2:**

Open a command console, enter your project directory and execute:

```console
$ make init
$ make app-init
```
Configure database connection

Generate key for .env file
```console
$ make key-generate
```

Migrate tables
```console
$ make app-migrate
```
Generate fake data
```console
$ make db-seed
```
Generate swagger documentation
```console
$ make doc-generate
```
