<?php
    require_once '../../helpers/functions.php';

    session_start();
    class ManageAccounts{
        public $company_name;
        public $company_location;
        public $admin_name;
        public $email;
        public $password;
        public $confirm_password;

        function __loginConstruct(){
            $this->email     = $_POST['username'];
            $this->password  = $_POST['password'];
        }

        function  __signupConstruct(){
            $this->company_name     = $_POST['company_name'];
            $this->company_location = $_POST['company_location'];
            $this->admin_name       = $_POST['admin_name'];
            $this->email            = $_POST['email'];
            $this->password         = $_POST['password'];
            $this->confirm_password = $_POST['repeat_password'];
        }

        function checkForCompanyPresence($con){
            $query = "SELECT * FROM company WHERE name = :n";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":n" => $this->company_name
                )
            );

            $count = $statement->rowCount();
            if($count > 0) return 0;
            return 1;
        }

        function confirmAdminInfo($con){
            $query = "SELECT * FROM users WHERE username = :u AND password = :p";
            $statement = $con->prepare($query);

            $statement->execute(
                array(
                    ":u" => $this->email, 
                    ":p" => $this->password,
                )
            );

            if($statement->rowCount() > 0) return 0;
            return 1;
        }

        function saveAdminInformation($con){
            echo $this->confirmAdminInfo($con);
            if($this->confirmAdminInfo($con) == 1){
                $query = "INSERT INTO users(company_id, full_name, username, password)
                    VALUES(:c_id, :f, :u, :p)";
                $statement = $con->prepare($query);
                $created = $statement->execute(
                    array(
                        ":c_id" => fetchCompanyIDUsingName($con, $this->company_name),
                        ":f" => $this->admin_name, 
                        ":u" => $this->email, 
                        ":p" => hashPassword($this->password), 
                    )
                );

                if($created){
                    // echo "Registration successful";
                    return 1;
                }
                else{
                    echo "Something went wrong";
                }

            }else{
                echo "A user with the same email already exists";
            }
            
        }

        function Register($con){
            if($this->password != $this->confirm_password){
                return "Password mismatch";
            }
            else if(strlen($this->password) < 6){
                return "Password length must be greater than 6";
            }
            else if($this->checkForCompanyPresence($con) == 1){
                $query = "INSERT INTO company(name, location) 
                VALUES(:n, :l)";
                $statement = $con->prepare($query);
                $has_added = $statement->execute(
                    array(
                        ":n"    => $this->company_name, 
                        ":l"    => $this->company_location, 
                    )
                );
                if($has_added){
                    $this->saveAdminInformation($con);
                }
                else{
                    return 0;
                }
            }
            else{
                return "Company with same name already exists";
            }
            
        }
        
        function AccountValidity($con, $id){
            $query = "SELECT validity FROM company WHERE id = :id";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":id" => $id
                )
            );
            $result = $statement->fetch();

            if($result['validity'] == 0){
                return 1;
            }
            return 0;
        }

        function Login($con){
            $query = "SELECT * FROM users WHERE username = :u";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":u" => $this->email,
                )
            );

            $count = $statement->rowCount();
            if($count > 0){
               // user is present
               $result = $statement->fetch();
                if(password_verify($this->password, $result['password'])){
                    if($this->AccountValidity($con, $result['company_id']) == 0){
                        //    session_start();
                        $_SESSION['username']    = $result['username'];
                        $_SESSION['fullname']    = $result['full_name'];
                        $_SESSION['customer_id'] = $result['id'];
                        $_SESSION['company_id']  = $result['company_id'];
                        $_SESSION['start']       = time();
                        $_SESSION['expire']      = $_SESSION['start'] + (30 * 60);
                        return 1;
                    }
                    else{
                        return -1;
                    }
                   
                }
                else{
                    echo "Invalid password";
                }
            }else{
                echo "Oops! Your email do not match our records";
            }
        }

        function Logout(){
            // unset($_SESSION['name']);
            // session_start();
            session_unset();     // unset $_SESSION variable for the run-time 
            session_destroy(); 
            return 1;
        }
    }
?>