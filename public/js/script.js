//Altera cor segundo notas
var situacaoNota = $(".points").text();
var situacaoNotaAvg = $(".points-avg").text();

if (situacaoNota == 0) {
  $(".class-points").css("border-color", "#f4f4f4");
  $(".points").text("?");
} else if (situacaoNota < 6) {
  $(".class-points").css("border-color", "#ec524b");
} else {
  $(".class-points").css("border-color", "#6FCF97");
}

if (situacaoNotaAvg == 0) {
  $(".class-points-avg").css("border-color", "#f4f4f4");
  $(".points-avg").text("?");
} else if (situacaoNotaAvg < 6) {
  $(".class-points-avg").css("border-color", "#ec524b");
} else {
  $(".class-points-avg").css("border-color", "#6FCF97");
}

/* PERFORMANCE PAGE END */

/* NAVBARS AFTER LOGIN INIT */

//Collapse navbar
$(".navbar-nav.ml-auto").click(() => {
  $(".menu-append").toggleClass("d-none");
});

//Verifica se o usuario tem sobrenome
if ($(".user-name").text().split(" ")[1]) {
  var lastName = $(".user-name").text().split(" ")[1].charAt(0).toUpperCase();
}

//Faz a primeira letra do avatar
var avatar = $(".user-name").text().charAt(0).toUpperCase();

if (lastName) {
  //Verifica se o usuario tem sobrenome
  $(".js-user-avatar").text(avatar + lastName);
} else {
  //Se não tiver sobrenome
  $(".js-user-avatar").text(avatar);
}

//Adiciona somente o primeiro nome
var home_hello = $(".user-name").text().split(" ")[0];
$(".hello").text("Olá, " + home_hello + "!");

//Adiciona classe active para a navegação lateral da home
if ($(".home-page").length > 0) {
  $(".nav-link").first().addClass("active");
} else if (
  $(".schedule-page").length > 0 ||
  $(".classes-page").length > 0 ||
  $(".edit-card-page").length > 0 ||
  $(".show-card-page").length > 0 ||
  $(".add-card-page").length > 0 ||
  $(".cards-page").length > 0
) {
  $(".nav-link:nth-child(2)").addClass("active");
} else if ($(".performance-page").length > 0) {
  $(".nav-link:nth-child(3)").addClass("active");
} else if ($(".students-page").length > 0) {
  $(".nav-link-students").addClass("active");
}

/* NAVBARS AFTER LOGIN END */

/* HOME PAGE INIT */

//Tempo do carrossel
$(".carousel").carousel({
  interval: 1000 * 9,
});

/* HOME PAGE END */

/* NAVBAR BEFORE LOGIN INIT */

//Desaparecer botão da navbar se já estiver na página
if ($(".login-page").length > 0) {
  $(".js-login").addClass("d-none");
}
if ($(".register-page").length > 0) {
  $(".js-register").addClass("d-none");
}

/* NAVBAR BEFORE LOGIN END */

/* CARDS PAGE INIT */

//Pontuação por cards
$(".done").text($(".js-point.d-none").length);
$(".all").text($(".js-point").length);

//Blue/Orange Person nos cards
if ($(".cards-page").length > 0) {
  var feitos = $(".done").text();
  var todosCards = $(".faq").length;

  if (todosCards == 0) {
    $(".orangep").addClass("d-none");
    $(".points").addClass("d-none");
    $(".js-no-flashcards").removeClass("d-none");

    if ($(".bg-orange").length > 0) {
      $(".col-md-12").first().addClass("display-center");
    }
  } else if (feitos == todosCards) {
    $(".orangep").addClass("d-none");
    $(".bluep").removeClass("d-none");
  }

  $("select.js-value-option").on("change", function () {
    var opcaoAula = $(".js-value-option").val();
    $(".js-order-card").addClass("d-none");

    if (opcaoAula >= 1) {
      $(".js-flashcard-class-" + opcaoAula).removeClass("d-none");
    }
  });
}

$(".faq-toggle").click(function () {
  $(this).parent().toggleClass("active");
});

function dataFormatada() {
  var data = $(".data").text().split(" ")[0].split("-");

  ano = data[0];
  mes = data[1];
  dia = data[2];

  return dia + "/" + mes + "/" + ano;
}

$(".data").text(dataFormatada);

/* CARDS PAGE END */

if ($(".schedule-page").length > 0) {
  $(".js-posts-point").text();
  $(".js-posts-count").text();

  var posts_point = $(".js-posts-point").text();
  var posts_count = $(".js-posts-count").text();

  var progressbar_width = (posts_point / posts_count) * 100;

  if (progressbar_width > 0) {
    $(".progress-bar")
      .css("width", progressbar_width + "%")
      .text(progressbar_width + "%");
  } else {
    $(".progress-bar").css("width", "0%").text("0%");
  }
}

if ($(".performance-page").length > 0) {
  var points_user = $(".js-posts-user").text();
  var level_up = $(".js-level-up");

  var max_150 = 150;
  var max_300 = 300;
  var max_450 = 450;
  var max_600 = 600;
  var max_750 = 750;
  var max_900 = 900;

  if (points_user < max_150) {
    var progressbar_width = (points_user/max_150) * 100;
    level_up.text("1");
  } else if (points_user >= max_150) {
    var progressbar_width = (points_user/max_150) * 100;
    level_up.text("2");
  } else if (points_user >= max_300) {
    var progressbar_width = (points_user/max_300) * 100;
    level_up.text("3");
  } else if (points_user >= max_450) {
    var progressbar_width = (points_user/max_450) * 100;
    level_up.text("4");
  } else if (points_user >= max_600) {
    var progressbar_width = (points_user/max_600) * 100;
    level_up.text("5");
  } else if (points_user >= max_750) {
    var progressbar_width = (points_user/max_750) * 100;
    level_up.text("6");
  } else if (points_user >= max_900) {
    var progressbar_width = (points_user/max_900) * 100;
    level_up.text("7");
  }

}
