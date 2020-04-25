# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/trusty64"
  
  #config.vm.hostname = "lamp" 
  
  config.vm.network "private_network", ip: "192.168.33.10"
  #config.vm.network "forwarded_port", guest: 80, host: 8080
  
  config.vm.synced_folder ".", "/var/www/html"
  config.vm.provider "virtualbox" do |vb|
	vb.name = "lamp rincon"
	vb.memory = "512"
	vb.cpus = "1"
  end
  config.vm.provision "shell", path: "instalacion.sh"
end
