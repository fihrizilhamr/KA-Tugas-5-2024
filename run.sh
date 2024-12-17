# kubectl create configmap mysql-config --from-env-file=.env

sed "s|$(pwd)/alpine/scripts|$CURRENT_DIR/alpine/scripts|" alpine/alpine-job.yaml > alpine/alpine-job-updated.yaml
sed "s|$(pwd)/app/platform|$CURRENT_DIR/app/platform|" app/app-deployment.yaml > app/app-deployment-updated.yaml
sed "s|$(pwd)/mysql/dbscripts|$CURRENT_DIR/mysql/dbscripts|" mysql/mysql-deployment.yaml > mysql/mysql-deployment-updated.yaml

kubectl apply -f mysql/mysql-deployment.yaml \
            -f app/app-deployment.yaml \
            -f phpmyadmin/phpmyadmin-deployment.yaml \
            -f alpine/alpine-job.yaml \
            -f ingress.yaml
