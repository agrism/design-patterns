<?php


class User
{
    private $userName;
    private $pass;
    private $designation;

    /**
     * User constructor.
     * @param $userName
     * @param $pass
     * @param $designation
     */
    public function __construct($userName, $pass, $designation)
    {
        $this->userName = $userName;
        $this->pass = $pass;
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }


}

interface IFolder
{
    public function performReadOrWriteOperations();
}

class Folder implements IFolder{
    public function performReadOrWriteOperations()
    {
       echo __CLASS__. " Performing read or write operation on folder<br>";
    }
}

class FolderProxy implements IFolder{

    private $folder;
    private $user;

    /**
     * FolderProxy constructor.
     * @param $folder
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function performReadOrWriteOperations()
    {
       if($this->user->getDesignation() == 'CEO' || $this->user->getDesignation() == 'Manager'){
            $this->folder = new Folder();
            echo __CLASS__.': Folder Proxy makes call to RealFolder "performReadOrWriteOperations". <br>';
            $this->folder->performReadOrWriteOperations();
       } else{
           echo __CLASS__.': Folder proxy says "You do not have  access to this foldr!<br>';
       }
    }

}

echo '1. Create user with designation: CEO<br>';
$user1 = new User('User1', 'pass1', 'CEO');
$folderProxy = new FolderProxy($user1);
$folderProxy->performReadOrWriteOperations();

echo '<hr>';
echo '2. Create user with designation: developer<br>';
$user1 = new User('User1', 'pass1', 'developer');
$folderProxy = new FolderProxy($user1);
$folderProxy->performReadOrWriteOperations();

echo '<hr>';
echo '3. Create user with designation: Manager<br>';
$user1 = new User('User1', 'pass1', 'Manager');
$folderProxy = new FolderProxy($user1);
$folderProxy->performReadOrWriteOperations();