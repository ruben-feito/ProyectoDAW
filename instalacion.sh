DBUSER=root
DBPASSWD=rootroot

echo Aprovisionando ***************************************************************
sudo apt-get -y update

echo Instalando apache2 ***********************************************************
sudo apt-get -y install apache2

echo Instalando mysql *************************************************************
debconf-set-selections <<< "mysql-server-5.5 mysql-server/root_password password $DBPASSWD"
debconf-set-selections <<< "mysql-server-5.5 mysql-server/root_password_again password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
debconf-set-selections <<< "phpmyadmin	phpmyadmin/setup-password password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect none"
sudo apt-get install -y mysql-server-5.5 
sudo apt-get install -y phpmyadmin
sudo mysql_install_db

mysql -uroot -p$DBPASSWD -e "SOURCE /var/www/html/restaurante.sql"

echo Instalando php5 **************************************************************
sudo apt-get -y install php5 libapache2-mod-php5 php5-mcrypt php5-mysql

echo Instalando git ***************************************************************
sudo aptget install git

echo Ultimas configuraciones ******************************************************
sudo service apache2 restart
sudo chmod 777 /var/www/html/
rm /var/www/html/index.html
sudo apt-get -y install ssmtp
sudo apt-get -y install sendmail