<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green week1-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_week1.php'; ?>
    </div>
    <div class="col-md-9 bg-transparent">
      <div class="container mt-4">
        <div class="row mb-3"> 
          <div class="row resume ml-5 text-dark">
            <section id="formalGreetings">
              <h4 class="mt-5"><i>Formal greetings</i></h4>
              <ul class="mt-3">
                <li>Good morning! <i>(Bom dia!)</i></li>
                <li>Good afternoon! <i>(Boa tarde!)</i></li>
                <li>Good evening! <i>(Boa noite!)</i></li>
                <li>Good night! <i>(Boa noite!)</i></li>
              </ul>
              <table class="w-75 mb-5 table table-bordered table-hover">
                <thead>
                  <th scope="col">Question</th>
                  <th scope="col"></th>
                  <th scope="col">Answer</th>
                </thead>
                <tbody>
                  <tr scope="row">
                    <td>Hello, how are you?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td>I'm fine, thanks.</td>
                  </tr>

                  <tr scope="row">
                    <td>How are you doing?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td>Very well, thank you.</td>
                  </tr>

                  <tr scope="row">
                    <td>Nice to meet you.</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td>Nice to meet you too.</td>
                  </tr>
                </tbody>
              </table>
            </section>
            <section id="informalGreetings">
              <h4><i>Informal greetings</i></h4>
              <table class="table w-75 mb-5 mt-3 table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Question</th>
                    <th></th>
                    <th>Answer</th>
                  </tr>
                </thead>
                <tbody>
                  <tr scope="row">
                    <td>Hey, what's up?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td>Not much.</td>
                  </tr>

                  <tr scope="row">
                    <td>How are things?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td>Pretty good.</td>
                  </tr>

                  <tr>
                    <td>What's new?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td>Nothing special.</td>
                  </tr>

                  <tr scope="row">
                    <td>Hi! How is it going?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td>Great, and you?</td>
                  </tr>
                </tbody>
              </table>
            </section>
            <section id="classVocabulary">
              <h4><i>Classroom Vocabulary</i></h4>
              <table class="table w-75 mb-5 mt-3 table-bordered table-hover">
                <thead>
                    <th>Word</th>
                    <th>Meaning</th>
                </thead>
                <tbody>
                  <tr scope="row">
                    <td>Pencil</td>
                    <td><i>(Lápis)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Pen</td>
                    <td><i>(Caneta)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Eraser</td>
                    <td><i>(Borracha)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Colored pencils</td>
                    <td><i>(Lápis de cor)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Sharpener</td>
                    <td><i>(Apontador)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Ruler</td>
                    <td><i>(Régua)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Calculator</td>
                    <td><i>(Calculadora)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Dictionary</td>
                    <td><i>(Dicionário)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Scotch tape</td>
                    <td><i>(Fita adesiva)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Glue</td>
                    <td><i>(Cola)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Scissors</td>
                    <td><i>(Tesoura)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Stapler</td>
                    <td><i>(Grampeador)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Book</td>
                    <td><i>(Livro)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Notebook</td>
                    <td><i>(Caderno)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Pencil case</td>
                    <td><i>(Estojo)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Backpack</td>
                    <td><i>(Mochila)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Desk</td>
                    <td><i>(Carteira)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Chair</td>
                    <td><i>(Cadeira)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Trash can</td>
                    <td><i>(Lata de lixo)</i></td>
                  </tr>
                  <tr scope="row">
                    <td>Board</td>
                    <td><i>(Lousa)</i></td>
                  </tr>
                </tbody>
              </table>
            </section>
            <section id="classExpressions">
              <h4><i>Classroom Expressions</i></h4>
              <table class="table w-75 mb-5 mt-3 table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Question</th>
                    <th></th>
                    <th>Meaning</th>
                  </tr>
                </thead>
                <tbody>
                  <tr scope="row">
                    <td>How do you say ... in English?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(Como se diz ... em inglês?)</i></td>
                  </tr>

                  <tr scope="row">
                    <td>What does ... mean?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(O que ... significa?)</i></td>
                  </tr>

                  <tr scope="row">
                    <td>Excuse me, may I come in?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(Com licença, posso entrar?)</i></td>
                  </tr>

                  <tr scope="row">
                    <td>Can I go to the restroom?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(Posso ir ao banheiro?)</i></td>
                  </tr>

                  <tr scope="row">
                    <td>Can you repeat, please?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(Pode repetir, por favor?)</i></td>
                  </tr>

                  <tr scope="row">
                    <td>Can you speak louder, please?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(Pode falar mais alto, por favor?)</i></td>
                  </tr>

                  <tr scope="row">
                    <td>Can you explain that again?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(Pode explicar de novo?)</i></td>
                  </tr>

                  <tr scope="row">
                    <td>What page are we on?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(Em qual página estamos?)</i></td>
                  </tr>

                  <tr scope="row">
                    <td>Can you help me, please?</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(Pode me ajudar, por favor?)</i></td>
                  </tr>

                  <tr scope="row">
                    <td>I don't understand.</td>
                    <td><i class="bi bi-arrow-right"></i></td>
                    <td><i>(Não entendi.)</i></td>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>