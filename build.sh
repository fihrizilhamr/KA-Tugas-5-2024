docker build -t myapp ./app/platform
kind load docker-image myapp:latest --name mylab99
