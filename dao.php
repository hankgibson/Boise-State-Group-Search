<?php
class Dao 
{

   private $host = "localhost";
   private $db = "hgibson";
   private $user = "hgibson";
   private $pass = "webdev2013";

   public function getConnection () 
   {
      return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
         $this->pass);
   }

   public function getCourses()
   {
      $conn = $this->getConnection();
      $getQuery = "SELECT DISTINCT course_name FROM meetup ORDER BY course_name";
      $q = $conn->prepare($getQuery);
      $q->execute();
      return $q->fetchAll();
   }

   public function getLocations()
   {
      $conn = $this->getConnection();
      $getQuery = "SELECT DISTINCT location FROM meetup ORDER BY location";
      $q = $conn->prepare($getQuery);
      $q->execute();
      return $q->fetchAll();
   }

   public function getResultsDays($days)
   {
      $days = json_decode($days);
      $result = null;
      
      
      foreach($days as $day) 
      {
         $conn = $this->getConnection();
         $getQuery = "SELECT * FROM meetup WHERE days LIKE :day";
         $q = $conn->prepare($getQuery);
         $day = "%".$day."%";
         $q->bindParam(":day", $day);

         $q->execute();
         $result = $q->fetchAll();
      }
      return $result;
   }

   public function getResultsCollegeName($collegeName)
   {
      $collegeName = htmlspecialchars($collegeName);
      $conn = $this->getConnection();
      $getQuery = "SELECT * FROM meetup WHERE college_name = :collegename";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":collegename", $collegeName);
      $q->execute();
      return $q->fetchAll();
   }

   public function getResultsCourseName($courseName)
   {
      $courseName = htmlspecialchars($courseName);
      $conn = $this->getConnection();
      $getQuery = "SELECT * FROM meetup WHERE course_name = :courseName";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":courseName", $courseName);
      $q->execute();
      return $q->fetchAll();
   }


   public function getResultsLocation($location)
   {
      $conn = $this->getConnection();
      $getQuery = "SELECT * FROM meetup WHERE location = :location";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":location", $location);
      $q->execute();
      return $q->fetchAll();
   }


   public function getResultsTime($time)
   {
      $conn = $this->getConnection();
      $getQuery = "SELECT * FROM meetup WHERE meettime = :time";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":time", $time);
      $q->execute();
      return $q->fetchAll();
   }


   public function getUserGroups($email) 
   {
      $conn = $this->getConnection();

      $getQuery = "SELECT m"."."."days, m"."."."createdby, m"."."."id, m"."."."location, m"."."."num_members, m"."."."meettime, 
      m"."."."college_name, m"."."."course_name, m"."."."max_num_members FROM user u, meetup m, 
      mygroup g WHERE u"."."."email= :email and  u"."."."id = g"."."."student_id and 
      g"."."."table_id= m"."."."id";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":email", $email);
      $q->execute();
      return $q->fetchAll();
   }

   public function getNumUserGroups($userID)
   {
      $conn = $this->getConnection();
      $getQuery = "SELECT count(*) FROM mygroup WHERE student_id= :userID";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":userID", $userID);
      $q->execute();
      return $q->fetch();
   }

   public function getUserInfo($email) 
   {
      $conn = $this->getConnection();
      $getQuery = "SELECT id, fname, lname, email, class_year FROM user WHERE email= :email";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":email", $email);
      $q->execute();
      return $q->fetch();
   }

   public function searchGroups($email)
   {
      $conn = $this->getConnection();

      $getQuery = "SELECT id, fname, lname, email FROM user WHERE email= :email";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":email", $email);
      $q->execute();
      $userID= $q->fetch();

      $getQuery = "SELECT m"."."."days, m"."."."createdby, m"."."."id, m"."."."location, m"."."."num_members, m"."."."meettime, 
      m"."."."college_name, m"."."."course_name, m"."."."max_num_members FROM meetup m WHERE m"."."."id NOT IN (
         SELECT c"."."."table_id FROM mygroup c WHERE c"."."."student_id = :userID)";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":userID", $userID["id"]);
      $q->execute();
      return $q->fetchAll();
   }

   public function addUser ($fname, $lname, $email, $password, $class, $sex, $bdateday, $bdatemonth, $bdateyear)
   {
      $member = "MEMBER";
      $sexchar = substr($sex, 0, 1);
      $groupcount = 0;
      $conn = $this->getConnection();
      $saveQuery =
      "INSERT INTO user
      (fname, lname, permission, email, password, class_year, birthdateday, birthdatemonth, birthdateyear, sex, groupcount)
      VALUES
      (:fname, :lname, :permission, :email, :password, :class_year,  :bdateday, :bdatemonth, :bdateyear, :sex, :groupcount)";
      $q = $conn->prepare($saveQuery);
      $q->bindParam(":fname", $fname);
      $q->bindParam(":lname", $lname);
      $q->bindParam(":permission", $member);
      $q->bindParam(":email", $email);
      $q->bindParam(":password", $password);
      $q->bindParam(":class_year", $class);
      $q->bindParam(":bdateday", $bdateday);
      $q->bindParam(":bdatemonth", $bdatemonth);
      $q->bindParam(":bdateyear", $bdateyear);
      $q->bindParam(":sex", $sexchar);
      $q->bindParam(":groupcount", $groupcount);
      $q->execute();
   }

   public function addGroup ($collegename, $coursename, $instructor, $semester, $days, $time, $membernum, $location, $createdby)
   {
      $nummembers = "1";

      $daysstring = implode(",", $days);

      $conn = $this->getConnection();
      $saveQuery =
      "INSERT INTO meetup
      (location, max_num_members, num_members, college_name, course_name, instructor, meettime, semester, days, createdby)
      VALUES
      (:location, :max_num_members, :num_members, :college_name, :course_name, :instructor, :meettime, :semester, :days, :createdby)";
      $q = $conn->prepare($saveQuery);
      $q->bindParam(":location", $location);
      $q->bindParam(":max_num_members", $membernum);
      $q->bindParam(":num_members", $nummembers);
      $q->bindParam(":college_name", $collegename);
      $q->bindParam(":course_name", $coursename);
      $q->bindParam(":instructor", $instructor);
      $q->bindParam(":meettime", $time);
      $q->bindParam(":semester", $semester);
      $q->bindParam(":days", $daysstring);
      $q->bindParam(":createdby", $createdby);
      $q->execute();
   }

   public function addUserToGroupSearch($id, $userEmail)
   {
      $conn = $this->getConnection();

      $getQuery = "SELECT id FROM user WHERE email = :email";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":email", $userEmail);
      $q->execute();
      $userID = $q->fetch();

      $insertQuery = "SELECT COUNT(*) 'count' FROM  mygroup WHERE student_id = :userID AND table_id = :groupID";
      $q = $conn->prepare($insertQuery);
      $q->bindParam(":userID", $userID["id"]);
      $q->bindParam(":groupID", $id);
      $q->execute();
      $inGroupAlready = $q->fetch();

      if(!(($inGroupAlready["count"])>0))
      {
         $insertQuery = "INSERT INTO mygroup(student_id, table_id) VALUES(:userID, :groupID)";
         $q = $conn->prepare($insertQuery);
         $q->bindParam(":userID", $userID["id"]);
         $q->bindParam(":groupID", $id);
         $q->execute();

         $updateQuery = "UPDATE meetup SET num_members=num_members+1 WHERE id =:id";
         $u = $conn->prepare($updateQuery);
         $u->bindParam(":id", $id);
         $u->execute();
      }
   }

   public function leaveGroup($id, $userEmail)
   {

      $conn = $this->getConnection();
      $getQuery = "SELECT id FROM user WHERE email = :email";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":email", $userEmail);
      $q->execute();
      $userID = $q->fetch();

      $deleteQuery = "DELETE FROM mygroup WHERE student_id = :userID AND table_id = :groupID";
      $q = $conn->prepare($deleteQuery);
      $q->bindParam(":userID", $userID["id"]);
      $q->bindParam(":groupID", $id);
      $q->execute();

      $updateQuery = "UPDATE meetup SET num_members=num_members-1 WHERE id =:id";
      $u = $conn->prepare($updateQuery);
      $u->bindParam(":id", $id);
      $u->execute();

   }

   public function addUserToGroup($course, $email)
   {
      $conn = $this->getConnection();

      $getQuery = "SELECT id FROM user WHERE email= :email";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":email", $email);
      $q->execute();
      $userID = $q->fetch();

      $getQuery = "SELECT id FROM meetup WHERE createdby= :email and course_name = :course";
      $q = $conn->prepare($getQuery);
      $q->bindParam(":email", $email);
      $q->bindParam(":course", $course);
      $q->execute();
      $groupID = $q->fetch();

      $insertQuery = "INSERT INTO mygroup(student_id, table_id) VALUES(:userID, :groupID)";
      $q = $conn->prepare($insertQuery);
      $q->bindParam(":userID", $userID["id"]);
      $q->bindParam(":groupID", $groupID["id"]);
      $q->execute();
   }

   public function isPasswordCorrect($email, $password)
   {
      $conn = $this->getConnection();

      $checkQuery = "SELECT password FROM user WHERE email = :email";
      $q = $conn->prepare($checkQuery);
      $q->bindParam(":email", $email);

      $q->execute();
      $rows = $q->fetchAll();

      foreach ($rows as $row) 
      {
         if ($password === $row["password"])
         {
            return TRUE;
         }
      }

      return FALSE;
   }
}
