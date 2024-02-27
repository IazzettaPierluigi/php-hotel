<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista degli Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Lista degli Hotel</h1>

        <form class="mb-4" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="parkingFilter" name="parking" value="1" <?php if (isset($_GET['parking']) && $_GET['parking'] == '1') echo 'checked'; ?>>
                        <label class="form-check-label" for="parkingFilter">Filtra per Parcheggio</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="voteFilter" class="form-label">Filtra per Voto (minimo)</label>
                        <input type="number" class="form-control" id="voteFilter" name="vote" min="1" max="5" value="<?php if (isset($_GET['vote'])) echo $_GET['vote']; ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Filtra</button>
        </form>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php
            $hotels = [
                [
                    'name' => 'Hotel Belvedere',
                    'description' => 'Hotel Belvedere Descrizione',
                    'parking' => true,
                    'vote' => 4,
                    'distance_to_center' => 10.4
                ],
                [
                    'name' => 'Hotel Futuro',
                    'description' => 'Hotel Futuro Descrizione',
                    'parking' => true,
                    'vote' => 2,
                    'distance_to_center' => 2
                ],
                [
                    'name' => 'Hotel Rivamare',
                    'description' => 'Hotel Rivamare Descrizione',
                    'parking' => false,
                    'vote' => 1,
                    'distance_to_center' => 1
                ],
                [
                    'name' => 'Hotel Bellavista',
                    'description' => 'Hotel Bellavista Descrizione',
                    'parking' => false,
                    'vote' => 5,
                    'distance_to_center' => 5.5
                ],
                [
                    'name' => 'Hotel Milano',
                    'description' => 'Hotel Milano Descrizione',
                    'parking' => true,
                    'vote' => 2,
                    'distance_to_center' => 50
                ],
                // Aggiunta di altri 10 hotel
                [
                    'name' => 'Hotel Splendido',
                    'description' => 'Hotel Splendido Descrizione',
                    'parking' => true,
                    'vote' => 4,
                    'distance_to_center' => 8.2
                ],
                [
                    'name' => 'Hotel Paradiso',
                    'description' => 'Hotel Paradiso Descrizione',
                    'parking' => false,
                    'vote' => 3,
                    'distance_to_center' => 3.7
                ],
                [
                    'name' => 'Hotel Mare',
                    'description' => 'Hotel Mare Descrizione',
                    'parking' => true,
                    'vote' => 4,
                    'distance_to_center' => 6.9
                ],
                [
                    'name' => 'Hotel Montagna',
                    'description' => 'Hotel Montagna Descrizione',
                    'parking' => true,
                    'vote' => 5,
                    'distance_to_center' => 12.5
                ],
                [
                    'name' => 'Hotel Lago',
                    'description' => 'Hotel Lago Descrizione',
                    'parking' => false,
                    'vote' => 3,
                    'distance_to_center' => 4.3
                ],
                [
                    'name' => 'Hotel Sole',
                    'description' => 'Hotel Sole Descrizione',
                    'parking' => true,
                    'vote' => 2,
                    'distance_to_center' => 7.8
                ],
                [
                    'name' => 'Hotel Luna',
                    'description' => 'Hotel Luna Descrizione',
                    'parking' => true,
                    'vote' => 4,
                    'distance_to_center' => 9.6
                ],
                [
                    'name' => 'Hotel Stella',
                    'description' => 'Hotel Stella Descrizione',
                    'parking' => false,
                    'vote' => 3,
                    'distance_to_center' => 2.8
                ],
                [
                    'name' => 'Hotel Rosso',
                    'description' => 'Hotel Rosso Descrizione',
                    'parking' => true,
                    'vote' => 4,
                    'distance_to_center' => 11.1
                ],
                [
                    'name' => 'Hotel Verde',
                    'description' => 'Hotel Verde Descrizione',
                    'parking' => false,
                    'vote' => 3,
                    'distance_to_center' => 6.2
                ],
                [
                    'name' => 'Hotel Giallo',
                    'description' => 'Hotel Giallo Descrizione',
                    'parking' => true,
                    'vote' => 5,
                    'distance_to_center' => 7.4
                ],
            ];


            // Filtraggio degli hotel in base alla richiesta GET
            $filteredHotels = $hotels;

            if (isset($_GET['parking']) && $_GET['parking'] == '1') {
                $filteredHotels = array_filter($filteredHotels, function ($hotel) {
                    return $hotel['parking'] == true;
                });
            }

            if (isset($_GET['vote']) && is_numeric($_GET['vote'])) {
                $filteredHotels = array_filter($filteredHotels, function ($hotel) {
                    return $hotel['vote'] >= $_GET['vote'];
                });
            }

            foreach ($filteredHotels as $hotel) {
            ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $hotel['name']; ?></h5>
                            <p class="card-text"><strong>Description:</strong> <?php echo $hotel['description']; ?></p>
                            <p class="card-text"><strong>Parking:</strong> <?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></p>
                            <p class="card-text"><strong>Vote:</strong> <?php echo $hotel['vote']; ?></p>
                            <p class="card-text"><strong>Distance to Center:</strong> <?php echo $hotel['distance_to_center']; ?> km</p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>