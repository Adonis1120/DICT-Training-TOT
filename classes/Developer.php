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

        function searchDeveloper($search_query) {
            $query = "SELECT * FROM developer 
                    WHERE first_name LIKE ?
                       OR last_name LIKE ? 
                       OR title LIKE ?";
            $stmt = $this->conn->prepare($query);
            $search_query = "%" . $search_query . "%";  // No need to use this if "%" . $_POST['search_query'] . "%" was set as value in the declaration or instantiation of the object
            $stmt->bindParam(1, $search_query);
            $stmt->bindParam(2, $search_query);
            $stmt->bindParam(3, $search_query); // bindParam can also be used especially when you need sanitation later
            $stmt->execute();
            return $stmt;
        }

        /* Search Alternative Approach
        function searchDeveloper($query) {
            $sql = "SELECT * FROM developer 
                    WHERE first_name LIKE ? 
                       OR last_name LIKE ? 
                       OR title LIKE ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$query, $query, $query]);
            return $stmt;
        }

        Use this in the data section
        $search_query = "%" . $_POST['search_query'] . "%";
        $view_developer = $developer->searchDeveloper($search_query);
        */
        
        function selectDeveloper() {    // For the select option or combo box for Developer
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
    } 
?>