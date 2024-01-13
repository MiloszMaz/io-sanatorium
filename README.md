# io-sanatorium
Aplikacja Sanatorium na potrzeby zajęć IO

# Docker
Laravel + mysql + phpmyadmin + mailhog + redis

## Instalacja
`docker-compose up -d`

1. Laravel
   http://localhost:8094/
2. MySql + phpmyadmin
   http://localhost:9046/
Plik z bazą danych z tabelami dodałem do ./data/sql/m1168_io_projekt.sql możecie wgrać sobie przez phpmyadmin do bazy danych
3. mailhog - sluzy do odbierania maili
   http://localhost:9048/
4. redis sluży jako kolejka i baza danych
