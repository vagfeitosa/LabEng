<?php
class Post
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Get All Posts
  public function getPosts()
  {
    $this->db->query("SELECT *, 
                        posts.id as postId, 
                        users.id as userId
                        FROM posts 
                        INNER JOIN users 
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC;");

    $results = $this->db->resultset();

    return $results;
  }

  public function getAllPoints()
  {
    $this->db->query("SELECT ROUND(avg(nota),1) AS mediaNotas FROM notas
                    INNER JOIN users
                    ON notas.user_id = users.id
                    WHERE users.role = 'Aluno'
                    ");

    $results = $this->db->single();

    return $results;
  }

  public function getPostPoint($id)
  {
    $this->db->query("SELECT  * FROM posts_points WHERE user_id = :id");

    $this->db->bind(':id', $id);

    $results = $this->db->resultset();

    return $results;
  }

  public function getCountPointsUser($id){
    $this->db->query("SELECT COUNT(post_id) AS posts_points FROM posts_points WHERE user_id = :id");

    $this->db->bind(':id', $id);

    $row =  $this->db->single();

    return $row;
  }

  public function getCountPost(){
    $this->db->query("SELECT COUNT(id) AS posts_count FROM posts");

    $row=  $this->db->single();

    return $row;
  }

  // Get Post By ID
  public function getPostById($id)
  {
    $this->db->query("SELECT * FROM posts WHERE id = :id");

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  // Add Post
  public function addPost($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO posts (title, user_id, body, aula_id) 
      VALUES (:title, :user_id, :body, :aula_id)');

    // Bind Values
    $this->db->bind(':aula_id', $data['aula_id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':body', $data['body']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Update Card
  public function updatePost($data)
  {
    // Prepare Query
    $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Delete Post
  public function deletePost($id)
  {
    // Prepare Query
    $this->db->query('DELETE FROM posts WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $id);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Update User Points
  public function updatePoints($data)
  {
    $this->db->query('UPDATE users SET points = points + 1 WHERE id = :user_id');

    $this->db->bind(':user_id', $data['user_id']);

    // Prepare Query
    $this->db->query('INSERT INTO posts_points (post_id, user_id) VALUES (:post_id, :user_id)');

    // Bind Values
    $this->db->bind(':post_id', $data['post_id']);
    $this->db->bind(':user_id', $data['user_id']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
