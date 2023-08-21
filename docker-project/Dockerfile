

# ใช้ Base Image ของ PHP 8.2 และ Apache
FROM php:7.2-apache

# ติดตั้ง extension ของ PHP ที่จำเป็นสำหรับโปรเจค
RUN docker-php-ext-install mysqli

# กําหนดโฟลเดอร์ที่จะใช้เป็น Document Root ของเว็บไซต์
WORKDIR /var/www/html

# คัดลอกไฟล์โปรเจค CodeIgniter 3 เข้าไปในคอนเทนเนอร์
COPY ./application /var/www/html

# แก้ไขการเขียนข้อมูลในไดเร็กทอรี เพื่อให้ PHP สามารถเขียนข้อมูลได้ (ต้องถูกใช้ในกรณีจริง)
RUN chown -R www-data:www-data /var/www/html

# ปรับแก้ไขไฟล์การตั้งค่า Apache ให้ใช้ .htaccess ของ CodeIgniter ได้
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

# เปิดใช้งาน mod_rewrite ของ Apache สำหรับใช้งาน URL rewriting ของ CodeIgniter
RUN a2enmod rewrite

# Expose พอร์ต 80 เพื่อให้สามารถเข้าถึงเว็บเซิร์ฟเวอร์ได้
EXPOSE 80

# เริ่มเซิร์ฟเวอร์ Apache เมื่อทำการสร้าง Container
CMD ["apache2-foreground"]
