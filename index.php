<?
$tape_size = 20;
$lines_of_code = 20;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BF in CSS</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <h2>Memory Triggers:</h2>
    <input contenteditable type="radio" name="mt" id="mt0" checked> Noop
    <input contenteditable type="radio" name="mt" id="mt1"> &lt;
    <input contenteditable type="radio" name="mt" id="mt2"> +
    <input contenteditable type="radio" name="mt" id="mt3"> &gt;

    <h2>Memory:</h2>
    <? for ($pointer=0; $pointer < $tape_size; $pointer++) { ?>
      <input contenteditable type="checkbox" name="p_v" id="p_v<?= $pointer ?>">
      <input contenteditable type="radio" name="p" id="p<?= $pointer ?>" <?= $pointer==0 ? "checked" : "" ?>>
      <div class="trigger"><?
        ?><label for="p<?= $pointer-1 ?>" class="prev-p"></label><?
        ?><label for="p<?= $pointer+1 ?>" class="next-p"></label><?
        ?><label for="p_v<?= $pointer ?>" class="flip"></label><?
      ?></div>
      <div></div>
    <? } ?>

    <h2>Loop:</h2>
    <b>State: </b>
    <input contenteditable type="radio" name="loop-state" id="ls0"> indent
    <input contenteditable type="radio" name="loop-state" id="ls1"> repeat
    <input contenteditable type="radio" name="loop-state" id="ls2"> exit
    <br />
    <b>Level: </b>
    <input type="radio" name="indent" id="i0" checked>
    <input type="radio" name="indent" id="i1">
    <input type="radio" name="indent" id="i2">
    <input type="radio" name="indent" id="i3">
    <h2>Commands:</h2>
    <?
    for ($line=0; $line < $lines_of_code; $line++) {
      $is_first_line = $line === 0;

      ?>
      <input contenteditable type="radio" name="l"
        id="l<?= $line ?>" <?= $is_first_line ? "checked" : "";?>>

      <input name="cmd-<?= $line ?>" id="v<?= $line ?>-0" type="radio" checked="checked" />
      <input name="cmd-<?= $line ?>" id="v<?= $line ?>-1" type="radio" />
      <input name="cmd-<?= $line ?>" id="v<?= $line ?>-2" type="radio" />
      <input name="cmd-<?= $line ?>" id="v<?= $line ?>-3" type="radio" />
      <input name="cmd-<?= $line ?>" id="v<?= $line ?>-4" type="radio" />
      <input name="cmd-<?= $line ?>" id="v<?= $line ?>-5" type="radio" />
      <div class="cmd">
        <label for="v<?= $line ?>-0">&nbsp;</label>
        <label for="v<?= $line ?>-1">[</label>
        <label for="v<?= $line ?>-2">&lt;</label>
        <label for="v<?= $line ?>-3">+</label>
        <label for="v<?= $line ?>-4">&gt;</label>
        <label for="v<?= $line ?>-5">]</label>
      </div>
      <div class="trigger"><?
        ?><label for="i0"></label><?
        ?><label for="i1"></label><?
        ?><label for="i2"></label><?
        ?><label for="i3"></label><?
        ?><!-- Move Action --><?
        ?><label for="l<?= $line-1 ?>" class="prev"></label><?
        ?><label for="l<?= $line+1 ?>" class="next"></label><?
      ?></div>
    <? } ?>
    <!-- Global actions -->
    <div class="trigger global"><?
      ?><label for="mt0" class="memory-noop"></label><?
      ?><label for="mt1" class="memory-prev"></label><?
      ?><label for="mt2" class="toggle"></label><?
      ?><label for="mt3" class="memory-next"></label><?
      ?><label for="ls0" class="loop-indent"></label><?
      ?><label for="ls1" class="loop-repeat"></label><?
      ?><label for="ls2" class="loop-exit"></label><?
    ?></div>
  </body>
</html>
