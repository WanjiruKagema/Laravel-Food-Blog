@extends('layouts.app')

@section('content')
<br>
{{-- <h1>{{$post->title}}</h1> --}}
{{-- <div class="card-center mt-5" style="height:50%;width:50%;">
    <img  style="height:100%;width:100%;" src="/storage/cover_images/76094d-splendid-table-noodlewok_1642766175.jpg">
</div>
<br> --}}
<table>
<tr>
{{-- <td>{{$post->body}}</td> --}}
{{-- <a href="/recipes/${recipe.id}" id="put"> </a> --}}

<form action="#"  id="EditRecipe">

    <div class="form-group">
        Title <input type = "text"  id = "recipeName"   class= "form-control">
        
        <br>
    
       Ingredients <input type = "text" id="recipeIngredients"  class= "form-control"/>
       <br>
       Instructions <input type = "text" id="recipeMethods"   class= "form-control"/>

    </div>
    <button type="submit" id="edit-post" class="button" onclick="">Submit</button>
</form>
   
{{-- <small>Written by ...by Random User</small> --}}
<br>
<div id="posts">

</div>
@endsection

@section('script')

<script>

    const EditRecipe = document.querySelector('#EditRecipe');
    const recipeName = document.querySelector('#recipeName'); 
    const recipeIngredients = document.querySelector('#recipeIngredients');
    const recipeMethods = document.querySelector('#recipeMethods');
    const btnSubmit = document.querySelector('.button');

     fetch('http://localhost:3000/recipes/{{$recipeId}}', {
        method: 'GET',
        // mode: 'no-cors',
        headers:{
            'Content-Type': 'application/json',
        },
        
    }).then(data => {
        return data.json();
    })
        .then(recipes => {
            
            // console.log(recipes);
            recipeName.value = recipes.recipeName;
            recipeIngredients.value= recipes.recipeIngredients;
            recipeMethods.value= recipes.recipeMethods;

        })

    
    EditRecipe.addEventListener('submit', (e) => {
        e.preventDefault();

        const editvalues = {}

        editvalues.recipeName = recipeName.value,
        editvalues.recipeIngredients = recipeIngredients.value,
        editvalues.recipeMethods = recipeMethods.value

        const values = JSON.stringify(editvalues)
        
        // send `PUT` request
        fetch('http://localhost:3000/recipes/{{$recipeId}}', {
            // send `` request
            method: 'PUT',
            // mode: 'no-cors',
            headers:{
                'Content-Type': 'application/json',
            },
            
            body:values
            
        })
        .then(data => {
            return data.json();
        })
        .then(recipes => {
            location.replace("/posts")
            // console.log(recipes)
    
        })
        
    });

</script>
    
@endsection