var check = { "item1": "" };

function newRow(rowNumber) {
  var table = document.getElementById("myTable");
  var Id = rowNumber.id.slice(4);
  var index = table.rows.length - 1;
  var currentSelected = "item".concat((parseInt(Id)).toString());
  var productName = document.getElementById(currentSelected).value;
  showHint(productName, Id);
  if (check[currentSelected] == "") {
    check[currentSelected] = "1";
    var newID = "item".concat((parseInt(Id) + 1).toString());
    var row = table.insertRow(index);
    row.setAttribute('id', (parseInt(Id) + 1).toString());
    var selection = document.getElementById(rowNumber.id);
    var cln = selection.cloneNode(true);
    cln.id = newID;
    var quantity = document.getElementById(rowNumber.id.concat("-Quantity"));
    var cln2 = quantity.cloneNode(true);
    cln2.id = newID.concat("-Quantity");
    cln2.name = newID.concat("-Quantity");
    var cost = document.getElementById(rowNumber.id.concat("-Price"));
    var cln3 = cost.cloneNode(true);
    cln3.id = newID.concat("-Price");
    cln3.name = newID.concat("-Price");
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
    var cell4 = row.insertCell(4);
    var element = document.createElement("input");
    element.setAttribute("type", "text");
    element.setAttribute("id", newID.concat("-Subtotal"));
    element.setAttribute("name", newID.concat("-Subtotal"));
    cell0.setAttribute("scope", "row");
    cell0.innerHTML = index;
    cell1.appendChild(cln);
    cell2.appendChild(cln2);
    cell3.appendChild(cln3);
    cell4.appendChild(element);
    check[newID] = "";
  }
  setTimeout(() => { 
    subTotal(currentSelected.concat('-Quantity'),0);
}, 100);
  
}
function showHint(name, index) {
  var id = "item".concat(index);
  var quantity = id.concat("-Quantity");
  var price = id.concat("-Price");
  if (name.length == 0) {
    document.getElementById(price).innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(price).value = this.responseText;
        document.getElementById(price).placeholder = this.responseText;
      }
    };
    xmlhttp.open("GET", "http://localhost/cashier/app/function/gethint.php?q=" + name, true);
    xmlhttp.send();
  }
 
}

function quantityOnchange(quantitySelected)
{
  var Id = quantitySelected.id
  var quantity = 0;
  setTimeout(()=>{
    quantity = document.getElementById(Id).value;
  },100)
  setTimeout(() => { 
    if(quantity!=NaN){
    subTotal(Id,parseInt(quantity));
    }
    else
    {
    subTotal(Id,0);
    }
}, 100);
}

function subTotal(row,quantity) 
{
  var Id = row.slice(0,5);
  var cost = document.getElementById(Id.concat("-Price")).placeholder;
  var subTotal = quantity * parseInt(cost);
  var htmlSubtotal = document.getElementById(Id.concat("-Subtotal"));
  if(subTotal != NaN){
  htmlSubtotal.value = subTotal.toString();
  }else{
    htmlSubtotal.value = 0
  }
}