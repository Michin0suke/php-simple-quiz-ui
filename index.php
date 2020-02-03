<?php
$json = file_get_contents('./quiz.json');
$json = json_decode($json, true);
?>

<!DOCTYPE html>
<html>
<head>
<title>アーキテクチャクイズ</title>
<meta charset="utf-8"/>
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<style>
body {
  padding: 0 20px;
}
.quiz-wrapper {
  padding-bottom: 40px;
}
.q {
  font-size: 14px;
  line-height: 18px;
  font-weight: bold;
}
.a-wrapper {
  padding-left: 30px;
  font-size: 14px;
  height: 0;
  line-height: 0;
  opacity: 0;
  overflow: hidden;
  transition: all .5s;
}
img {
  width: 100%;
  max-width: 500px;
}
.button {
  display: block;
  padding: 6px 20px;
  font-size: 16px;
  line-height: 18px;
  border: solid 1px black;
  border-radius: 2px;
  text-align: center;
  opacity: 1;
  transition: all .3s ease-out;
}
input {
  display: none;
}
input:checked~.a-wrapper {
  height: auto;
  opacity: 1;
  line-height: 16px;
}
input:checked~.button {
  height: 0;
  margin: 0;
  padding: 0;
  line-height: 0;
  opacity: 0;
  border: none;
  overflow: hidden;
}
</style>
</head>
<body>
<h1>アーキテクチャクイズ</h1>
<main>
<?php for($i = 0; $i < count($json); $i++): ?>
  <div class="quiz-wrapper">

    <div class="q-wrapper">
      <?php for($j = 0; $j < count($json[$i]["q"]); $j++): ?>
        <p class="q">
          <?php if($j == 0) echo(($i + 1) . '. ') ?>
          <?=$json[$i]['q'][$j]?>
        </q>
      <?php endfor; ?>
    </div>

    <?php if(isset($json[$i]['q-img'])): ?>
      <img src="<?=$json[$i]['q-img']?>">
    <?php endif;?>

    <input type="checkbox" id="toggle-<?=$i?>"/>
    <label class="button" for="toggle-<?=$i?>">答えをみる</label>

    <div class="a-wrapper">
      <?php for($j = 0; $j < count($json[$i]['a']); $j++): ?>
        <p class="a">
          <?=$json[$i]['a'][$j]?>
        </p>
      <?php endfor ?>
      <?php if(isset($json[$i]['a-img'])): ?>
        <img src="<?=$json[$i]['a-img']?>"/>
      <?php endif?>
    </div>

  </div>
<?php endfor ?>
</main>
</body>
</html>