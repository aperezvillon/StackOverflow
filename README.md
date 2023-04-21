# StackOverflow

## Add environment
- Open the hosts file
```
sudo nano /etc/hosts
```
- Add the following line
```
127.0.0.1     test.local
```

## Initialize project 

```
docker-composer build
docker-composer up
```

## Available Endpoints

- https://test.local/api/v1/topics?fromDate=1662035200&toDate=1682035200&tagged=java%3Bosgi
```
METHOD: GET

PARAMETERS: 
- fromDate [OPTIONAL]
- toDate [OPTIONAL]
- tags [REQUIRED]

NOTE: To constrain questions returned to those with a set of tags, use the tagged parameter with a semi-colon delimited list of tags. 
```

## Execute Tests
````
./vendor/bin/phpunit tests
````