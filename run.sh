# kubectl create configmap mysql-config --from-env-file=.env

kubectl delete -f mysql/mysql-deployment.yaml \
            -f app/app-deployment.yaml \
            -f phpmyadmin/phpmyadmin-deployment.yaml \
            -f alpine/alpine-job.yaml 
            # -f ingress.yaml

kubectl apply -f mysql/mysql-deployment.yaml \
            -f app/app-deployment.yaml \
            -f phpmyadmin/phpmyadmin-deployment.yaml \
            -f alpine/alpine-job.yaml 
            # -f ingress.yaml
