<?php

include_once 'base.inc.php';

function getTitle()
{
    return 'Karakterler';
}

$characterClass = new \Classes\Character();

$characters = $characterClass->getCharacters($_GET['house'] ?? null);

?>

<?php

include 'header.php';

include 'navbar.php';

?>

<div class="pt-5">

    <div class="container">

        <section class="jumbotron text-center pt-5 mb-5 bg-white">
            <div class="container">
                <h1 class="jumbotron-heading"><?php echo getTitle(); ?></h1>
                <span><?php echo $_GET['house'] ?? '' ?></span>
            </div>
        </section>


        <div class="bg-white p-5">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Ad</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Ev</th>
                    <th scope="col">Kan Durumu</th>
                    <th scope="col">Tür</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $counter = 1;
                foreach ($characters as $character){ ?>

                    <tr>
                        <th scope="row"><?php echo $counter++; ?> </th>
                        <td><img style=" width: 40%; height: auto;" alt="" class="card-img-top" src="<?php echo $character['image']; ?>"></td>
                        <td><?php echo $character['name'];?></td>
                        <td><?php echo $character['role'];?></td>
                        <td><?php echo $character['house'];?></td>
                        <td><?php echo $character['bloodStatus'];?></td>
                        <td><?php echo $character['species'];?></td>
                        <!--
                            Translate API için kullandım ama biraz yavaş yüklendiği için yorum satırı içerisine aldım
                            <th scope="row"><?//php echo $counter++; ?> </th>
                            <td><img style=" width: 40%; height: auto;" alt="" class="card-img-top" src="assets/images/characters/<?//php echo $detail['name']?>.jpg"></td>
                            <td><?//php echo $detail['name'];?></td>
                            <td><?//php translate("".$detail['role'], "en", "tr");?></td>
                            <td><?//php echo $detail['house'];?></td>
                            <td><?//php translate("".$detail['bloodStatus'], "en", "tr");?></td>
                            <td><?//php translate("".$detail['species'], "en", "tr");?></td>
                            -->
                    </tr>

                <?php }



                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php

include 'footer.php';

?>
