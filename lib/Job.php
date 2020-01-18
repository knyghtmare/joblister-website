<?php

require_once "config/config.php";

class Job
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // get all jobs
    public function getAllJobs()
    {
        $this->db->query("SELECT jobs.*, categories.name as cname FROM jobs INNER JOIN
                          categories on jobs.category_id = categories.id
                          ORDER BY post_date DESC");
        // assign the result set
        return $this->db->getResults();
    }

    public function getCategories()
    {
        $this->db->query("SELECT * FROM categories");
        //assign results set
        return $this->db->getResults();
    }

    public function getByCategory(string $category)
    {
        $this->db->query("SELECT jobs.*, categories.name as cname FROM jobs
                          INNER JOIN categories on jobs.category_id = category_id
                          WHERE jobs.category_id = $category
                          ORDER BY post_date DESC");

        return $this->db->getResults();
    }

    public function getCategory(string $category_id)
    {
        $this->db->query("SELECT * FROM categories WHERE id = :category_id");
        $this->db->bind(':category_id', $category_id);

        return $this->db->single();
    }

    public function getJob(string $id)
    {
        $this->db->query("SELECT * FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->single();
    }
}

 ?>
