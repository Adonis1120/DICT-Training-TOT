<?php
    Class Developer {
        public $developer_id;
        public $first_name;
        public $last_name;
        public $title;
        public $hourly_rate;

        public $conn;

        function __construct($db) {
            $this->conn = $db;
        }

        function readDeveloper() {
            $query = "SELECT * FROM developer";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            
            return $stmt;
        }

        function createDeveloper() {
            $query = "INSERT INTO developer SET first_name = ?, last_name = ?, title = ?, hourly_rate = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->first_name);
            $stmt->bindParam(2, $this->last_name);
            $stmt->bindParam(3, $this->title);
            $stmt->bindParam(4, $this->hourly_rate);

            if ($stmt->execute()) {
                echo
                "<script>
                    alert('Record was successfully created.');
                    window.location.href = 'developer_crud.php';
                </script>";
            } else {
                echo
                "<script>
                    alert('Error');
                </script>";
            }
        }

        function updateDeveloper() {
            $query = "UPDATE developer SET first_name = ?, last_name = ?, title = ?, hourly_rate = ? WHERE developer_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->first_name);
            $stmt->bindParam(2, $this->last_name);
            $stmt->bindParam(3, $this->title);
            $stmt->bindParam(4, $this->hourly_rate);
            $stmt->bindParam(5, $this->developer_id);

            if ($stmt->execute()) {
                echo
                "<script>
                    alert('Record was successfully updated.');
                    window.location.href = 'developer_crud.php';
                </script>";
            } else {
                echo
                "<script>
                    alert('Error');
                </script>";
            }
        }

        function deleteDeveloper() {
            $query = "DELETE FROM developer 
                WHERE developer_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->developer_id);
            
            if ($stmt->execute()) {
                echo
                "<script>
                    alert('Record was successfully deleted');
                    window.location.href = 'developer_crud.php';
                </script>";
            } else {
                echo
                "<script>
                    alert('Error');
                </script>";
            }
        }
        
        function selectDeveloper() {
            $query = "SELECT * FROM developer WHERE developer_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->developer_id);
            $stmt->execute();

            $selected_result = [];
            foreach($stmt as $selected){
                $selected_result = $selected;
            }

            return $selected_result;
        }
        

        public function searchResults($developer_id) {
            $query = "SELECT * FROM developer WHERE developer_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $developer_id);
            $stmt->execute();
        
            return $stmt; // Return the statement object. Fetching later will be used later instead.
            // In this code, you can decide later to use fetch() or fetchAll().
        }
        
        /* Search for PDO including fetchAll now in the code
        public function searchResults($developer_id)
        {
            $query = "SELECT * FROM developer WHERE developer_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $developer_id);

            // Execute the query
            if ($stmt->execute()) {
                // Fetch results
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // Handle query failure
                echo "<script>alert('Error executing the search query');</script>";
                $results = [];
            }

            return $results;
        }
        */
        
        /* Search for mysqli
         public function searchResults($query)
        {
            echo "<script>alert('$query');</script>";
            //$query = "%{$query}%"; // used when using like
            $stmt = $this->conn->prepare("SELECT * FROM developer WHERE developer_id = ?");
            $stmt->bind_param("s", $query);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            $results = [];
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }

            return $results;
        } */
    } 
?>