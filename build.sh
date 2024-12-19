docker build -t myapp ./app/platform
kind load docker-image myapp:latest --name mylab99
PWD=$(pwd)

docker exec mylab99-control-plane rm -rf /KA-Tugas-5-2024
docker exec mylab99-worker rm -rf /KA-Tugas-5-2024
docker exec mylab99-worker2 rm -rf /KA-Tugas-5-2024


docker cp $PWD mylab99-control-plane:/KA-Tugas-5-2024
docker cp $PWD mylab99-worker:/KA-Tugas-5-2024
docker cp $PWD mylab99-worker2:/KA-Tugas-5-2024

# kubectl delete -f mysql/mysql-deployment.yaml \
#             -f app/app-deployment.yaml \
#             -f phpmyadmin/phpmyadmin-deployment.yaml \
#             -f alpine/alpine-job.yaml 
            # -f ingress.yaml