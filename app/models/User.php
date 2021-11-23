<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Add User / Register
  public function register($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO users (role, name, username, password) 
      VALUES (:role, :name, :username, :password)');

    // Bind Values
    $this->db->bind(':role', $data['role']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':password', $data['password']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Find User BY username
  public function findUserByUsername($username)
  {
    $this->db->query("SELECT * FROM users WHERE username = :username");
    $this->db->bind(':username', $username);

    $row = $this->db->single();

    //Verifica registros
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Login / Authenticate User
  public function login($username, $password)
  {
    $this->db->query("SELECT * FROM users WHERE username = :username");
    $this->db->bind(':username', $username);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Find User By ID
  public function getUserById($id)
  {
    $this->db->query("SELECT * FROM users WHERE id = :id");
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

   //Busca todos os usuários alunos
   public function getAllStudents()
   {
     $this->db->query("SELECT * FROM users 
                       INNER JOIN notas on users.id = notas.user_id 
                       WHERE role = 'Aluno'");
 
     $results = $this->db->resultset();
 
     return $results;
   }


   //         FIM funções do usuário

   

  //Verifica nome da sala
  public function getNameClassById($id)
  {
    $this->db->query("SELECT * FROM salas WHERE id = :id");

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  //Verifica nome da disciplina
  public function getNameSubjectById($id)
  {
    $this->db->query("SELECT * FROM disciplinas WHERE id = :id");

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  //Verifica nota por id de usuário
  public function getGradeByID($id)
  {
    $this->db->query("SELECT * FROM notas WHERE user_id = :id");

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }


  public function getScheduleClass($id)
  {
    $this->db->query("SELECT * FROM aulas WHERE disciplina_id = :id");

    $this->db->bind(':id', $id);

    $results = $this->db->resultset();

    return $results;
  }

  public function getAllClasses()
  {
    $this->db->query("SELECT * FROM aulas");

    $results = $this->db->resultset();

    return $results;
  }

  public function updateGrade($data)
  {
    // Prepare Query
    $this->db->query('UPDATE notas SET nota = :new WHERE user_id = :user_id');

    // Bind Values
    $this->db->bind(':new', $data['new']);
    $this->db->bind(':user_id', $data['user_id']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
