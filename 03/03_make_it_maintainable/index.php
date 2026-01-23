<!--
What's the Problem?

- PHP logic + HTML in one file
- Works, but not scalable
- Repetition will become a problem

How can we refactor this code so it’s easier to maintain?
-->

<?php
require_once 'config.php';
$pageTitle = 'Home';
?>

<?php include 'components/header.php'; ?>

    <h1>Welcome</h1>

    <ul>
        <?php foreach ($items as $item): ?>
            <li><?= $item ?></li>
        <?php endforeach; ?>
    </ul>

<?php include 'components/footer.php'; ?>

<!-- 
I knew this was the main purposes of PHP but I could never figure it out myself,
refactorizing is very satisfying and I'll use it in future projects.
-->