# Dependencies

* php>=7.3
* composer>=2.0.8
    
# Dependencies running with docker 

* Docker
   
## Installation (standard)
1. git clone https://github.com/BrenoLopez/challenge-mobix.git
2. composer install

## Installation (Docker)
1. git clone https://github.com/BrenoLopez/challenge-mobix.git
    
 ## Running (standard)
3. If you are running on linux run command cp .env.example .env otherwise copy file .env.example and, create new .env file and paste
4. php artisan key:generate
5. php artisan serve

## Running with Docker 
1. sudo docker-compose build app
2. sudo docker-compose up -d
3. sudo docker-compose exec app composer install
4. sudo docker-compose exec app php artisan key:generate
 
# Routes 
 ## API http://agendamais.app.br/api
  | resource   | description | 
  | ---------- | ----------- |
  |/main-character/book/{id}| returns the main characters details of the ice and fire chronicle|
  |/character-details?characters={characters,...}&detail={detail}| returns detail of one or more characters|
  |/book-cover?isbn={isbn,...} | returns an array of base64 images from one or more books via isbn|
  |/book-by-character/{id} | returns all books related to a character|
    
## License
[MIT](https://choosealicense.com/licenses/mit/)
