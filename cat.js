const select = document.getElementById("categories");
const selectedCategory = select.value;
console.log(selectedCategory); // Affichera "category1" ou "category2" en fonction de la sélection de l'utilisateur

select.addEventListener("change", (event) => {
    const selectedCategory = event.target.value;
    console.log(selectedCategory); // Affichera "category1" ou "category2" en fonction de la sélection de l'utilisateur
  });
  