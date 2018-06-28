<!-- main template that defines the content on most of the pages -->
<?php if ($page['header']): ?>
  <header>
    <?php print render($page['header']); ?>
  </header>
<?php endif; ?>

<?php if ($page['alerts']): ?>
  <?php print render($page['alerts']); ?>
<?php endif; ?>

<div id="container">
  <?php if ($page['content']): ?>
    <main id="main-content">
      <?php print $messages; ?>
      <?php print render($page['content']); ?>
    </main>
  <?php endif; ?>

  <?php if ($page['sidebar']): ?>
    <?php print render($page['sidebar']); ?>
  <?php endif; ?>
</div>

<?php if ($page['footer']): ?>
  <footer>
    <?php print render($page['footer']); ?>
  </footer>
<?php endif; ?>
