kubectl delete -f mysql/mysql-deployment.yaml \
            -f app/app-deployment.yaml \
            -f phpmyadmin/phpmyadmin-deployment.yaml \
            -f alpine/alpine-job.yaml  