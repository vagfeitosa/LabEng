<?php
class Posts extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('users/login');
    }
    // Carrega Models
    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }

  public function index()
  { // Se estiver logado, redireciona para posts
    if (isset($_SESSION['user_id'])) {
      redirect('pages');
    } else {  // Se nao esta logado, deve fazer login
      redirect('users/login');
    }
  }

  // Carrega todos cards
  public function cards()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'user_id' => $_SESSION['user_id'],
        'post_id' => $_POST['post_id']
      ];

      if ($this->postModel->updatePoints($data)) {
        redirect('posts/cards');
      }
    } else {
      $posts = $this->postModel->getPosts();
      $posts_points = $this->postModel->getPostPoint($_SESSION['user_id']);
      $aula = $this->userModel->getAllClasses();

      $data = [
        'posts' => $posts,
        'posts_points' => $posts_points,
        'aula' => $aula
      ];

      $this->view('posts/cards', $data);
    }
  }

  // Mostra somente um card
  public function show($id)
  {
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);
    $sala = $this->userModel->getNameClassById($user->sala_id);

    $data = [
      'post' => $post,
      'user' => $user,
      'sala' => $sala
    ];

    $this->view('posts/show', $data);
  }

  // Adiciona um card
  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'aula_id' => $_POST['aula_id'],
        'user_id' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate username
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter name';
        // Validate name
        if (empty($data['body'])) {
          $data['body_err'] = 'Please enter the post body';
        }
      }

      // Make sure there are no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validation passed
        //Execute
        if ($this->postModel->addPost($data)) {
          // Redirect to login
          flash('post_message', 'Card Adicionado!');
          redirect('posts/cards');
        } else {
          die('Something went wrong');
        }
      } else {
        // Carrega view se tem erros
        $this->view('posts/add', $data);
      }
    } else {
      $aula = $this->userModel->getAllClasses();

      $data = [
        'title' => '',
        'body' => '',
        'aula' => $aula
      ];

      $this->view('posts/add', $data);
    }
  }

  // Edit Post
  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'aula' => $_POST['aula'],
        'user_id' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate username
      if (empty($data['title'])) {
        $data['title_err'] = 'Por favor, insira um nome de usuário';
        // Validate name
        if (empty($data['body'])) {
          $data['body_err'] = 'Por favor, adicione um conteúdo';
        }
      }

      // Make sure there are no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validation passed
        //Execute
        if ($this->postModel->updatePost($data)) {
          // Redirect to login
          flash('post_message', 'Card atualizado!');
          redirect('posts/cards');
        } else {
          die('Algo deu errado :(');
        }
      } else {
        // Carrega se tem erros
        $this->view('posts/edit', $data);
      }
    } else {
      // Get post from model
      $post = $this->postModel->getPostById($id);

      // Check for owner
      if ($post->user_id != $_SESSION['user_id']) {
        redirect('posts');
      }

      $data = [
        'id' => $id,
        'title' => $post->title,
        'body' => $post->body
      ];

      $this->view('posts/edit', $data);
    }
  }

  // Delete Post
  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Execute
      if ($this->postModel->deletePost($id)) {
        // Redirect to login
        flash('post_message', 'Post Removido');
        redirect('posts/cards');
      } else {
        die('Algo deu errado :(');
      }
    } else {
      redirect('posts');
    }
  }
}
