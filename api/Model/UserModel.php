<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class UserModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM users ORDER BY id ASC LIMIT ?", [ $limit ]);
    }
	public function getUser($id)
    {
		return $this->select("SELECT * FROM users WHERE id=?", [ $id ]);
    }
    public function getFewUsers($id,$limit)
    {
        return $this->select("SELECT * FROM users ORDER BY id ASC LIMIT ?,?", [ $id, $limit ]);
    }
}