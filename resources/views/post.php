@extends('layouts.app')

@section('content')

<form action="#" onsubmit="return fetchText()">
    <div class="form-group">
        Title <input type = "text" name = "recipeName" class= "form-control" />
        <br>
       Ingredients <input type = "text" name = "recipeIngredients" class= "form-control"/>
       <br>
       Instructions <input type = "text" name = "recipeInstructions" class= "form-control"/>

    </div>
    <button type="submit">Submit</button>
</form>

@section('script')
<script>

   async function fetchText() {
    let response = await fetch('http://localhost:3000/recipes');
    let data = await response.text();
    console.log(data);
}

const REQ_DATA = JSON.stringify({
     recipeName,
     recipeIngredients,
     recipeInstructions
 });

</script>
@endsection

const REQ_DATA = JSON.stringify({
     recipeName,
     recipeIngredients,
     recipeInstructions
 });

//  async function fetchText() {
//     let response = await fetch('http://localhost:3000/recipes');
//     let data = await response.text();
//     console.log(data);
    

//     body: JSON.stringify(REQ_DATA);
// }
/*var form= document.getElementById('CreateRecipe');
form.addEventListener("submit", fetchText, true);

function fetchText(event){
        event.preventDefault();
        var form2= document.getElementById('CreateRecipe');
    var formdata = new FormData(form2) */

    //var headers = {}
 

//    var form= document.getElementById('CreateRecipe');
//    console.log(formdata.entries());
//     fetch('http://localhost:3000/recipes',{
//             method : "POST",
//             headers:{
//                 'Content-Type': 'application/json',
//             }
//         });

//             body: JSON.stringify(REQ_DATA);
//             // mode: 'cors',
//             // headers: headers
       
//         .then(
//             data => { 
//                 return data.json(); 
//             }) 
//         .then(
//             brands => { 
//                 console.log(brands); 
//                 document.getElementById("recipes").innerHTML = brands.itemBrands[0];
//             });

  //  }
