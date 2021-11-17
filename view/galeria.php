<?php include "cabecalho.php" ?>

<?php
session_start();

require "./util/Mensagem.php";

$controller = new FilmesController();
$filmes = $controller->index();

/*$filme1 = [
  "titulo" => "A Morte Anda a Cavalo",
  "nota" => 9.7,
  "sinopse" => "Ainda criança Bill (John Philip Law), é a única testemunha do assassinato de toda a sua família por quatro assaltantes. Quinze anos depois, ele vai atrás dos assassinos em busca de vingança. Durante sua jornada, ele cruz o caminho de Ryan (Lee Van Cleef), um ex-condenado que acabou de sair da cadeia, e também quer se vingar dos bandidos que o colocaram na cadeia. Juntos os dois formam uma dupla nada comum em busca do mesmo objetivo.",
  "poster" => "https://www.themoviedb.org/t/p/w300/FyAD6dY9MkSVinMDLpUUkSg4jw.jpg"
];

$filme2 = [
  "titulo" => "Dragon Ball Z",
  "nota" => 10,
  "sinopse" => "Cinco anos após vencer o Torneio Mundial de Artes Marciais, Goku tem uma vida pacífica com sua esposa e filho. No entanto, isso muda com a chegada de um misterioso inimigo chamado Raditz, que se apresenta como o irmão perdido de Goku e revela que ele é um guerreiro da raça Saiyan, e que originalmente foi enviado à Terra para conquista-la. Com sua tentativa fracassada de recrutar Goku como aliado, Raditz adverte Goku e seus amigos de que uma nova ameaça se aproxima rapidamente da Terra, uma que poderia mergulhar o planeta em um conflito intergaláctico e fazer os próprios céus tremerem. Uma guerra será travada pelas esferas místicas do dragão, e somente os mais fortes sobreviverão.",
  "poster" => "https://www.themoviedb.org/t/p/w300/8Nz9cmt9DzWJe8U5SpMzIvfhZ3E.jpg"
];

$filme3 = [
  "titulo" => "Death Note",
  "nota" => 9.5,
  "sinopse" => "O jovem estudante Light Yagami acha um caderno com poderes sobrenaturais, chamado Death Note, no qual é possível matar uma pessoa apenas escrevendo seu nome no caderno. Quando o descobre, Light tenta eliminar todos os criminosos do mundo e dar à sociedade um mundo livre do mal. Mas seus planos começam a sair de rumo quando o detetive L resolve contrariar Light.",
  "poster" => "https://www.themoviedb.org/t/p/w300/iigTJJskR1PcjjXqxdyJwVB3BoU.jpg"
];

$filme4 = [
  "titulo" => "Ataque dos Titãs",
  "nota" => 10,
  "sinopse" => "Titãs estão quase exterminando a raça humana. Porém alguns estão dispostos a formar um exército de ataque aos seres assassinos. O jovem Eren, após ver sua mãe ser devorada por um titã, decide que não deixará nenhum deles vivo e buscará sua vingança completa.",
  "poster" => "https://www.themoviedb.org/t/p/w300/1XnZJZ6QDxgaVbnsGpNrBi13JfI.jpg"
];

$filmes = [$filme1, $filme2, $filme3, $filme4]; */

?>

<body>
  <nav class="nav-extended purple lighten-3">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="right">
        <li class="active"><a href="/">Galeria</a></li>
        <li><a href="/novo">Cadastrar</a></li>
      </ul>
    </div>
    <div class="nav-header center">
      <h1>CLOROCINE</h1>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent purple darken-1">
        <li class="tab"><a class="active" href="#test1">
            <Th>Todos</Th>
          </a></li>
        <li class="tab"><a href="#test2">Assistidos</a></li>
        <li class="tab"><a href="#test3">Favoritos</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">

      <?php foreach ($filmes as $filme) : ?>
        <div class="col s12 m6 l3">
          <div class="card hoverable">
            <div class="card-image">
              <img src="<?= $filme->poster ?>">
              <button class="btn-fav btn-floating halfway-fab waves-effect waves-light red" data-id="<?= $filme->id ?>">
                <i class="material-icons"><?= ($filme->favorito) ? "favorite" : "favorite_border" ?></i>
              </button>
            </div>
            <div class="card-content">
              <p class="valign-wrapper">
                <i class="material-icons amber-text">star</i> <?= $filme->nota ?>
              </p>
              <span class="card-title"><?= $filme->titulo ?></span>
              <p><?php echo $filme->sinopse ?></p>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    </div>
  </div>

  <?= Mensagem::mostrar(); ?>

  <script>
    document.querySelectorAll(".btn-fav").forEach(btn => {
      btn.addEventListener("click", e => {
        const id = btn.getAttribute("data-id")
        fetch(`/favoritar/${id}`)
        .then(response => response.json())
        .then(response => {
          if (response.success === "ok") {
            if (btn.querySelector("i").innerHTML === "favorite") {
              btn.querySelector("i").innerHTML = "favorite_border"
            } else {
              btn.querySelector("i").innerHTML = "favorite"
            }
          }
        })
        .catch(error => {
          M.toast({html: 'Erro ao favoritar'})
        })

      });
    })
  </script>

</body>

</html>