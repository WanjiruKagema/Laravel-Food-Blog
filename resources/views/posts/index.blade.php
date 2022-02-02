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

<h1>Posts</h1>
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
            `<a href="/recipes/${recipe.id}" id="post">
                <div class="row border zoom" >
                    <span style="padding:20px;">
                        <h5 class="card-title">${recipe.recipeName}</h5>
                    </span> <br>

                    <span style="padding:20px;">
                        <h5 class="card-title">${recipe.recipeIngredients}</h5>
                    </span> <br>

                    <span style="padding:20px;">
                        <h5 class="card-title">${recipe.recipeMethods}</h5>
                    </span> <br>

                    <p style="margin-right:5px;margin-bottom:0;margin-left:auto;margin-top:auto;"><small>...by Random User</small></p>
                </div>
            </a>`
        );
    });
    //  document.getElementById("method").innerHTML = recipes[0].recipeMethods;
    //  document.getElementById("instruction").innerHTML = recipes[0].recipeIngredients;
     

    // var array =    [[ recipes],
    //                      ],
    //             fetch = document.getElementById('fetch');
    //     for(var i=0; i <array.length; i++){
    //         var newRow = fetch.insertRow(fetch.length);
    //         for(var j=0; j<array[i].length; j++){
    //             var cell = newRow.insertCell(j);
    //             cell.innerHTML = array[i][j];
    //         }
    //     }
           
        })
       // .catch(err => console.log(err))




</script>
@endsection