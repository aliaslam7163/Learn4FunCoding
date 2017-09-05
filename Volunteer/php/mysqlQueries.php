<?php
/* mysql Queries */

/* mysql add column to existing table

	ALTER TABLE `institutions` ADD `DateCreated` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `Affiliation`;
*/
	
/*

	//PHP Query for calling a Stored Procedure 
	
*/

/* 
		CREATE TEMPORARY TABLE existance(result int(1));
insert into existance select IF (exists(select * from institutions where institution = 'hELLO world' 
							and Username = 'TEST' and address = 'ADDR'),1,0);
Select * from existance
				
				
				
			
*/
	
?>