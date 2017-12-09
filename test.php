<!DOCTYPE html>
<html>

<head>
    <title>LuxorFabric</title>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>


    <div class="form-group">
        <input type="text" class="form-control" id="Schoolname" name="Schoolname[]" value="" placeholder="School name">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="Major" name="Major[]" value="" placeholder="Major">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="Degree" name="Degree[]" value="" placeholder="Degree">
    </div>
    <div class="form-group">
        <div class="input-group-btn">
            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
        </div>
    </div>

    <div id="education_fields">
    </div>
    <div class="clear"></div>

<script type="text/javascript">
       var room = 1;
       function education_fields() {
        
           room++;
           var objTo = document.getElementById('education_fields')
           var divtest = document.createElement("div");
           divtest.setAttribute("class", "form-group removeclass"+room);
           var rdiv = 'removeclass'+room;
           divtest.innerHTML = '<div class="form-group"><input type="text" class="form-control" id="Schoolname" name="Schoolname[]" value="" placeholder="School name"></div><div class="form-group"> <input type="text" class="form-control" id="Major" name="Major[]" value="" placeholder="Major"></div><div class="form-group"><input type="text" class="form-control" id="Degree" name="Degree[]" value="" placeholder="Degree"></div><div class="form-group"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div><div class="clear"></div>';
           objTo.appendChild(divtest)
       }
          function remove_education_fields(rid) {
              $('.removeclass'+rid).remove();
          }
</script>
</body>

</html>
