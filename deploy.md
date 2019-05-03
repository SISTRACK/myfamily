## sign up with the digital ocean

## comfirm the email from the email inbox

## fill the bill information

## create droplet including the configuration 

## check your email and get the nnserver detail




## adding swap space 

sudo swapon --show

sudo fallocate -l 1G /swapfile

sudo dd if=/dev/zero of=/swapfile bs=1024 count=1048576

sudo chmod 600 /swapfile

sudo mkswap /swapfile

sudo swapon /swapfile

///////paste the following line in the file ///////////

/swapfile swap swap defaults 0 0

///////////to see the space /////////////
sudo swapon --show

cat /proc/sys/vm/swappiness

sudo sysctl vm.swappiness=10

vm.swappiness=10

/////////////de activating the swap space/////////////

sudo swapoff -v /swapfile

Next, remove the swap file entry /swapfile swap swap defaults 0 0 from the /etc/fstab file.

sudo rm /swapfile

