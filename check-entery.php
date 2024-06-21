public function listAccomodation(){			
		
        $sqlQuery = "
            SELECT id, accomodation, description
            FROM ".$this->accomodationTable." ";
                        
        if(!empty($_POST["order"])){
            $sqlQuery .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            $sqlQuery .= ' ORDER BY id ASC ';
        }
        
        if($_POST["length"] != -1){
            $sqlQuery .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $result = $stmt->get_result();	
        
        $stmtTotal = $this->conn->prepare($sqlQuery);
        $stmtTotal->execute();
        $allResult = $stmtTotal->get_result();
        $allRecords = $allResult->num_rows;
        
        $displayRecords = $result->num_rows;
        $records = array();	
    
        while ($accomodation = $result->fetch_assoc()) { 				
            $rows = array();			
            $rows[] = $accomodation['id'];			
            $rows[] = $accomodation['accomodation'];
            $rows[] = $accomodation['description'];
            $rows[] = '<button type="button" 
    name="update" id="'.$accomodation["id"].'" 
    class="btn btn-warning btn-xs update"><span 
    class="glyphicon glyphicon-edit" title="Edit"></span></button>';			
            $rows[] = '<button type="button" 
    name="delete" id="'.$accomodation["id"].'" 
    class="btn btn-danger btn-xs delete" ><span 
    class="glyphicon glyphicon-remove" title="Delete"></span></button>';
            $records[] = $rows;
        }
        
        $output = array(
            "draw"	=>	intval($_POST["draw"]),			
            "iTotalRecords"	=> 	$displayRecords,
            "iTotalDisplayRecords"	=>  $allRecords,
            "data"	=> 	$records
        );
        
        echo json_encode($output);
    }