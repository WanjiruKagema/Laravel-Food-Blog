@extends('layouts.app')

@section('content')
<br>
{{-- {!! Form::open(['action' => 'fetchText()','enctype'=>'multipart/form-data']) !!}
    
<div class="form-group">
    
    {{Form::label('title', 'Recipie Title')}}
    
    {{ Form::text('title','', ['class'=>'form-control']) }}

    {{Form::label('body', 'Instructions')}}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
    <br>
    {!! Form::file('cover_image') !!}
   {{Form::submit('Submit',['class'=>'button float-md-right'])}}

</div> --}}

<form action="#"  id="CreateRecipe">

    <div class="form-group">
        Title <input type = "text"  id = "recipeName" name = "recipeName" class= "form-control" />
        <br>
       Ingredients <input type = "text" id="recipeIngredients" name = "recipeIngredients" class= "form-control"/>
       <br>
       Instructions <input type = "text" id="recipeMethods" name = "recipeMethods"  class= "form-control"/>

    </div>
    <button type="submit" id="submit">Submit</button>
</form>
{{-- {!! Form::close() !!} --}}
@endsection

@section('script')
<script>
const CreateRecipe= document.querySelector('#CreateRecipe');

// Attach event handler to form
CreateRecipe.addEventListener('submit', (e) => {
    // Disable default submission
    e.preventDefault();

    // Submit form manually
    const recipeName = document.querySelector('#recipeName').value;
    const recipeIngredients = document.querySelector('#recipeIngredients').value;
    const recipeMethods = document.querySelector('#recipeMethods').value;

    // Create a new FormData object
    // const fd = new FormData();
    // fd.append('recipeName', recipeName.value);
    // fd.append('recipeIngredients', recipeIngredients.value);
    // fd.append('recipeInstructions', recipeInstructions.value);
     
    // const values = [...fd.entries()];

    const values = JSON.stringify({
        recipeName,
        recipeIngredients,
        recipeMethods
    })
    console.log(values);
   

    // send `POST` request
    fetch('http://localhost:3000/recipes/add', {
        method: 'POST',
        // mode: 'no-cors',
        headers:{
            'Content-Type': 'application/json',
        },
        body: values
    }).then(res => res.json)
        .then(data => {
        //  console.log(json())
        location.replace("/posts")

        })
        .catch(err => console.log(err))
});


</script>
@endsection