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
debconf-set-selections <<< "phpmyadmin phpmyadmin/setup-password password $DBPASSWD"
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
sudo service apache2 restart

echo Instalando git ***************************************************************
sudo aptget install git

echo Instalando SSMTP**************************************************************
sudo apt-get -y install ssmtp
#sudo apt-get -y install sendmail
echo "root=elrincondelsin.mail@gmail.com" >> /etc/ssmtp/ssmtp.conf 
echo "mailhub=smtp.gmail.com:587" >> /etc/ssmtp/ssmtp.conf 
echo "AuthUser=elrincondelsin.mail@gmail.com" >> /etc/ssmtp/ssmtp.conf 
echo "AuthPass=elrincon" >> /etc/ssmtp/ssmtp.conf 
echo "UseTLS=YES" >> /etc/ssmtp/ssmtp.conf 
echo "UseSTARTTLS=YES" >> /etc/ssmtp/ssmtp.conf 
echo "FromLineOverride=YES" >> /etc/ssmtp/ssmtp.conf 
echo "rewriteDomain=gmail.com" >> /etc/ssmtp/ssmtp.conf 

echo "root:elrincondelsin.mail@gmail.com:smtp.gmail.com:587" >> /etc/ssmtp/revaliases

echo "ServerName localhost" >> /etc/apache2/apache2.conf

#echo "sendmail_path = /usr/sbin/ssmtp -t -i" >> /etc/php5/apache2/php.ini
#echo "127.0.1.1 vagrant-ubuntu-trusty-64.localdomain vagrant-ubuntu-trusty-64" >> /etc/hosts

echo Ultimas configuraciones ******************************************************
sudo chmod 777 /var/www/html/
rm /var/www/html/index.html
sudo service apache2 restart
