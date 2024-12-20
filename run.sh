# kubectl create configmap mysql-config --from-env-file=.env
# kubectl create configmap apache-config --from-file=httpd.conf=app/platform/httpd.conf

kubectl apply -f mysql/pvc-deployment.yaml \
            -f alpine/alpine-job.yaml \
            -f app/app-deployment.yaml \
            -f phpmyadmin/phpmyadmin-deployment.yaml \
            -f mysql/mysql-deployment.yaml
            # -f ingress.yaml
sleep(30)
kubectl port-forward pod/$(kubectl get pods -l app=phpmyadmin -o jsonpath='{.items[0].metadata.name}') 55550:80 &
kubectl port-forward pod/$(kubectl get pods -l app=app -o jsonpath='{.items[0].metadata.name}') 5555:80 &
kubectl port-forward pod/$(kubectl get pods -l app=app -o jsonpath='{.items[0].metadata.name}') 5:8080
