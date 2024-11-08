<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-light">
    <header class="header"> <!-- {{ edit_1 }} -->
        <h1>Header</h1>
    </header>
    
    <div class="main-content"> <!-- New wrapper div -->
        <div class="ctn-nav">
            <div class="navigation">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="#title1">Title 1</a></li>
                    <li><a href="#title2">Title 2</a></li>
                    <li><a href="#title3">Title 3</a></li>
                    <li><a href="#title4">Title 4</a></li>
                    <li><a href="#title5">Title 5</a></li>
                </ul>
            </div>
        </div>
        <div class="ctn-form mt-3">
            <h1 id="title1">Form Project</h1> <br>
            <form>
                <h4 id="title1">Title 1</h4>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 1">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 2">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 3">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 4">
                </div>

                <h4 id="title2">Title 2</h4>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 5">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 6">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 7">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 8">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 9">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Textbox 10">
                </div>
                <div class="ctn-button">
                    <input type="submit" class="btn btn-primary"></button>
                    <button class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>