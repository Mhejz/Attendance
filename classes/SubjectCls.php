<?php 
    class SubjectCls{

        public function __construct() {
            spl_autoload_register();
        }
        
        function query_generator($action, $table_name, $fields = [NULL], $params = [NULL], $other_param = ""){
        
            $conn = $GLOBALS['config']['mysql'];
        
            switch ($action) {
                case "SELECT":
                    # CHECK KUNG MAY LAMAN YUNG WHERE ARRAY
                    if($params != NULL){
                        $paramArray   =   [];
                        # SEPARATION NG COLUMN AT VALUES
                        foreach($params as $column=>$value){
                            array_push($paramArray, "`$column` = '$value'");
                        }
                    }
        
                    switch ($table_name) {
        
                        case "tblAllSubjectsList":
                            $data = [];
                            $query  =   "SELECT * FROM tbl_subjects
                                        WHERE ".implode(" AND ", $paramArray)." $other_param";
                            $result = $conn->query($query);
        
                            while($row = $result->fetch_assoc()) {
                                $data[] =   [
                                    'id'               =>  $row['id'],
                                    'subject_name'     =>  $row['subject_name'],
                                    'is_active'        =>  $row['is_active'],
                                    'is_deleted'       =>  $row['is_deleted'],
                                    'created_on'       =>  $row['created_on'],
                                ];
                            }
                            return $data;
                            break;
                    }
                    break;
                    
                case "INSERT":
                    $insert_query = DBCls::insert_query($table_name, $fields);

                    if($conn->query($insert_query) == TRUE){
                        return "new record added";
                    }else{
                        return "error" . $insert_query . "<br>" . $conn->error;
                    }
                    break;
                case "UPDATE":
                    $update_query = DBCls::update_query($table_name, $fields, $params, $other_param);

                    if($conn->query($update_query) == TRUE){
                        return "record updated";
                        header('location:../index.php');
                    }else{
                        return "error" . $update_query . "<br>" . $conn->error;
                    }
                    break;
                // case "DELETE":
                //     return delete_query($table_name, $params);
                //     break; 
                // default:
                //   code to be executed if n is different from all labels;
            }
        }
    }
?>