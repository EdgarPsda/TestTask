<?php
class Interval{

    //database connection and table name
    private $conn;
    private $table_name = "intervals";

    //Object properties
    public $date_start;
    public $date_end;
    public $price;
    public $id;

    //setters

    /**
     * Set Date Start
     * @param $date_start
     * @return null
     */
    public function set_date_start($date_start){
        $this->date_start = $date_start;
    }

    /**
     * Set Date End
     * @param $date_end
     * @return null
     */
    public function set_date_end($date_end){
        
        $this->date_end = $date_end;
    }

    /**
     * Set Price
     * @param $price
     * @return null
     */
    public function set_price($price){
        
        $this->price = $price;
    }

    /**
     * Set Interval ID
     * @param $id
     * @return null
     */
    public function set_id($id){

        $this->id = $id;
    }

    //end setters

    /**
     * Constructor
     * @param $db
     * @return null
     */
    public function __construct($db){
        
        $this->conn = $db;
    }

    //Public functions

    /**
     * Index
     * @param null
     * @return $result
     */
    public function index(){
        $query = "SELECT * FROM $this->table_name ORDER BY date_start ASC";

        //prepare query
        $stmt = $this->conn->prepare($query);

        //execute query
        if($stmt->execute()){
            return $stmt;
        }

        return false;

    }

    /**
     * Add interval
     * @param $date_start
     * @param $date_end
     * @param $price
     * 
     * @return bool
     */
    public function add_interval(){

        $query = "INSERT INTO $this->table_name 
                (id, date_start, date_end, price) 
                VALUES(0, '$this->date_start', '$this->date_end', '$this->price')";
        //prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->date_start = htmlspecialchars(strip_tags($this->date_start));
        $this->date_end = htmlspecialchars(strip_tags($this->date_end));
        $this->price = htmlspecialchars(strip_tags($this->price));

        //execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    /**
     * Delete interval
     * @param $id
     * 
     * @return reponse
     */
    public function delete(){
        // query to delete
        $query = "DELETE FROM $this->table_name WHERE id = $this->id";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    /**
     * Update Interval
     * @param $id
     * @param $date_start
     * @param $date_end
     * @param $price
     * 
     * @return response
     */
    public function update(){

        $query = "UPDATE $this->table_name 
                    SET 
                        date_start = '$this->date_start', 
                        date_end = '$this->date_end', 
                        price = '$this->price' 
                    WHERE id = '$this->id'";
        // prepare query
        $stmt = $this->conn->prepare($query);

        $this->date_start = htmlspecialchars(strip_tags($this->date_start));
        $this->date_end = htmlspecialchars(strip_tags($this->date_end));
        $this->price = htmlspecialchars(strip_tags($this->price));

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    /**
     * Validate Interval
     * @param $dateStart
     * @param $dateEnd
     * @param $price
     * 
     * @return response
     */
    public function validate_interval($dateStart, $dateEnd, $price){

        $query = "SELECT * FROM intervals";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $intervals = $stmt->fetchAll();

        foreach($intervals as $interval){
            if($dateStart < $interval['date_end']){
                if($dateStart == $interval['date_start'] && $dateEnd >= $interval['date_end']){
                    if($price > $interval['price']){
                        $this->set_date_start($dateStart);
                        $this->set_date_end($dateEnd);
                        $this->set_price($price);
                        $this->set_id($interval['id']);

                        $this->update();
                        return 1;
                    }
                }else{
                    if($dateStart > $inteval['date_start']){
                        $this->set_date_start($interval['date_start']);
                        $this->set_date_end($dateStart);
                        $this->set_price($interval['price']);
                        $this->set_id($interval['id']);

                        $this->update();

                        $this->set_date_start($dateStart);
                        $this->set_date_end($dateEnd);
                        $this->set_price($price);

                        $this->add_interval();

                        return 1;
                    }
                }
            }
        }
        $this->set_date_start($dateStart);
        $this->set_date_end($dateEnd);
        $this->set_price($price);

        $this->add_interval();
    }

    /**
     * 
     */

    //end Public functions
}

?>