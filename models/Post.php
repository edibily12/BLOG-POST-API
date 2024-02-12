<?php

require_once __DIR__."/../config/Database.php";

class Post
{
    private string $table = 'posts';

    public $id, $category_id, $category_name, $title, $body, $author, $created_at;

    public Database $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }
    
    //read all posts
    public function index(): mysqli_result|bool
    {

        $query = 'SELECT
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
        FROM 
            '.$this->table.' p 
        LEFT JOIN
            categories c ON p.category_id = c.id
        WHERE 
            p.deleted_at IS NULL
        ORDER BY
            p.created_at DESC';

        return $this->db->query($query);
    }

    //view all trashed posts
    public function post_trashed(): mysqli_result|bool
    {
        $query = 'SELECT
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at,
            p.deleted_at
        FROM 
            '.$this->table.' p 
        LEFT JOIN
            categories c ON p.category_id = c.id
        WHERE 
            p.deleted_at IS NOT NULL
        ORDER BY
            p.created_at DESC';

        return $this->db->query($query);
    }

    //view single post
    public function show(): void
    {
        $query = 'SELECT
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
        FROM 
            '.$this->table.' p 
        LEFT JOIN
            categories c ON p.category_id = c.id
        WHERE
            p.id='.$this->id.' AND p.deleted_at IS NULL
        LIMIT 0,1
            ';

        $query = $this->db->query($query);
        $post = $query->fetch_assoc();

        //assign post properties
        $this->title = $post['title'];
        $this->body = $post['body'];
        $this->author = $post['author'];
        $this->category_id = $post['category_id'];
        $this->category_name = $post['category_name'];
        $this->created_at = $post['created_at'];

    }

    //create a resource
    public function create(): bool
    {
        $query = "INSERT INTO `$this->table` 
                SET 
                    title = '$this->title', 
                    author = '$this->author',
                    body = '$this->body',
                    category_id = '$this->category_id'";
        

        if ($this->db->query($query)) {
            return true;
        }

        return false;
    }
    
    
    //update post
    public function update(): bool
    {
        $query = "UPDATE `$this->table` 
                SET 
                    title = '$this->title', 
                    author = '$this->author',
                    body = '$this->body',
                    category_id = '$this->category_id'";


        if ($this->db->query($query)) {
            return true;
        }

        return false;
    }

    //delete post
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