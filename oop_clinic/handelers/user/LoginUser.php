<?php
    if(session_status() == PHP_SESSION_NONE) session_start();
    require_once "../Connection.php";
$_SESSION['auth']=[];
    class LoginUser extends Connection
    {

        public $Email;
        public $Password;



        public function checkRequest(){
            if($_SERVER['REQUEST_METHOD']=='POST'){

                $this->Email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                $this->Password = trim(stripslashes(htmlspecialchars(htmlentities($_POST['password']))));
//                $this->Password = password_hash($this->Password , PASSWORD_BCRYPT);

            }
        }

        public function selectUserFromSql(){
            $query = "SELECT * FROM `user` WHERE `email` = '$this->Email'" ;



            $sql = $this->conn->query($query);
            $row= $sql->fetch(PDO::FETCH_ASSOC);
//            echo"<pre>";
//            print_r($row);
//            die;

            if(password_verify($this->Password , $row['password'] )) {
                if($row['role'] == '0' ){
                    $_SESSION['auth']= ['user_id'=>$row['id']]  ;
                    header("location:../../index.php");
                }elseif ($row['role'] == 1){
                    $_SESSION['auth']= ['admin_id'=>$row['id']];
                    header("location:../../dashboard.php");

                }
            }else{
                $_SESSION['errors'] = 'Opps Wrong Password!';

                header("location:../../login.php");

            };

            $number_of_matching_rows = $sql->fetchColumn();

             if(!$number_of_matching_rows==1){

                $query = "SELECT * FROM `user` WHERE `email` = '$this->Email'";
                $sql = $this->conn->query($query);



                $number_of_matching_Email = $sql->fetchColumn();


                if(!$number_of_matching_Email == 1){
                    $_SESSION['errors'] = 'This email is not registered... Please Enter A Valid Email!';

                    header("location:../../login.php");

                }

            }


        }
    }

    $login= new LoginUser();
    $login->checkRequest();
    $login->selectUserFromSql();
