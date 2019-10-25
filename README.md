# ampleLabs

## App setup

### 1. Clone repo and cd into ampleLabs folder

### 2. Install node modules

```
npm install
```

### 3. Create `.env` file (just copy and paste `.env.example`)

### 4. Install docker container (this may take a few minutes)

```
docker-compose up
```

### 5. Open new terminal window and ssh into docker container

```
docker exec -it ampleLabs_web bash
```

### 6. While ssh'd into docker run migrations and seeders (this command does both)

```
composer test
```

### 7. Go to http://localhost:9000/

## How to run tests

### 1. For backend tests in root directory run this command

```
composer test
```

### 2. For frontend tests in root directory run this command

```
npm run test
```