#! /bin/bash

/home/sejavichan/data-integration/kitchen.sh -file=/home/sejavichan/TFG/procesos/job_casos_por_municipios.kjb -log=/home/sejavichan/TFG/procesos/log_procesos/log.log
mv /home/sejavichan/TFG/procesos/log_procesos/log.log /home/sejavichan/TFG/procesos/log_procesos/log_$(date +%F).log
