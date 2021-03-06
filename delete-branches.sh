#!/usr/bin/env bash
export REMOTE_NAME=origin
git branch -r | grep "${REMOTE_NAME}/" | grep -v 'master$' | grep -v HEAD | sed -E "s/^[[:space:]]*${REMOTE_NAME}\///g" | while read line; do git push $REMOTE_NAME :heads/$line; done;
git branch | grep -v "master" | xargs git branch -D
