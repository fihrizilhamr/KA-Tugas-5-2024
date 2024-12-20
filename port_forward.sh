kubectl port-forward pod/$(kubectl get pods -l app=phpmyadmin -o jsonpath='{.items[0].metadata.name}') 55550:80 &
kubectl port-forward pod/$(kubectl get pods -l app=app -o jsonpath='{.items[0].metadata.name}') 5555:80 &
kubectl port-forward pod/$(kubectl get pods -l app=app -o jsonpath='{.items[0].metadata.name}') 5:8080