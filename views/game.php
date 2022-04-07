<?php

$new = $_POST["word"];
$new = strtoupper($new);
$new = str_split($new);

$cookie = new Cookie();
$word = $cookie->getCookie('word');

$randomWord = $word;

if ($word == null) {
  $word = new Word();
  $randomWord = $word->getRandom();
  $randomWord = strtoupper($randomWord);

  $cookie->setCookie("word", $randomWord);
}

$game = new Game($randomWord);

$word_write = $cookie->getCookie("words");
$game->submit($new, json_decode($word_write));

?>

<div>
  <h1>Trouve le mot</h1>
  <ul>
    <li>
      <div class="carre green"></div>
      <h2>Lettre à la bonne place</h2>
    </li>
    <li>
      <div class="carre yellow"></div>
      <h2>Lettre à la mauvaise place</h2>
    </li>
    <li>
      <div class="carre red"></div>
      <h2>Lettre absente</h2>
    </li>
  </ul>
  <h3>Vous avez 6 chances</h3>
</div>

<?php foreach ($game->trials as $letters) : ?>
  <p>
    <?php foreach ($letters as $letter) : ?>
      <span style="background-color: <?= $letter->color ?>"><?= $letter->value ?></span>
    <?php endforeach; ?>
  </p>
<?php endforeach; ?>

<?php if ($game->state === "en cours") : ?>
  <form action="/game" method="post">
    <input required name="word" type="text" minlength="<?= strlen($game->word); ?>" maxlength="<?= strlen($game->word); ?>">
    <button type="submit">Envoyer</button>
  </form>
<?php endif ?>

<?php if ($game->state === "gagné") : ?>
  <p>Bravo !</p>
  <form action="/game" method="post">
    <button type="submit">Nouvelle partie</button>
  </form>

<?php endif;
if ($game->state === "perdu") : ?>
  <p>Perdu !</p>
  <form action="/game" method="post">
    <button type="submit">Nouvelle partie</button>
  </form>
<?php endif; ?>

<style>
  ul {
    list-style: none;
  }

  li {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .carre {
    width: 1rem;
    height: 1rem;
  }

  .red {
    background-color: red;
  }

  .yellow {
    background-color: yellow;
  }

  .green {
    background-color: greenyellow;
  }

</style>
