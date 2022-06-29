<?php
    session_start();
    require_once '../../helpers/functions.php';
    class ManageAccount{
        public $company_id;
        public $name;
        public $office_location;
        public $helpline;

        function __updateConstruct(){
            $this->company_id   = $_POST['company_id'];
            $this->name         = $_POST['company_name'];
            $this->office_location     = $_POST['office_location'];
            $this->helpline     = $_POST['helpline'];
        }

        function UpdateInfo($con){
            // $temp_img_upload_id = random_int(10, 999999);
            $query = "UPDATE company SET name = :c, location = :l, helpline = :h, logo = :logo WHERE id = :id";
            $statement = $con->prepare($query);

            $has_added = $statement->execute(
                array(
                    ":c"        => $this->name,
                    ":l"        => $this->office_location,
                    ":h"        => $this->helpline,
                    ":logo"     => $_FILES["files"]["name"] ? 'None' : $_FILES["files"]["name"],
                    ":id"       => $this->company_id
                )
            );

            if($has_added){
                $this->upload_images($con, $this->company_id);
                echo 1;
            }
            else{
                echo "Something went wrong";
            }
        }

        function upload_images($con, $post_id){
            extract($_POST);
            $error=array();

            $txtGalleryName = "companies";
            $images_array = array();

            $img_path = "../../assets/images/";

            $extension=array("jpeg","jpg","png","gif");
            foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);

                if(in_array($ext,$extension)) {
                    if(!file_exists($img_path.$txtGalleryName."/".$file_name)) {
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$img_path.$txtGalleryName."/".$file_name);
                        // echo $file_name;
                        // array_push($images_array, $file_name);
                        $this->SaveToImagesDatabase($con, $post_id, $file_name);
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$img_path.$txtGalleryName."/".$newFileName);
                        // echo $file_name;
                        // array_push($images_array, $file_name);
                        $this->SaveToImagesDatabase($con, $post_id, $file_name);
                    }
                }
                else {
                    array_push($error,"$file_name, ");
                }
            }
        }

        function updateImageUrl($con, $file_name){
            $query = "UPDATE company SET logo = :l WHERE id = :id";
            $statement = $con->prepare($query);
            $result = $statement->execute(
                array(
                    ":l"  => $file_name,
                    ":id" => $this->company_id,
                )
            );
        }

        function SaveToImagesDatabase($con, $id, $file_name){
            $query = "INSERT INTO company_images(company_id, image_url) VALUES(:c_id, :image_url)";
            $statement = $con->prepare($query);
            $result = $statement->execute(
                array(
                    ":c_id" => $id,
                    ":image_url"    => $file_name,
                )
            );

            if($result){
                // echo "success";
                // echo $file_name;
               $this->updateImageUrl($con, $file_name);
            }
            else{
                echo "Something went wrong";
            }
        }

    }
?>