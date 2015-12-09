<?php
	require_once('DAO.php');
	/**
	* This class is used to all operations which need to access database about user.
	*/
	class UserDAO extends DAO
	{	
		public  function addUser($uid, $pwd, $name, $age, $gender, $accounts) 
		{
			
            // Add user
            $stmt = $this->conn->prepare('INSERT INTO User VALUES(?, ?, ?, ?, ?)');
            echo "prepared";
	 		$stmt->bind_param('sssis', $uid, $pwd, $name,$age, $gender);
	 		echo "binded";
	 		$stmt->execute();
	 		echo "executed";
            $stmt->close();

            // Add account
            addAccounts($accounts);
		}
		
		public function updateUser($uid, $pwd) 
		{	
			$stmt = $this->conn->prepare('UPDATE User SET pwd=? WHERE uid=?');
			foreach ($accounts as $account) {
		 		$stmt->bind_param('ss', $pwd, $uid);
		 		$stmt->execute();
			 	$stmt->close();
			}
       
		}

		public function isExistUser($uid, $pwd) {
			$stmt = $this->conn->prepare('SELECT * FROM User WHERE uid=? AND pwd=?');
		 	$stmt->bind_param('ss', $uid, $pwd);
		 	$stmt->execute();

		 	$result= $stmt->get_result();
		 	$stmt->close();
			return count($result->fetch_all(MYSQLI_ASSOC))>0;
		}
			
		public function addAccounts($accounts)
		{
			if(count($accounts)>0) {			
				$stmt = $this->conn->prepare('INSERT INTO BankAccount VALUES(?, ?, ?)');
				foreach ($accounts as $account) {	
			 		$stmt->bind_param('ssd', $uid, $account['accountNumber'], $account['balance']);
			 		$stmt->execute();
				}
				$stmt->close();
			}
       
		}

		public function removeAccounts($accounts)
		{
			if(count($accounts)>0) {			
				$stmt = $this->conn->prepare('DELETE FROM BankAccount WHERE uid=? AND account_number=?');
				foreach ($accounts as $account) {
			 		$stmt->bind_param('ss', $uid, $account['accountNumber']);
			 		$stmt->execute();
				}
			 	$stmt->close();
			}
		}
		public function getAccounts($uid)
		{
			
		 	$stmt = $this->conn->prepare('SELECT * FROM Bank_Account WHERE uid=?');
		 	$stmt->bind_param('s', $uid);
		 	$stmt->execute();

		 	$result= $stmt->get_result();
		 	$stmt->close();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		public function getUser($uid) 
		{
			
		 	$stmt = $this->conn->prepare('SELECT * FROM User WHERE uid=?');
		 	$stmt->bind_param('s', $uid);
		 	$stmt->execute();

		 	$result= $stmt->get_result();
		 	$stmt->close();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		public function getAllUsers()
		{
			
		 	$stmt = $this->conn->prepare('SELECT * FROM User');
		 	$stmt->execute();

		 	$result= $stmt->get_result();
		 	$stmt->close();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
        



        /*
        	getAccount(#account) // not sure
        	
        	account = {
        		uid: "user id",
				accountNumber: "bc-#account",
				balance: "$$$$.$$"
        	}

			user = {
				uid: "",
				name: "",
				age: "",
				gender: "",
				account: [aid]
			}
        */


	}
?>
