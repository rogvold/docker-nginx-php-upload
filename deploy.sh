#!/bin/bash
#SSH_SERVER=root@176.99.11.132
SSH_SERVER=root@proxy2.cod.phystech.edu
SERVER_SSH_PORT=10038
#SERVER_SSH_PORT=22

ssh $SSH_SERVER -p $SERVER_SSH_PORT '
    echo $(pwd)
    rm -rf /tmp/deploy_sabir_upload
    mkdir /tmp/deploy_sabir_upload
    mkdir /tmp/deploy_sabir_upload/helpers
    mkdir /tmp/deploy_sabir_upload/api
    mkdir /tmp/deploy_sabir_upload/services
    cd /tmp/deploy_sabir_upload
    pwd
'

scp -P $SERVER_SSH_PORT -r ./* $SSH_SERVER:/tmp/deploy_sabir_upload/

ssh $SSH_SERVER -p $SERVER_SSH_PORT '
    cd /tmp/deploy_sabir_upload
    sudo docker-compose build
    sudo docker-compose up -d --force-recreate
    docker ps -a
'
