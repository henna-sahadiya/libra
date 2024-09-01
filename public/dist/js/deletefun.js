function deleted()
{
    var a = confirm("Do ypu want to delete this data?");
    if(a == true)
        {
            return true;
        }
    else    
        {
            return false;
        }
}

// LANGUAGE
function lan(id,seri)
{
    document.getElementById("editid"+seri).className="fas fa-spinner fa-spin";
    $.ajax({
        url: 'url/'+id,
        type: 'GET',
        dataType: 'json',
        success: function (data) 
        {
            document.getElementById("nameid").value=data.name;
            document.getElementById("codeid").value=data.code;
            document.getElementById("statusid").value=data.status;
            document.getElementById("lanid").value=data.id;
            $("#modal-default").modal('show');
            document.getElementById("editid"+seri).className="fas fa-edit"
           
        },
        error: function (xhr, status, error) {
           alert(error);
        }
    });
}

function edited()
{
       var a=document.getElementById("nameid").value;
       var b=document.getElementById("codeid").value;
       var c=document.getElementById("statusid").value;
       var d=document.getElementById("lanid").value;
    if(a == "")
    {
        alert("Field must be fill")
    }
    else
    {
        document.getElementById("saveid").innerHTML="Loading...."
    }
    $.ajax({
        url: 'uurl/'+a+'/'+b+'/'+c+'/'+d,
        type: 'GET',
        dataType: 'json',
        success: function (data) 
        {
            alert(data.msg);
            document.getElementById("saveid").innerHTML="Save changes";
            document.getElementById("tdid"+d).innerHTML=a;
            document.getElementById("coid"+d).innerHTML=b;
            $("#modal-default").modal('hide');           
        },
        error: function (xhr, status, error) {
           alert(error);
        }
    });
}

// BOOKTYPE
function booktype(id,seri)
{
    document.getElementById("edittid"+seri).className="fas fa-spinner fa-spin";
    $.ajax({
        url: 'bturl/'+id,
        type: 'GET',
        dataType: 'json',
        success: function (data) 
        {
            document.getElementById("typeid").value=data.booktype;
            document.getElementById("staid").value=data.status;
            document.getElementById("botyid").value=data.id;
            $("#modal-default").modal('show');
            document.getElementById("edittid"+seri).className="fas fa-edit"          
        },
        error: function (xhr, status, error) {
           alert(error);
        }
    });
}

function btedited()
{
       var j=document.getElementById("typeid").value;
       var k=document.getElementById("staid").value;
       var l=document.getElementById("botyid").value;
    if(j == "")
    {
        alert("Field must be fill")
    }
    else
    {
        document.getElementById("savecid").innerHTML="Loading...."
    }
    $.ajax({
        url: 'btuurl/'+j+'/'+k+'/'+l,
        type: 'GET',
        dataType: 'json',
        success: function (data) 
        {
            alert(data.msg);
            document.getElementById("savecid").innerHTML="Save changes";
            document.getElementById("btdid"+l).innerHTML=j;
            $("#modal-default").modal('hide');           
        },
        error: function (xhr, status, error) {
           alert(error);
        }
    });
}

