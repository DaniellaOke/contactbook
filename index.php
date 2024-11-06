<?php
    include('connection.php');

    $sql = "SELECT * FROM contacts";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Book</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css"
    rel="stylesheet"
    />
</head>
<body>

    <section class="vh-100" style="background-color: #e2d5de;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">

            <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">

                <h6 class="mb-3">Contact Book</h6>
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($_GET['success']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="contact.php" class="d-flex justify-content-center align-items-center mb-4">
                <div data-mdb-input-init class="form-outline flex-fill">
                    <input name="title" type="text" id="form3" class="form-control form-control-lg" required />
                    <label class="form-label" for="form3">Enter firstname</label>
                </div>
                <div data-mdb-input-init class="form-outline flex-fill">
                    <input name="title" type="text" id="form3" class="form-control form-control-lg" required />
                    <label class="form-label" for="form3">Enter secondname</label>
                </div>
                <div data-mdb-input-init class="form-outline flex-fill">
                    <input name="title" type="text" id="form3" class="form-control form-control-lg" required />
                    <label class="form-label" for="form3">Enter email</label>
                </div>
                
                <button name="createTask" type="submit" class="btn btn-primary btn-lg ms-2">Add</button>
                </form>



                <ul class="list-group mb-0">
                    <?php foreach ($result as $row) { ?>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                        <div class="d-flex align-items-center">

                        <form action="contact.php" method="post" style="margin-right: 10px;">
                            <input name="id" type="hidden" value="<?php echo $row['id'] ?>" /> 
                            <input class="form-check-input me-2" name="status" type="checkbox" <?php echo $row['status'] == 'Done'? 'checked disabled':''  ?> /> 
                            <?php if($row['status'] == '') { ?><button name="doneTask" type="submit" class="btn btn-primary btn-ms ms-2">Done</button> <?php } ?>
                        </form>
                        <?php echo $row['title']; ?>
                        </div>
                        <a href="/contact.php?action=delete&id=<?php echo $row['id'] ?>" data-mdb-tooltip-init title="Remove item">
                        <i class="fas fa-times text-danger"></i>
                        </a>
                    </li>
                    
                <?php } ?>
                </ul>

            </div>
            </div>

        </div>
        </div>
    </div>
    </section>

    
<!-- <li
    class="list-group-item d-flex d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
    <div class="d-flex align-items-center">
    <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." checked />
    <s>Dapibus ac facilisis in</s>
    </div>
    <a href="#!" data-mdb-tooltip-init title="Remove item">
    <i class="fas fa-times text-primary"></i>
    </a>
</li>
<li
    class="list-group-item d-flex d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
    <div class="d-flex align-items-center">
    <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
    Morbi leo risus
    </div>
    <a href="#!" data-mdb-tooltip-init title="Remove item">
    <i class="fas fa-times text-primary"></i>
    </a>
</li>
<li
    class="list-group-item d-flex d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
    <div class="d-flex align-items-center">
    <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
    Porta ac consectetur ac
    </div>
    <a href="#!" data-mdb-tooltip-init title="Remove item">
    <i class="fas fa-times text-primary"></i>
    </a>
</li>
<li
    class="list-group-item d-flex d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-0">
    <div class="d-flex align-items-center">
    <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." checked />
    Vestibulum at eros
    </div>
    <a href="#!" data-mdb-tooltip-init title="Remove item">
    <i class="fas fa-times text-primary"></i>
    </a>
</li>
<li
    class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
    <div class="d-flex align-items-center">
    <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
    Morbi leo risus
    </div>
    <a href="#!" data-mdb-tooltip-init title="Remove item">
    <i class="fas fa-times text-primary"></i>
    </a>
</li> -->
</body>

<!-- MDB -->
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"
    ></script>
</html>
