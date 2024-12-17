docker build -t myapp ./app/platform
kind load docker-image myapp:latest --name mylab99
PWD=$(pwd)


docker cp $PWD mylab99-control-plane:/KA-Tugas-5-2024
docker cp $PWD mylab99-worker:/KA-Tugas-5-2024
docker cp $PWD mylab99-worker2:/KA-Tugas-5-2024