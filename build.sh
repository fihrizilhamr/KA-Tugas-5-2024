
cp ./app/src /platform/src
docker build -t myapp ./app/platform

cp ./app/src1 /platform/src1
docker build -t myapp1 ./app/platform1


kind load docker-image myapp:latest --name mylab99
kind load docker-image myapp1:latest --name mylab99
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