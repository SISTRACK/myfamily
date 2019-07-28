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

///////////to resize the swap space///////////////
cat /proc/sys/vm/swappiness

sudo sysctl vm.swappiness=120

vm.swappiness=10

/////////////de activating the swap space or remove/////////////

sudo swapoff -v /swapfile

Next, remove the swap file entry /swapfile swap swap defaults 0 0 from the /etc/fstab file.

sudo rm /swapfile


CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';


GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';

FLUSH PRIVILEGES;

DROP USER ‘username’@‘localhost’;

REVOKE type_of_permission ON database_name.table_name FROM ‘username’@‘localhost’;



///////chart types////////////

line
bar
pie
progress


/////libries /////

Chartjs
Highcharts
Fusioncharts
Echarts
Frappe
C3

////genrate all the admins of the applictaion///////
php artisan system:admins-generate

///////////generate all the government users///////////////
php artisan government:users-generate

///////////generate all the system address informations////////
php artisan system:address-generate




/////////////material design /////////////////

<!-- Inverse -->
<i class="mdi mdi-attachment mdi-inverse"></i>

<!-- Animated --> 
<i class="mdi mdi-attachment mdi-spin"></i>
<i class="mdi mdi-attachment mdi-pulse"></i>

<!-- Fixed width -->
<i class="mdi mdi-attachment mdi-fw"></i>

<!-- Bordered -->
<i class="mdi mdi-attachment mdi-border"></i>

<!-- Pulled -->
<i class="mdi mdi-attachment pull-left"></i>
<i class="mdi mdi-attachment pull-right"></i>

<!-- Sizes -->
<i class="mdi mdi-attachment mdi-lg"></i>
<i class="mdi mdi-attachment mdi-2x"></i>
<i class="mdi mdi-attachment mdi-3x"></i>
<i class="mdi mdi-attachment mdi-4x"></i>
<i class="mdi mdi-attachment mdi-5x"></i>

<!-- Rotations -->
<i class="mdi mdi-attachment mdi-rotate-90"></i>
<i class="mdi mdi-attachment mdi-rotate-180"></i>
<i class="mdi mdi-attachment mdi-rotate-270"></i>

<!-- Flips -->
<i class="mdi mdi-attachment mdi-flip-horizontal"></i>
<i class="mdi mdi-attachment mdi-flip-vertical"></i>

<!-- In lists -->
<ul class="mdi-ul">
    <li><i class="mdi-li mdi mdi-keyboard-arrow-right"></i>Lorem ipsum dolor ...</li>
</ul>