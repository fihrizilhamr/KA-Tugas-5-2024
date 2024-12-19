cd setup-cluster/kind/
bash 1-create-cluster.sh
bash 2-set-config.sh
bash 3-install-ingress.sh
bash 4-cek-ingress.sh
cd ../..

cd visualizer
bash download.sh
bash run.sh
cd ..
