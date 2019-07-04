
Website yang dibangun terdiri dari 2 roles :
    1. Admin
    2. Customer

Untuk Login Customer :
    1.Registrasi terlebih dahulu
    2.Kemudah Login

Untuk Login Admin:
    1.Registrasi terlebih dahulu (sama seperti customer);
    2.Pada Database local : ubah table column admin menjadi 1. 
    (keterangan : 0=customer,1=admin)

Instalasi :
1.Buat Local Database dengan nama sesuai dengan env yang ada pada project ini (website berjalan pada localhost) :  
    DB_DATABASE=kopiqu
    DB_USERNAME=root
    DB_PASSWORD=
2.Setting Vhost :
	C:\Windows\System32\drivers\etc\hosts tambahkan 127.0.0.1 kopiqu.me
3.Apache Setting :
	C:\xampp\apache\conf\extra\httpd-vhosts 
	Tambahkan :
	<VirtualHost *:80>
		DocumentRoot "C:/xampp/htdocs/kopiqu/public"
		ServerName kopiqu.me
	</VirtualHost>

2.Lakukan migrate (php artisan migrate)
        

