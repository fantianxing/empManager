<?php
//该类是个业务逻辑类，主要完成对admin的逻辑操作
require_once 'SqlHelper.class.php';
class AdiminService {

    function AdiminService() {
    	
    }
    
    //提供一个验证用户是否合法的方法
    public function checkAdmin($id,$password){
    	$sql="select password,name from admin where id = '$id' ";
    	$sqlHelper=new SqlHelper();
    	$res=$sqlHelper->execute_dql($sql);
    	if ( $row =mysql_fetch_assoc($res)) {
			if ( $password=md5($row['password']) ) {
				return $row['name'];
			}	
		}
		//释放资源
		mysql_free_result($res);
		$sqlHelper->close_connect();
		return "";
    }
    
}
?>