<?php
echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
echo $this->Html->script('main');
?>

<div>
    <?= $this->Html->link("Show All Users", ['action' => 'all'], ['class' => 'button']) ?>
</div>

<div>
<button onclick="add_new_user()">Add a new Person</button>
</div>

<!-- I do not use form tag cecause I will send my data using Ajax-->
<div id="users"></div>
<br><br>
<button onclick="add_to_database()">Add all users to the database</button>

