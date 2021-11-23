<?php
class Pages extends Controller
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

  // Carrega Homepage
  public function index()
  {
    $notaIngles = $this->userModel->getGradeByID($_SESSION['user_id']);

    $data = [
      'notaIngles' => $notaIngles
    ];

    $this->view('pages/index', $data);
  }

   // Carrega Resumo Week 1
   public function resumo1()
   { 
     $this->view('pages/resumeWeek1');
   }

   public function resumo2()
   { 
     $this->view('pages/resumeWeek2');
   }

   public function resumo3()
   { 
     $this->view('pages/resumeWeek3');
   } 
 
 

  public function performance()
  {
    $notaIngles = $this->userModel->getGradeByID($_SESSION['user_id']);
    $mediaNotas = $this->postModel->getAllPoints();
    $user_points = $this->userModel->getUserById($_SESSION['user_id']);

    $data = [
      'notaIngles' => $notaIngles,
      'mediaNotas' => $mediaNotas,
      'user_points' => $user_points
    ];

    // Se estiver logado, redireciona para performance
    if (isset($_SESSION['user_id'])) {
      $this->view('pages/performance', $data);
    } else {  // Se nao esta logado, deve fazer login
      redirect('users/login');
    }
  }

  // Carrega todos cards
  public function salas()
  {
    // Se estiver logado, redireciona para performance
    if (isset($_SESSION['user_id'])) {
      $this->view('pages/salas');
    } else {  // Se nao esta logado, deve fazer login
      redirect('users/login');
    }
  }

  public function students()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'new' => $_POST['new'],
        'user_id' => $_POST['user_id']
      ];

      if ($this->userModel->updateGrade($data)) {
        redirect('pages/students');
      }
    } else {
      $students = $this->userModel->getAllStudents();

      $data = [
        'students' => $students,
      ];

      $this->view('pages/students', $data);
    }
  }

  public function schedule($id)
  {
    $schedule = $this->userModel->getScheduleClass($id);
    $posts_points = $this->postModel->getCountPointsUser($_SESSION['user_id']);
    $posts_count = $this->postModel->getCountPost();

    $data = [
      'schedule' => $schedule,
      'posts_points' => $posts_points,
      'posts_count' => $posts_count
    ];

    $this->view('pages/schedule', $data);
  }
}
