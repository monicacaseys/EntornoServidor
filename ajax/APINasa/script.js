"use strict";


document.addEventListener("DOMContentLoaded", ()=> {
    var container = document.getElementById("container");
    var apiKey = "ES5kJ81KpLjIFP4rh6KTztpbD7sSB8ycve6FVqVf";

    var apiUrl =`https://api.nasa.gov/planetary/apod?api_key=${apiKey}`;

    fetch(apiUrl)
      .then((reponse)=>{
        if(!reponse.ok){
            throw new Error("solicitud erronea");
        }
        return reponse.json();
      })

      .then((data)=>{
        if(data.media_type ==="video"){
            var containerVideo= document.createElement("iframe");
            containerVideo.src= data.url;
            containerVideo.width="500";
            container.appendChild(containerVideo);
        } else {
            var containerImagen= document.createElement("img");
            containerImagen.src= data.url;
            containerImagen.alt= data.title;
            container.appendChild(containerImagen);
        }
      })

    // Fetch para obtener usuarios de JSONPlaceholder
    fetch('https://jsonplaceholder.typicode.com/users')
      .then(response => response.json())
      .then(users => {
        const usersList = document.getElementById('usersList');
        users.forEach(user => {
          const li = document.createElement('li');
          li.textContent = `${user.name} - ${user.email}`;
          usersList.appendChild(li);
        });
      })
      .catch(error => console.error('Error fetching users:', error));
})