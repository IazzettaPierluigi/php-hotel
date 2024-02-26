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

        <form class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="parkingFilter" name="parking" value="1">
                <label class="form-check-label" for="parkingFilter">Filtra per Parcheggio</label>
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
            ];

            $filteredHotels = $hotels;
            if (isset($_GET['parking']) && $_GET['parking'] == '1') {
                $filteredHotels = array_filter($hotels, function ($hotel) {
                    return $hotel['parking'] == true;
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