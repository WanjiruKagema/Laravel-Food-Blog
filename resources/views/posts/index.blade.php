@extends('layouts.app')

@section('content')
<br>
{{-- <div class="row border zoom">
    <div class="card-center mt-5" style="height:25%;width:25%;">
    
<label for=""> Name:</label>
<p id= "Create">  </p> <br>

<label for= ""> Ingredients: </label>
<p id= "method">  </p><br>

<label for = ""> Instruction: </label>
<p id= "instruction"> </p> <br>

    </div>
</div> --}}

<h1>Recipes</h1>
<hr>
{{-- @if(count($posts)>0)
    @foreach($posts as $post)
      
      <a href="posts/{{$post->id}}" id="post">
  
      <div class="row border zoom" >
          <span><img  style="height: 100px;width:100px;" src="storage/cover_images/{{$post->cover_image}}" /></span> 
            <span style="padding:20px;"><h5 class="card-title">{{$post->title}}</h5>
            </span>
            <p style="margin-right:5px;margin-bottom:0;margin-left:auto;margin-top:auto;"><small>...by {{$post->user->name}}</small></p>

            </div>
      </a>
    <br>


    @endforeach
    {{$posts->links()}}
    @else
        <p>No posts</p>
@endif --}}
<div id="posts">

</div>
{{--  --}}
@endsection


@section('script')
<script>

  // send `GET` request
  fetch('http://localhost:3000/recipes/all', {
        method: 'GET',
        // mode: 'no-cors',
        headers:{
            'Content-Type': 'application/json',
        },
        
    }).then(data => {
        return data.json();
    })
        .then(recipes => {
            
            console.log(recipes);
        //     for (var values of CreateRecipe.values()){
        //         console.log(values);
        // }
      
     const recipeContainer = document.getElementById("posts")

    recipes.forEach(recipe => {
        recipeContainer.insertAdjacentHTML('beforeend', 
            `<div class="row border zoom row mt-5">
            <div class="card-center mt-6" style="height:10%;width:10%;" data-id=${recipe._id}>
            <div class card-center mt-5> 
            
                <span>
                    <img  style="height: 200px;width:200px; " src="{{url('/storage/cover_images/76094d-splendid-table-noodlewok_1642766175.jpg')}}" />
                </span> 
            </div>
                <a href="/recipes/${recipe._id}" id="post">
               
                    <span style="padding:20px;">
                        <h5 class="card-title">Title <br>${recipe.recipeName}</h5>
                    </span> <br>

                    <span style="padding:20px;">
                        <h5 class="card-title">Ingredients <br>${recipe.recipeIngredients}</h5>
                    </span> <br>

                    <span style="padding:20px;">
                        <h5 class="card-title">Instructions <br>${recipe.recipeMethods}</h5>
                    </span> <br>

                    <p style="margin-right:5px;margin-bottom:0;margin-left:auto;margin-top:auto;"><small>...by Random User</small></p>
                
                </a>
                <a href="/posts/${recipe._id}" class="button">Edit</a>
               
                <input type="button" name="submit" class="button" value="Delete" id="delete" onclick="deleteRecipe('${recipe._id}')" />  
            </div>
            </div>`
        );
    });
           
        })

        function deleteRecipe(id) {
               fetch(`http://localhost:3000/recipes/${id}`,{
                   method: 'DELETE',
               })
               .then(res => res.json())
               .then(() => location.reload())
            
        }
      




</script>
@endsection