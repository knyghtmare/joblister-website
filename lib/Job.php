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

    public function create(array $data): bool
    {
        $this->db->query("INSERT INTO jobs(category_id, job_title, company,
                  description, location, salary, contact_user, contact_email) VALUES
                  (:category_id, :job_title, :company,
                  :description, :location, :salary, :contact_user, :contact_email)");

        // Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(string $id, array $data): bool
    {
        $this->db->query("UPDATE jobs SET 
                  category_id = :category_id, 
                  job_title = :job_title, 
                  company = :company,
                  description = :description, 
                  location = :location, 
                  salary = :salary, 
                  contact_user = :contact_user, 
                  contact_email = :contact_email
                  WHERE id = :id");

        // Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(string $id): bool
    {
        $this->db->query("DELETE FROM jobs WHERE id = :id");

        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

 ?>
