Messenger Monitor App
---

This is a sandbox app in order to test [Messenger Monitor Bundle](https://github.com/karo-io/messenger-monitor-bundle)

You can use docker-compose to have a database & redis & rabbitmq installed:
```shell script
$ docker-compose up -d --build 
```

Messages can be dispatched with this command:
```shell script
$ ./bin/console messenger:dispatch-message
```

All messages have 20% chance to fail and to be sent to the failure transport.

Consume messages with the following command:
```shell script
./bin/console messenger:consume amqp doctrine redis in-memory -vv
```
