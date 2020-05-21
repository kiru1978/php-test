<div class="row">
    <div class="col-md-12">
        <form action="/search-caracter" method="POST">
            <div class="form-group">
                <label for="caracter">Search Caracter</label>
                <input class="form-control" name="caracter" type="text"  name="caracter" id="caracter" required>
                <span>search the caracter per name</span>
            </div>
            <div class="form-group text-md-center">
                <button class="btn  btn-success">Search</button>
            </div>
        </form>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-responsive">
            <thead class="thead-light">
                <tr>
                    <th style="width: 10%;">Image</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($caracters as $caracter) :?>
                <tr>
                    <td style="width: 10%;"><img src="<?= $caracter['image']; ?>" alt="<?= $caracter['name']; ?>" style="width: 60%;" /></td>
                    <td><a href="/caracter/<?=$caracter['id'];?>"><?= $caracter['name']; ?></a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
    <div class="col-md-12 mt-5 mb-5">
        <div class="row">
            <?php if(!empty($pageInfo['prev'])) : ?>
            <div class="col-md-6">
                <div class="float-left">
                    <a href="/caracters/<?=$pageInfo['prev'];?>">
                        <button type="button" class="btn btn-outline-primary">Prev</button>
                    </a>
                </div>
            </div>
            <?php endif; ?>

            <?php if(!empty($pageInfo['next'])) : ?>
            <div class="col-md-6">
                <div class="float-right">
                    <a href="/caracters/<?=$pageInfo['next'];?>">
                        <button type="button" class="btn btn-outline-primary">Next</button>
                    </a>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>