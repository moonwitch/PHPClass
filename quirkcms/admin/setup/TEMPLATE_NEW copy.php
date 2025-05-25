<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>QuirkCMS Dashboard - Overview</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Oswald&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container"> <a class="navbar-brand" href="../">QuirkCMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class="fas fa-user me-1"></i> Hi GEBRUIKERSNAAM </a>
                        <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                            <li><a class='dropdown-item' href='../'><i class="fas fa-tachometer-alt fa-fw me-2"></i>Dashboard</a></li>
                            <li>
                                <hr class='dropdown-divider'>
                            </li>
                            <li><a class='dropdown-item' href='../manageAccounts/'><i class="fas fa-users-cog fa-fw me-2"></i>Manage Accounts</a></li>
                            <li><a class='dropdown-item' href='../cms/'><i class="fas fa-edit fa-fw me-2"></i>Manage Content</a></li>
                            <li><a class='dropdown-item' href='../manageFiles/'><i class="fas fa-folder-open fa-fw me-2"></i>Manage Files</a></li>
                            <li><a class='dropdown-item' href='../explorer?reset'><i class="fas fa-compass fa-fw me-2"></i>File Explorer</a></li>
                            <li>
                                <hr class='dropdown-divider'>
                            </li>
                            <li><a class='dropdown-item' href='../login/logoff.php'><i class="fas fa-sign-out-alt fa-fw me-2"></i>Log off</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="p-4 p-md-5 mb-4 rounded-3 bg-body-tertiary banner">
        <div class="container py-4">
            <h1 class="display-5 fw-bold">QuirkCMS</h1>
            <p class="col-md-8 fs-5">A simple CMS for your website.</p>
        </div>
    </section>

    <main class="container py-4">
        <div class="row g-4">
            <div class="col-12 mb-3">
                <p class="lead">Welcome to the QuirkCMS dashboard. Manage your site content and settings.</p>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title h4"><i class="fas fa-users text-primary me-2"></i>Manage Accounts</h2>
                        <p class="card-text mb-3">
                            #count Users : [AANTAL USERS]<br>
                            #count Admins: [AANTAL ADMINS]
                        </p>
                        <a href="./manageAccounts/" class="btn btn-primary btn-sm">Manage Accounts</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title h4"><i class="fas fa-file-archive text-primary me-2"></i>Manage Files</h2>
                        <p class="card-text mb-3">
                            #count Files: [AANTAL FILES]<br>
                            #count Images: [AANTAL AFBEELDINGEN]
                        </p>
                        <a href="./manageFiles/" class="btn btn-primary btn-sm">Manage Files</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title h4"><i class="fas fa-file-alt text-primary me-2"></i>Manage Content</h2>
                        <p class="card-text mb-3">
                            Manage the content of the website. <br>
                            Make changes to the editable blocks on your pages.
                        </p>
                        <a href="./cms/" class="btn btn-primary btn-sm">Manage Content</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title h4"><i class="fas fa-folder text-primary me-2"></i>File Explorer</h2>
                        <p class="card-text mb-3">
                            Navigate all your files online.<br>
                            Full Access
                        </p>
                        <a href="./explorer/?reset" class="btn btn-primary btn-sm">File Explorer</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="container">
        <hr class="my-4">
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <p class="text-muted">© CVO-Volt Leuven <?= date('Y') ?> - QuirkCMS</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $(function() {
            if ($(".dataTable").length > 0) {
                $(".dataTable").DataTable({
                    "pageLength": 25,
                    "responsive": true,
                    // "select": true, // Select extension JS/CSS would be needed for this
                    "paging": true,
                    // Layout for DataTables: B=Buttons, f=filtering input, r=processing display, t=table, i=information, p=pagination
                    layout: { // Using the newer layout object for DT2.x
                        topStart: 'pageLength',
                        topEnd: 'search',
                        bottomStart: 'info',
                        bottomEnd: 'paging',
                        topStart: {
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                        }
                    }
                });
            }
        });
    </script>

</body>

</html>