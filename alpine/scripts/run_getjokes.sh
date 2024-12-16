#!/bin/sh
apk update && apk add --no-cache curl jq mysql-client

MYSQL_HOST=mysql1
MYSQL_USER=root
MYSQL_PASSWORD=mydb6789tyui
MYSQL_DATABASE=mydb_tugas3
MYSQL_TABLE=jokes

URL=https://api.chucknorris.io/jokes/random
DELAY=${DELAY:-8}

echo "Fetching jokes every $DELAY seconds and saving to MySQL."

while true; do
    date=$(date '+%Y-%m-%d %H:%M:%S')
    echo "Processing at $date"
    
    joke=$(curl -sL $URL | jq -r '.value')

    mysql -h "$MYSQL_HOST" -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" -e \
    "INSERT INTO $MYSQL_TABLE (joke_text) VALUES ('$joke');"

    echo "Saved joke to MySQL: $joke"
    sleep "$DELAY"
done
