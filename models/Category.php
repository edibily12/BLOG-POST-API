<?php
require_once __DIR__."/../config/Database.php";
class Category
{
    private string $table = 'categories';

    public int $id;
    public string $name;
    public string $created_at;

    public Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //read all category
    public function index(): mysqli_result|bool
    {
        $query = 'SELECT
            id,
            name,
            created_at
        FROM 
            '.$this->table.'
        WHERE 
            deleted_at IS NULL
        ORDER BY
            id DESC';

        return $this->db->query($query);
    }

    //read all trashed category
    public function trashed(): mysqli_result|bool
    {
        $query = 'SELECT
            id,
            name,
            created_at,
            deleted_at
        FROM 
            '.$this->table.'
        WHERE 
            deleted_at IS NOT NULL
        ORDER BY
            id DESC';

        return $this->db->query($query);
    }

    //view single category
    public function show(): void
    {
        $query = 'SELECT
            id,
            name,
            created_at
        FROM 
            '.$this->table.'
        WHERE
            id='.$this->id.' AND p.deleted_at IS NULL
        LIMIT 0,1
            ';

        $query = $this->db->query($query);
        $category = $query->fetch_assoc();

        //assign post properties
        $this->id = $category['id'];
        $this->name = $category['name'];
        $this->created_at = $category['created_at'];
    }

    //create a category resource
    public function create(): bool
    {
        $query = "INSERT INTO `$this->table` 
                SET 
                    name = '$this->name'
                ";


        if ($this->db->query($query)) {
            return true;
        }

        return false;
    }


    //update category
    public function update(): bool
    {
        $query = "UPDATE `$this->table` 
                SET 
                    name = '$this->name'
                WHERE 
                    id = '$this->id'
                ";


        if ($this->db->query($query)) {
            return true;
        }

        return false;
    }

    //delete category
    public function delete(): bool
    {
        $query = "UPDATE `$this->table` 
              SET deleted_at = NOW()
              WHERE id = '$this->id'";

        if ($this->db->query($query)) {
            return true;
        }

        return false;
    }
}