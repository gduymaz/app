<?php

include_once 'base.inc.php';


function getTitle()
{
    return 'Evler';
}

$houseClass = new \Classes\House();
$houses = $houseClass->getHouses();

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
            </div>
        </section>
        <div class="row bg-white p-5">
            <?php foreach ($houses as $house) { ?>
                <div class="col-md-6">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="assets/images/houses/<?php echo $house['name'] ?>.jpg"
                             alt="<?php echo $house['name']; ?>">
                        <div class="card-body">
                            <h5 align="center" class="card-title">
                                <strong><?php echo strtoupper($house['name']); ?></strong></h5>
                            <p class="card-text">
                                <strong>Evin Kurucusu :</strong> <?php echo $house['founder']; ?>
                            </p>
                            <p class="card-text">
                                <strong>Evin Başı &emsp; &emsp; :</strong> <?php echo $house['headOfHouse']; ?>
                            </p>
                            <p class="card-text">
                                <strong>Evin Maskotu&emsp;:</strong> <?php echo ucfirst($house['mascot']); ?>
                            </p>
                            <p class="card-text">
                                <strong> Evin Hayaleti &emsp;:</strong> <?php echo $house['houseGhost']; ?>
                            </p>
                            <p class="card-text">
                                <strong> Okul &emsp;&emsp;&emsp;&emsp;&emsp;:</strong> <?php echo $house['school']; ?>
                            </p>
                            <div class="justify-content-between align-items-center">
                                <div class="btn-group float-right">
                                    <a href="characters.php?house=<?php echo $house['name']; ?>"
                                       class="btn btn-sm btn-outline-secondary">Show Students</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>


<?php

include 'footer.php';

?>
