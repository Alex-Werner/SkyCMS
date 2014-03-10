<?php
$db = new SK_Persist();
$t = $db->GetValueFromEntity("sk_mod_skadministrator","users");
$chaine = json_decode($t->val);
?>
<h1>Users</h1>

<table>
    <thead class="first">
    <td>Username</td>
    <td>Actions</td>
    </thead>
    <tbody>
    <?php
        foreach($chaine->admins as $c)
        {
            echo "<tr>
            <td>".$c->user."</td>
            <td>TODO</td>
            </tr>";
        }
?>
    </tbody>
    <?php //echo $html; ?>

</table>