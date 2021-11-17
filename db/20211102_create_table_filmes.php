<?php

$bd = new SQLite3("filmes.db");

$sql = "DROP TABLE IF EXISTS filmes";

if ($bd->exec($sql))
    echo "\ntabela filmes apagada\n";

$sql = "CREATE TABLE filmes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo VARCHAR(200) NOT NULL,
    poster VARCHAR(200),
    sinopse TEXT,
    nota DECIMAL(2,1)
    )
";

if ($bd->exec($sql))
    echo "\ntabela filmes criada\n";
else
    echo "\nerro ao criar a tabela filmes\n";

$sql = "INSERT INTO filmes (titulo, poster, sinopse, nota) VALUES (
        'A Morte Anda a Cavalo',
        'https://www.themoviedb.org/t/p/w300/FyAD6dY9MkSVinMDLpUUkSg4jw.jpg',
        'Ainda criança Bill (John Philip Law), é a única testemunha do assassinato de toda a sua família por quatro assaltantes. Quinze anos depois, ele vai atrás dos assassinos em busca de vingança. Durante sua jornada, ele cruz o caminho de Ryan (Lee Van Cleef), um ex-condenado que acabou de sair da cadeia, e também quer se vingar dos bandidos que o colocaram na cadeia. Juntos os dois formam uma dupla nada comum em busca do mesmo objetivo.',
        9.7
    )";

if ($bd->exec($sql))
    echo "\ntabela filmes criada\n";
else
    echo "\nerro ao criar a tabela filmes\n";

$sql = "INSERT INTO filmes (titulo, poster, sinopse, nota) VALUES (
        'Dragon Ball Z',
        'https://www.themoviedb.org/t/p/w300/8Nz9cmt9DzWJe8U5SpMzIvfhZ3E.jpg',
        'Cinco anos após vencer o Torneio Mundial de Artes Marciais, Goku tem uma vida pacífica com sua esposa e filho. No entanto, isso muda com a chegada de um misterioso inimigo chamado Raditz, que se apresenta como o irmão perdido de Goku e revela que ele é um guerreiro da raça Saiyan, e que originalmente foi enviado à Terra para conquista-la. Com sua tentativa fracassada de recrutar Goku como aliado, Raditz adverte Goku e seus amigos de que uma nova ameaça se aproxima rapidamente da Terra, uma que poderia mergulhar o planeta em um conflito intergaláctico e fazer os próprios céus tremerem. Uma guerra será travada pelas esferas místicas do dragão, e somente os mais fortes sobreviverão.',
        10
    )";

if ($bd->exec($sql))
    echo "\nfilmes inseridos com sucesso!\n";
else
    echo "\nerro ao inserir filmes\n";

?>