<?php
	/**
	 * This class is used to connect to database.
	 */
    class DAO {
        protected  $conn;

        public function __construct() {
            $conn = new mysqli("localhost", "root", "root", "SportLottery");

            // Check connection
            if ($conn->connect_error) {
                echo $conn->connect_error;
                return;
            }
            if(!$conn->set_charset('utf8')) {
              echo 'charset utf-8 can\'t be loaded';
            }
            $this->conn = $conn;

        }
                
   //      /**
   //       * When boss or supervisor admits or rejects the leave application,
   //       * leave allow will be updated. Also, if admit, the application will be
   //       * put in table LeaveRecord and update the applicant's leaved hours which
   //       * is recorded in table LeaveHour.
   //       *
   //       * @param int $application_no indicates which application to be checked.
   //       * @param int $who incicates who does this decision. 1 for supervisor and 2 for boss.
   //       * @param boolean $allow indicates if the applicatioln is admitted or not.
   //       * @param string $remark explains why supervisor to do this decision, it could be null.
   //       */
   //      public static function checkLeave($application_data, $who, $allow, $remark) {
   //          $conn = DBUtils::connect();
   //          try {
   //          	// Commit manually.
   //              $conn->autocommit(false);
   //              $stmt = $conn->prepare("UPDATE LeaveAllow SET status_no=?, remark=? WHERE application_no=? AND allow_type=?");
   //              $stmt->bind_param("isii", $allow?2:3, $remark, $application_data['application_no'], $who);
   //              $stmt->execute();
                
   //              if($check) { 
   //              	// The application is admitted and. Then add it into datdbase.
   //                  $year = substr($application_data['start_time'], 0, 4);
                    
   //                  $stmt = $conn->prepare("INSERT INTO LeaveRecord (record_year, application_no) VALUES(?, ?)");
   //                  $stmt->bind_param("si", $year,$application_data['application_no']);
   //                  $stmt->execute();
                    
   //                  $stmt = $conn->prepare("UPDATE LeaveHour SET leaved_hour=? WHERE type_no=? AND staff_id=? AND leave_year=?");
   //                  // Notes that the hours needs to be figured out and put into $application_data.
   //                  $stmt->bind_param("iiss", $application_data['hours'], $application_data['type_no'], $application_data['applicant'], $year);
   //                  $stmt->execute();
   //              }
                
   //              $stmt->close();
   //              $conn->commit();
                
   //          } catch(Exception $e) {
   //              $conn->rollback();
   //          }
   //          $conn->close();
   //      }
        
		
		 // public static function getUser($id) {
		 // 	$conn = DBUtils::connect();
		 // 	$stmt = $conn->prepare('SELECT hash FROM User WHERE id=?');
		 // 	$stmt->bind_param('s', $id);
		 // 	$stmt->execute();
		 // 	$result= $stmt->get_result();
		 // 	$stmt->close();
		 // 	$conn->close();
			// return $result->fetch_array();
		 // }
	}
?>
