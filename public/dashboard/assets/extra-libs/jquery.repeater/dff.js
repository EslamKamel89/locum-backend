var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<form class="row"><div class="col-sm-3"><div class="form-group"><input type="text" class="form-control" id="document_name" name="document_name" placeholder="Document Name"></div></div><div class="col-sm-2"> <div class="form-group"> <input type="text" class="form-control" id="document_type" name="document_type" placeholder="document type"> </div></div><div class="col-sm-2"> <div class="form-group"> <input type="file" class="form-control" id="document_file" name="document_file" placeholder="document file"> </div></div><div class="col-sm-2"> <div class="form-group"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button> </div></div></form>';

    objTo.appendChild(divtest)
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}
