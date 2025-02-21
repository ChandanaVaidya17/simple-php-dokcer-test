# simple-php-dokcer-test


docker-compose down

docker-compose up -d

new terminal--
docker exec -it mysql_db mysql -uuser -ppassword studentdb -e "
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usn VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    semester INT NOT NULL
);"



docker exec -it mysql_db mysql -uuser -ppassword

