#!/bin/bash

if [ $APP_MODE = "worker" ]; then
	cp /tmp/workers/queue-worker.conf /etc/supervisor/conf.d/queue-worker.conf
	cp /tmp/workers/migration-worker.conf /etc/supervisor/conf.d/migration-worker.conf
fi

exec /usr/bin/supervisord -n