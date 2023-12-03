<?php 
class DBCls{

    public function __construct() {
        spl_autoload_register();
    }
   
    public static function insert_query($table_name, $insertArray = []){
        # FINAL OUTPUT
        # INSERT INTO {table_name} (`{column_name_1}`, ...)
        # VALUES ('{value_1}', ...)
    
        # EXAMPLE VALUES
        // $table_name  =   "tbl_users";
        // $insertArray =   ['tbl_users_id'=>1, 'firstname'=>'Pat', 'middlename'=>'Hernal'];
    
        # CHECK KUNG MAY LAMAN YUNG INSERT ARRAY
        if($insertArray != NULL){
            $columnArray    =   [];
            $valueArray     =   [];
    
            # SEPARATION NG COLUMN AT VALUES
            foreach($insertArray as $column=>$value){
                array_push($columnArray, $column);
                array_push($valueArray, $value);
            }
        }
    
        # BUILD UP NG INSERT QUERY
        $query  =   "INSERT INTO $table_name (`".implode("`, `", $columnArray)."`) ";
        $query  .=  "VALUES ('".implode("', '", $valueArray)."')";
    
        return $query;
    }
    
    public static function update_query($table_name, $updateArray = [], $whereArray = [], $otherParam = ""){
        # FINAL OUTPUT
        # UPDATE {table_name}
        # SET `{column_1}` = '{value_1}', ...
        # WHERE `{column_1}` = '{value_1}', ... (required)
    
        # EXAMPLE VALUES
        # $table_name     =   "tbl_users";
        # $updateArray    =   ['firstname'=>'Pat', 'middlename'=>'Hernal'];
        # $whereArray     =   ['is_active'=>1, 'section'=>'1A'];
    
        # CHECK KUNG MAY LAMAN YUNG UPDATE ARRAY
        if($updateArray != NULL){
            $setArray   =   [];
    
            # SEPARATION NG COLUMN AT VALUES
            foreach($updateArray as $column=>$value){
                array_push($setArray, "`$column` = '$value'");
            }
        }
    
        # CHECK KUNG MAY LAMAN YUNG WHERE ARRAY
        if($whereArray != NULL){
            $paramArray   =   [];
    
            # SEPARATION NG COLUMN AT VALUES
            foreach($whereArray as $column=>$value){
                array_push($paramArray, "`$column` = '$value'");
            }
        }
    
        # BUILD UP NG UPDATE QUERY
        $query  =   "UPDATE $table_name ";
        $query  .=  "SET ".implode(", ", $setArray)." ";
        $query  .=  "WHERE ".implode(" AND ", $paramArray)." $otherParam";
    
        return $query;
    }
}
?>