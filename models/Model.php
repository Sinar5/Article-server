<?php 
abstract class Model{

    protected static string $table;
    protected static string $primary_key = "name";

    public static function find(mysqli $mysqli, string $name){
        $sql = sprintf("Select * from %s WHERE %s = ?", 
                        static::$table, 
                        static::$primary_key);
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("s", $name);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function all(mysqli $mysqli){
        $sql = sprintf("Select * from %s", static::$table);
        
        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while($row = $data->fetch_assoc()){
            $objects[] = new static($row); //creating an object of type "static" / "parent" and adding the object to the array
        }

        return $objects; //we are returning an array of objects!!!!!!!!
    }

    public static function create(mysqli $mysqli, $data)
    {
        $key = implode(',', array_keys($data));
        $value = "'" . implode( "','", array_values($data)) ."'";

        $sqlQuery = "INSERT INTO static::$table ($key) VALUES ($value)";
        $query = $mysqli->prepare($sqlQuery);
        if($query->execute()) {
            echo "Insert completed";
        }
        else 
        {
            echo "Error: ". $query->error;
        }
    }
    
    public static function delete(mysqli $mysqli, string $name)
    {
        $sql = sprintf("Delete from %s WHERE %s = ?", 
                        static::$table, 
                        static::$primary_key);
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("string", $name);

        if($query->execute()) {
            echo"delete completed";
        }
        else 
        {
            echo "Error: ". $query->error;
        }
        
    }

    public function update(mysqli $mysqli, $data)
    {
        $key = implode(',', array_keys($data));
        $value = "'" . implode( "','", array_values($data)) ."'";

        $sql = sprintf("UPDATE static::$table SET ($key) WHERE ($value)");
        $query = $mysqli->prepare($sql);
        if($query->execute()) {
            echo "Update completed";
        }
        else 
        {
            echo "Error: ". $query->error;
        }

    }

}



