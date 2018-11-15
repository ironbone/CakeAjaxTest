<h1>Here are all the added users</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Age</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <?= h($user->name) ?>
            </td>
            <td>
                <?= h($user->age) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->Html->link("Back", ['action' => 'index'], ['class' => 'button']) ?>