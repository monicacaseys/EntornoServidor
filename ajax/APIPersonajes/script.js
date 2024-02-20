"use strict";
// Fetch para obtener datos de la API
$(document).ready(function() {

  $('#mostrar').click(function() {
    fetchCharacters();
  });
 

  $('#searchButton').click(function() {
    searchCharacter();
  });
});

function fetchCharacters() {
  fetch('https://rickandmortyapi.com/api/character')
    .then(response => response.json())
    .then(data => {
      const gallery = $('#gallery');
      data.results.forEach(character => {
        const characterDiv = $('<div>').addClass('character');
        characterDiv.html(`
          <img src="${character.image}" alt="${character.name}">
          <div>
            <h3>${character.name}</h3>
            <p>Especie: ${character.species}</p>
            <p>Género: ${character.gender}</p>
            <p>Origen: ${character.origin.name}</p>
          </div>
        `);
        gallery.append(characterDiv);
      });
    })
    .catch(error => console.error('Error fetching data:', error));
}

function searchCharacter() {
  const searchInput = $('#searchInput').val().toLowerCase();
  fetch('https://rickandmortyapi.com/api/character')
    .then(response => response.json())
    .then(data => {
      const searchResult = $('#searchResult');
      const character = data.results.find(character => character.name.toLowerCase() === searchInput);
      if (character) {
        searchResult.html(`
          <h3>${character.name}</h3>
          <img src="${character.image}" alt="${character.name}">
          <p>Especie: ${character.species}</p>
          <p>Género: ${character.gender}</p>
          <p>Origen: ${character.origin.name}</p>
        `);
      } else {
        searchResult.html('Personaje no encontrado.');
      }
    })
    .catch(error => console.error('Error searching character:', error));
}
