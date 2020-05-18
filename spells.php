<?php

include_once 'base.inc.php';

function getTitle()
{
    return 'Büyüler';
}

$spellClass = new \Classes\Spell();
$spells = $spellClass->getSpells();


include 'header.php';

include 'navbar.php';

?>

<div class="pt-5">

    <div class="container">

        <section class="jumbotron text-center pt-5 mb-5 bg-white">
            <div class="container">
                <h1 class="jumbotron-heading"><?php echo getTitle(); ?></h1>
            </div>
        </section>


        <div class="bg-white p-5">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Büyü</th>
                    <th scope="col">Tür</th>
                    <th scope="col">Etki</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $counter = 1;
                foreach ($spells as $spell) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $counter++; ?> </th>
                        <td><?php echo $spell['spell']; ?></td>
                        <td><?php echo $spell['type']; ?></td>
                        <td><?php echo $spell['effect']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php

include 'footer.php';

?>
