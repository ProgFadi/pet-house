let petID = 0;
function showDialog(iTag)
{
   let tr = iTag.closest('tr');
   console.log(tr)
   let iTags = tr.getElementsByTagName('td');
  
   let petName = iTags[1].innerText;
   petID = tr.getAttribute('id');
   
   console.log(tr)
   console.log(petName)
   let bText = document.getElementById('pet-name-b');
   bText.innerText = '('+petName+')';
   let inputID = document.getElementById('pet-id');
   inputID.value = petID;
}


function showEditDialog(iTag)
{
    let tr = iTag.closest('tr');
   console.log(tr)
   let iTags = tr.getElementsByTagName('td');
  
   let petName = iTags[1].innerText;
   petID = tr.getAttribute('id');
   
   console.log(tr)
   console.log(petName)
   let bText = document.getElementById('pet-name-edit');
   bText.innerText = '('+petName+')';
   let nameInput = document.getElementById('name-edit');
   let imageInput = document.getElementById('image-edit');
   let priceInput = document.getElementById('price-edit');
   document.getElementById('pet-id-edit').value = petID ;
   nameInput.value = petName;

   priceInput.value = iTags[4].innerText;

}

function showImage(iTag)
{
    let tr = iTag.closest('tr');
    console.log(tr)
    let iTags = tr.getElementsByTagName('td');
   
    let imagePath = iTags[8].innerText;
    let image = document.getElementById('pet_image_display');
    image.setAttribute("src",imagePath);
}

function searchByName(inp)
{
    let input = inp.value;
    let tbody = document.getElementById('pets-tbody');
    let trArray = tbody.getElementsByTagName('tr');
    for(let i =0 ; i<trArray.length;i++)
    {
        let tds = trArray[i].getElementsByTagName('td');
        let tdName = tds[1]; // name
        console.log(tdName)
        if(tdName.innerText.includes(input))
        {
            trArray[i].style.display = "table-row";
        }
        else{
            trArray[i].style.display = "none";
        }
    }
}