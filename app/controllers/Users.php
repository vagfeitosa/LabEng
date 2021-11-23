<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    redirect('users/login');
  }

  public function register()
  {
    // Check if logged in
    if ($this->isLoggedIn()) {
      redirect('posts');
    }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'role' => trim($_POST['role']),
        'name' => trim($_POST['name']),
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_err' => '',
        'username_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Validate username
      if (empty($data['username'])) {
        $data['username_err'] = 'Informe um nome de usuário';
        // Validate name
        if (empty($data['name'])) {
          $data['name_err'] = 'Informe o nome completo';
        }
      } else {
        // Check username
        if ($this->userModel->findUserByUsername($data['username'])) {
          $data['username_err'] = 'Usuário já existe';
        }
      }

      // Validate password
      if (empty($data['password'])) {
        $password_err = 'Informe uma senha.';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Senha precisa ter ao menos 6 caracteres';
      }

      // Validate confirm password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Por favor, confirme a senha.';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Password do not match.';
        }
      }

      // Make sure errors are empty
      if (empty($data['name_err']) && empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        // SUCCESS - Proceed to insert

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //Execute
        if ($this->userModel->register($data)) {
          // Redirect to login
          flash('register_success', 'Você se cadastrou com sucesso! Entre agora');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        // Carrega View
        $this->view('users/register', $data);
      }
    } else {
      // IF NOT A POST REQUEST

      // Init data
      $data = [
        'role' => '',
        'name' => '',
        'username' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'username_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Carrega View
      $this->view('users/register', $data);
    }
  }

  public function login()
  {
    // Check if logged in
    if ($this->isLoggedIn()) {
      redirect('posts');
    }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'username_err' => '',
        'password_err' => '',
      ];

      // Check for username
      if (empty($data['username'])) {
        $data['username_err'] = 'Please enter username.';
      }

      // Check for name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter name.';
      }

      // Check for user
      if ($this->userModel->findUserByUsername($data['username'])) {
        // User Found
      } else {
        // No User
        $data['username_err'] = 'Usuário não está registrado.';
      }

      // Make sure errors are empty
      if (empty($data['username_err']) && empty($data['password_err'])) {

        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['username'], $data['password']);

        if ($loggedInUser) {
          // User Authenticated!
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Senha incorreta';
          // Carrega View
          $this->view('users/login', $data);
        }
      } else {
        // Carrega View
        $this->view('users/login', $data);
      }
    } else {
      // If NOT a POST

      // Init data
      $data = [
        'username' => '',
        'password' => '',
        'username_err' => '',
        'password_err' => '',
      ];

      // Carrega View
      $this->view('users/login', $data);
    }
  }

  // Create Session With User Info
  public function createUserSession($user)
  {
    $sala = $this->userModel->getNameClassById($user->sala_id);
    $disciplina = $this->userModel->getNameSubjectById($sala->disciplina_id);

    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_username'] = $user->username;
    $_SESSION['user_name'] = $user->name;
    $_SESSION['user_role'] = $user->role;
    $_SESSION['user_sala'] = $sala->etapaEscolar;
    $_SESSION['user_sala_nome'] = $sala->name;
    $_SESSION['user_ano'] = $sala->ano;
    $_SESSION['user_disciplina_id'] = $disciplina->id;
    $_SESSION['user_disciplina_name'] = $disciplina->name;
    $_SESSION['user_disciplina_semanas'] = $disciplina->qtySemanas;

    redirect('posts');
  }

  // Logout & Destroy Session
  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_username']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('users/login');
  }

  // Check Logged In
  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
