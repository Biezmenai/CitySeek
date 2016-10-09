## How to setup CitySeek development platform on XAMPP (Windows):
1. Install XAMPP: https://www.apachefriends.org/xampp-files/5.6.24/xampp-win32-5.6.24-1-VC11-installer.exe
2. Install Composer: https://getcomposer.org/Composer-Setup.exe
2. Edit C:\xampp\apache\conf\extra\httpd-vhosts.conf adding these lines: 

```<VirtualHost cityseek.dev:80>  

    DocumentRoot "C:\xampp\htdocs\cityseek\public"  
    
    ServerAdmin cityseek.dev  
    
    <Directory "C:\xampp\htdocs\cityseek">  
    
        Options Indexes FollowSymLinks  
        
        AllowOverride All  
        
        Require all granted  
        
    </Directory>  
    
</VirtualHost>```

## Orientacinių varžybų sistema

Projektinis darbas: Orientacinių varžybų sistema
Akademinė grupė: IF-4/9
Kūrėjai:
* Darius Kraujutaitis (darius.kraujutaitis@ktu.edu)
* Lukas Kučinskas (lukas.kucinskas@ktu.edu)
* Kristupas Vaitkus (kristupas.vaitkus@ktu.edu)
* Linas Levanas (linas.levanas@ktu.edu)
