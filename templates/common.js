function dropDownProfile() {
    document.getElementById("hidden_dropdown").classList.toggle("show");
}

window.onclick = function(event){
    if (!event.target.matches(".dropdown_button")){
        let dropdowns = document.getElementsByClassName("dropdown_content");
        let i;
        for (i = 0; i < dropdowns.length; i++){
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')){
                openDropdown.classList.remove('show');
            }
        }
    }
}

const searchBar = document.getElementById("hidden_searchbar")

function dropDownSearch() {
    searchBar.classList.toggle("show")
}

window.onclick = function(event){
    if (!event.target.matches("#searchbar")){
        if (searchBar.classList.contains('show'))
        searchBar.classList.remove('show')
    }
}


window.onscroll = function(event){
    let dropdowns = document.getElementsByClassName("dropdown_content");
    let search_bar_dropdowns = document.getElementsByClassName("search_bar_content");
    let i;
    for (i = 0; i < dropdowns.length; i++){
        let openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')){
            openDropdown.classList.remove('show');
        }
    }
    for (i = 0; i < search_bar_dropdowns.length; i++){
        let openDropdown = search_bar_dropdowns[i];
        if (openDropdown.classList.contains('show')){
            openDropdown.classList.remove('show');
        }
    }
}

function unDropDownSearch(){
    if (searchBar.classList.contains('show'))
        searchBar.classList.remove('show')
}


const searchInput = document.querySelector("[data-search]")
let restaurants = document.getElementsByClassName('restaurants')
const listOfRestaurants = [];
for (let i = 0; i < restaurants.length; i++){
    listOfRestaurants.push(restaurants[i].outerText)
}


searchInput.addEventListener("input", e => {
    const value = e.target.value.toLowerCase()
    listOfRestaurants.forEach(restaurant => {
        const isVisible = restaurant.toLowerCase().includes(value)
        if(!isVisible) {        
            let restaurantToHide = document.getElementsByClassName(restaurant)
            if (!restaurantToHide[0].classList.contains("hide")) restaurantToHide[0].classList.toggle("hide")
        } 
        if (isVisible){
            let restaurantToHide = document.getElementsByClassName(restaurant)
            if (restaurantToHide[0].classList.contains("hide")) restaurantToHide[0].classList.toggle("hide")
        }
    })
})
