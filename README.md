# Readme

This is my tech assignment project.

I used Laravel framework for the backend and Vue with Vuetify on the frontend.
I used sqlite database for the sake of simplicity.

The deployed application can be accessed here: [http://207.154.216.148:8081](http://207.154.216.148:8081)

I added an extra page, the beer list: [http://207.154.216.148:8081/beers](http://207.154.216.148:8081/beers)


## Installation

The simplest way is to pull the docker image, then run it:

```bash
docker pull odavid87/odavid-distilled
docker run -p 80:80 -d --name="odavid87" odavid87/odavid-distilled
```

## Running the tests inside the docker container
First you need to run the docker container. Please see the Installation section for details

Once the container is up and running, you can issue the following command to run tests: (please not)
```bash
docker exec odavid87 /bin/bash -c "./vendor/bin/phpunit"
```

## Source code
I created a public repo on github:
```bash
git clone git@github.com:odavid87/distilled-assignment.git
```


