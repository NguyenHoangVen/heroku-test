<?php
function pg_connection_string_from_database_url(){
	extract(parse_url($_ENV["DATABASE_URL"]));
	return "user=$user password=$pass host=$host dbname=" . substr($path,1);
}
	$db = pg_connect(pg_connection_string_from_database_url());
	if(!$db) {
		echo"Error:unable to open database \n";
	}else{
	echo "Opnened database successfully \n"
	}

	$sql="
		CREATE TABLE COMPANY2
		(ID INT FRIMARY KEY NOT NULL,
		NAME		TEXT NOT NULL,
		AGE		INT NOT NULL,
		ADDRESS		CHAR(50),
		SALARY		REAL);
"

	$ret = pg_query($db,$sql);
	if(!ret){
		echo pg_last_error($db);
	}else{
		echo "table created successfully \n"
	}
	pg_close($db);

 ?>
