<article>
    <div class="row">
        <div class="col-md-6">
               <dl>
                <dt>Name</dt>
                <dd><?= $caracter['name']; ?></dd>
                <dt>Species</dt>
                <dd><?= $caracter['species']; ?></dd>
                <dt>Origin</dt>
                <dd><?= $caracter['origin']['name']; ?></dd>
              </dl>
        </div>
        <div class="col-md-6 text-md-right">
            <img src="<?= $caracter['image']; ?>" alt="<?= $caracter['name']; ?>" />
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <hr>
            <h2 class="text-md-center">Episodes</h2>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Air Date</th>
                        <th>Episode</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($episodes as $episode) : ?>
                    <tr>
                        <td><?= $episode['name'];?></td>
                        <td><?= $episode['air_date'];?></td>
                        <td><?= $episode['episode'];?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

</article>
