<?php
    class Games {
        //db
        private $conn;
        private $table = 'games';
        //games properties
        public $id;
        public $Game_name;
        public $game_image;
        public $game_price;
        public $Desciption;
        public $Rating;

        //constructor with DB
        public function __construct($db) {
            $this->conn =$db;

        }
        public function read() {
            //create query
            $query = 'SELECT
                    id,                   
                    Game_name, 
                    game_image,
                    game_price,
                    g.Description,
                    Rating
                FROM '. $this->table .' g
                ORDER BY
                    id';
            //preapare statement
            $stmt = $this->conn->prepare($query);

            //Execute query
            $stmt->execute();

            return $stmt;

        }
        public function read_single(){
            //create query
            $query = 'SELECT
                    id,                   
                    Game_name, 
                    game_image,
                    game_price,
                    g.Description,
                    Rating
                FROM '. $this->table .' g
                WHERE 
                    id = ?
                LIMIT 0,1';

                //prepare statement
                $stmt = $this->conn->prepare($query);

                // Bind ID
                $stmt->bindParam(1, $this->id);

                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                //set properties
                $this->id = $row['id'];
                $this->Game_name = $row['Game_name'];
                $this->game_image = $row['game_image'];
                $this->game_price = $row['game_price'];
                $this->Description = $row['Description'];
                $this->Rating = $row['Rating'];

        }

        //create Post
        public function create() {
            //create query
            $query = 'INSERT INTO ' . $this->table . '
                SET
                    Game_name  = :Game_name,
                    game_image = :game_image,
                    game_price = :game_price,
                    Description = :Description,
                    Rating = :Rating';

                //prepare statement
                $stmt = $this->conn->prepare($query);

                //clean data
                $this->Game_name = htmlspecialchars(strip_tags($this->Game_name));
                $this->game_image = htmlspecialchars(strip_tags($this->game_image));
                $this->game_price = htmlspecialchars(strip_tags($this->game_price));
                $this->Description = htmlspecialchars(strip_tags($this->Description));
                $this->Rating = htmlspecialchars(strip_tags($this->Rating));

                //bind data
                $stmt->bindparam(':Game_name', $this->Game_name);
                $stmt->bindparam(':game_image', $this->game_image);
                $stmt->bindparam(':game_price', $this->game_price);
                $stmt->bindparam(':Description', $this->Description);
                $stmt->bindparam(':Rating', $this->Rating);

                // Execute query
                if($stmt->execute()){
                    return true;
                }
                //print error if something goes wrong
                printf("Error:%s.\n" . $stmt->error);
                return false;
        }
        public function update() {
            //create query
            $query = 'UPDATE ' . $this->table . '
                SET
                    Game_name  = :Game_name,
                    game_image = :game_image,
                    game_price = :game_price,
                    Description = :Description,
                    Rating = :Rating
                WHERE
                    id = :id';

                //prepare statement
                $stmt = $this->conn->prepare($query);

                //clean data
                $this->Game_name = htmlspecialchars(strip_tags($this->Game_name));
                $this->game_image = htmlspecialchars(strip_tags($this->game_image));
                $this->game_price = htmlspecialchars(strip_tags($this->game_price));
                $this->Description = htmlspecialchars(strip_tags($this->Description));
                $this->Rating = htmlspecialchars(strip_tags($this->Rating));
                $this->id = htmlspecialchars(strip_tags($this->id));

                //bind data
                $stmt->bindparam(':Game_name', $this->Game_name);
                $stmt->bindparam(':game_image', $this->game_image);
                $stmt->bindparam(':game_price', $this->game_price);
                $stmt->bindparam(':Description', $this->Description);
                $stmt->bindparam(':Rating', $this->Rating);
                $stmt->bindparam(':id', $this->id);

                // Execute query
                if($stmt->execute()){
                    return true;
                }
                //print error if something goes wrong
                printf("Error:%s.\n" . $stmt->error);
                return false;
        }

        //Delete Post
        Public function delete()  {
            //create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
            
            //prepare statement
            $stmt = $this->conn->prepare($query);
            
            //Clean Data 
            $this->id = htmlspecialchars(strip_tags($this->id));
           
            //Bind Data
            $stmt->bindparam(':id', $this->id);

            // Execute query
            if($stmt->execute()){
                return true;
            }
            //print error if something goes wrong
            printf("Error:%s.\n" . $stmt->error);
            return false;
        }
    }