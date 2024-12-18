bash setup-cluster/kind/1-create-cluster.sh
bash setup-cluster/kind/2-set-config.sh
bash setup-cluster/kind/3-install-ingress.sh
bash setup-cluster/kind/4-cek-ingress.sh


docker build -t myapp ./app/platform
kind load docker-image myapp:latest --name mylab99
PWD=$(pwd)


docker cp $PWD mylab99-control-plane:/KA-Tugas-5-2024
docker cp $PWD mylab99-worker:/KA-Tugas-5-2024
docker cp $PWD mylab99-worker2:/KA-Tugas-5-2024