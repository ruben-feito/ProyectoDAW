# -*- mode: ruby -*-
# vi: set ft=ruby :

mysql_root_password = "root"

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/trusty64"

  #config.vm.hostname = "lamp" 
  
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.provider "virtualbox" do |vb|
	vb.name = "lamp rincon"
	vb.memory = "512"
	vb.cpus = "1"
  end
  config.vm.provision "shell", inline: <<-SHELL
	echo Aprovisionando ***********************
	sudo apt-get -y update
	
	echo Instalando apache2 *******************
	sudo apt-get -y install apache2
	
	echo Instalando mysql *********************
	sudo apt-get install mysql-server php5-mysql-server
	sudo debconf-set-selections <<< \"mysql-server mysql-server/root_password password #{mysql_root_password}\""
	sudo debconf-set-selections <<< \"mysql-server mysql-server/root_password_again password #{mysql_root_password}\""
	sudo mysql_install_db
	sudo mysql_server_installation
	
	echo Instalando php5 **********************
	sudo apt-get -y install php5 libapache2-mod-php5 php5-mcrypt
	
	
	echo Instalando git ***********************
	sudo aptget install git
	
	echo Ultimas configuraciones **************
	sudo service apache2 restart
	sudo chmod 777 /var/www/html/
	
	SHELL
end
