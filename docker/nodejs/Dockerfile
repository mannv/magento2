FROM node:10.16.3

#The host is set to 0.0.0.0 to give full external access to the app container.
ENV HOST 0.0.0.0

RUN apt update \
    && apt install -y nano curl

# install yarn
RUN apt -y install yarn \
    && yarn --version

#################################
#####   install pm2         #####
#################################
RUN npm install pm2 -g

#--------------------------------------------------------------------------
# Set Timezone
#--------------------------------------------------------------------------
ENV TZ Asia/Bangkok
RUN apt-get install -y tzdata \
    && cp /usr/share/zoneinfo/$TZ /etc/localtime \
    && echo $TZ > /etc/timezone

USER node

WORKDIR /var/www
EXPOSE 3000
