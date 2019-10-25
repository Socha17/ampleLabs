# ampleLabs

## App setup

### 1. clone repo and cd into ampleLabs folder

### 2. install node modules

```
npm install
```

### 3. create `.env` file (just copy and paste `.env.example`)

### 4. install docker container (this may take a few minutes)

```
docker-compose up
```

### 5. open new terminal window and ssh into docker container

```
docker exec -it ampleLabs_web bash
```

### 6. while ssh'd into docker run migrations and seeders (this command does both)

```
composer test
```

### 7. go to http://localhost:9000/

## How to run tests

### 1. for backend tests in root directory run this command

```
composer test
```

### 2. for frontend tests in root directory run this command

```
npm run test
```
