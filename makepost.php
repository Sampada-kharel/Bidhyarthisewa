<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>

    <link rel="stylesheet" href="partials/style.css">
    <style>
        a {
            color: #fff;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
        }
    </style>
    <title>bidyarthisewa</title>
</head>

<body style="background-color:#80489C; color:#FCE2DB; " >

    <?php include 'partials/header.php'; ?>
    <div style=" padding:1rem; display:flex;flex-direction:column; justify-content:space-around;align-items:center;">
    <h1>Upload Book Post!!</h1>
    <br>
    <br>
    <div class="container" >

    
        <form action="partials/post_upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col--6">
                    <label for="Bname">Item Name</label>

                    <input type="text" class="form-control" id="bookname" name="booknam">
                    <h5 id="bonamchk"></h5>
                </div>

            </div>
                <br>
                <br>
            <div class="form-group col-md-6">
                <label for="ogprice">Original Price</label>
                <input type="text" class="form-control" id="orgprice" name="ogpric">
                <h5 id="ogpchk"></h5>
            </div>
            <br>
            <br>
            <div class="form-group col-md-6">
                <label for="exprice">Expected Price</label>
                <input type="text" class="form-control" id="exprice" name="expric">
            </div>
    </div>
    <br>
    <div class="form-row">
        <label for="tarea1">Describe your item and its condition</label>
        <textarea class="form-control" id="tarea1" rows="3" name="describe"></textarea>
        <h5 id="deschk"></h5>
    </div>
    <break>
        <br>
        <div class="class form-row">
            <label for="exampleFormControlTextarea1">Upload some pictures of your item</label>
            <br>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="File1" aria-describedby="inputGroupFileAddon01" required name="bookpic1">
                    <label class="custom-file-label" for="inputGroupFile01">Choose image 1
                    </label>
                </div>
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="File2" aria-describedby="inputGroupFileAddon01" required name="bookpic2">
                    <label class="custom-file-label" for="inputGroupFile01">Choose image 2
                    </label>
                </div>
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="File3" aria-describedby="inputGroupFileAddon01" required name="bookpic3">
                    <label class="custom-file-label" for="inputGroupFile01">Choose image 3 </label>
                </div>
            </div>
        </div>


        <br>
        <div class="form-group ">
            <button type="submit" class="btn btn-primary col-md-12" id="subtn" name="booksubmit">Submit</button>
        </div>
        </form>
        </div>

        </div>
</body>

</html>